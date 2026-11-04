/* ══════════════════════════════════════════════════════════════
   FIGMA-SELECT TYPING — heading animation
   Urutan: cursor Figma → klik kiri → selection box biru → typing
   Berjalan sekali per elemen saat masuk viewport (serial, max 3 paralel).
   ══════════════════════════════════════════════════════════════ */
(function () {
    'use strict';

    var SELECTOR = 'section h1, section h2, section h3';

    var START_DELAY_MS = 300;   // jeda sebelum cursor muncul
    var TAIL_MS        = 550;   // tahan selection setelah selesai ketik
    var MAX_PARALLEL   = 3;     // maksimal animasi bersamaan

    var CURSOR_SVG =
        '<svg width="22" height="22" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">' +
        '<path d="M5.5 2.6 L18.8 12.9 L11.9 13.6 L9 20.8 Z" fill="#111111" ' +
        'stroke="#FFFFFF" stroke-width="1.6" stroke-linejoin="round"/>' +
        '</svg>';

    var reduceMotion = window.matchMedia &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (reduceMotion || !('IntersectionObserver' in window)) return;

    function wait(ms) {
        return new Promise(function (res) { setTimeout(res, ms); });
    }

    /* ── Tokenisasi HTML: tag utuh, tiap karakter teks jadi token ──
       Supaya <br>, <span class="nb-marker">, dsb tetap terjaga
       selama mengetik (bukan restore di akhir saja). */
    function tokenize(html) {
        var tokens = [];
        var re = /<!--[\s\S]*?-->|<[^>]+>|[\s\S]/g;
        var m;
        while ((m = re.exec(html)) !== null) {
            var v = m[0];
            tokens.push({ tag: v.charAt(0) === '<', v: v });
        }
        return tokens;
    }

    function countChars(tokens) {
        var n = 0;
        for (var i = 0; i < tokens.length; i++) if (!tokens[i].tag) n++;
        return n;
    }

    /* Potongan HTML setelah n karakter teks diketik */
    function prefixHtml(tokens, n) {
        var out = '', chars = 0;
        for (var i = 0; i < tokens.length; i++) {
            var t = tokens[i];
            if (t.tag) {
                if (chars <= n) out += t.v;
            } else {
                if (chars >= n) break;
                out += t.v;
                chars++;
            }
        }
        return out;
    }

    /* ── Siapkan elemen: simpan HTML asli, kosongkan teks, pasang dekor ── */
    function prepare(el) {
        var original = el.innerHTML;
        var tokens = tokenize(original);
        var total = countChars(tokens);

        var natural = el.offsetHeight;
        if (natural > 0) el.style.minHeight = natural + 'px';

        var text = document.createElement('span');
        text.className = 'ts-text';

        var sel = document.createElement('span');
        sel.className = 'fig-select';
        sel.innerHTML =
            '<span class="fig-handle tl"></span>' +
            '<span class="fig-handle tr"></span>' +
            '<span class="fig-handle bl"></span>' +
            '<span class="fig-handle br"></span>';

        var cur = document.createElement('span');
        cur.className = 'fig-cursor';
        cur.innerHTML = CURSOR_SVG;

        el.innerHTML = '';
        el.classList.add('ts-heading');
        el.appendChild(text);
        el.appendChild(sel);
        el.appendChild(cur);

        if (total === 0) {
            text.innerHTML = original;
            removeDecor(el, sel, cur);
            return { el: el, done: true, inView: true };
        }

        text.innerHTML = '';
        return {
            el: el, original: original, tokens: tokens, total: total,
            text: text, sel: sel, cur: cur,
            prepared: true, done: false, inView: false, queued: false
        };
    }

    function removeDecor(el, sel, cur) {
        if (sel && sel.parentNode) sel.parentNode.removeChild(sel);
        if (cur && cur.parentNode) cur.parentNode.removeChild(cur);
        el.style.minHeight = '';
    }

    /* ── Jalankan urutan animasi:
       cursor terbang ke ujung ATAS → tekan kiri → drag ke ujung BAWAH
       (selection menggambar atas → bawah) → lepas → typing ── */
    function play(item) {
        if (item.done) return Promise.resolve();
        item.done = true;

        // Keluar viewport sebelum giliran → tampilkan langsung
        if (!item.inView) {
            item.text.innerHTML = item.original;
            removeDecor(item.el, item.sel, item.cur);
            return Promise.resolve();
        }

        var el = item.el;
        var cur = item.cur;
        var sel = item.sel;
        el.classList.add('ts-lock');

        var charMs = Math.max(22, Math.min(45, Math.round(1100 / item.total)));
        var dragY = el.offsetHeight + 6;   // titik ujung bawah container

        function curMove(x, y, dur, scale, ease) {
            cur.style.transition =
                'transform ' + dur + 's ' + (ease || 'cubic-bezier(.22,.61,.36,1)');
            cur.style.transform =
                'translate(' + x + 'px,' + y + 'px)' +
                (scale != null ? ' scale(' + scale + ')' : '');
        }

        return wait(START_DELAY_MS)
            // 1. cursor melayang ke ujung ATAS container
            .then(function () {
                cur.classList.add('is-live');
                curMove(0, 0, 0.55);
                return wait(580);
            })
            // 2. tekan kiri (mouse down) di ujung atas
            .then(function () {
                curMove(0, 0, 0.1, 0.8, 'ease');
                sel.classList.add('is-on');   // selection aktif (masih ter-clip penuh)
                return wait(150);
            })
            // 3. drag ke ujung BAWAH → selection box menggambar atas → bawah
            .then(function () {
                curMove(0, dragY, 0.6, 0.8, 'cubic-bezier(.35,.7,.4,1)');
                requestAnimationFrame(function () {
                    requestAnimationFrame(function () {
                        sel.classList.add('is-drawn');
                    });
                });
                return wait(650);
            })
            // 4. lepas klik di ujung bawah
            .then(function () {
                curMove(0, dragY, 0.15, 1, 'ease');
                return wait(220);
            })
            // 5. typing
            .then(function () {
                item.text.innerHTML = '';
                var n = 0;
                return new Promise(function (resolve) {
                    var timer = setInterval(function () {
                        if (!item.inView) {       // scroll cepat → akhiri segera
                            clearInterval(timer);
                            resolve();
                            return;
                        }
                        n++;
                        item.text.innerHTML =
                            prefixHtml(item.tokens, n) +
                            '<span class="type-caret"></span>';
                        if (n >= item.total) {
                            clearInterval(timer);
                            resolve();
                        }
                    }, charMs);
                });
            })
            // 6. restore HTML asli + tahan selection
            .then(function () {
                item.text.innerHTML = item.original;
                el.classList.remove('ts-lock');
                return wait(TAIL_MS);
            })
            // 7. fade out selection + cursor
            .then(function () {
                sel.classList.add('is-out');
                cur.style.transition = 'opacity .3s ease';
                cur.style.opacity = '0';
                return wait(340);
            })
            .then(function () {
                removeDecor(item.el, item.sel, item.cur);
            })
            .catch(function (err) {
                if (window.console) console.warn('[type-select]', err);
                item.text.innerHTML = item.original;
                el.classList.remove('ts-lock');
                removeDecor(item.el, item.sel, item.cur);
            });
    }

    /* ── Antrian dengan batas paralel ── */
    var active = 0;
    var pending = [];

    function drain() {
        while (active < MAX_PARALLEL && pending.length) {
            (function () {
                var item = pending.shift();
                active++;
                play(item).then(function () {
                    active--;
                    drain();
                });
            })();
        }
    }

    function schedule(item) {
        if (item.queued) return;
        item.queued = true;
        pending.push(item);
        drain();
    }

    /* ── Observer: prepare saat masuk viewport, lalu antrikan ── */
    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            var el = entry.target;
            var item = el.__tsItem;

            if (!item) {
                if (!entry.isIntersecting) return;
                item = el.__tsItem = prepare(el);
                if (item.done) return;
            }

            item.inView = entry.isIntersecting;
            if (entry.isIntersecting) schedule(item);
        });
    }, { threshold: 0, rootMargin: '0px 0px -20% 0px' });

    document.querySelectorAll(SELECTOR).forEach(function (el) {
        observer.observe(el);
    });
})();
