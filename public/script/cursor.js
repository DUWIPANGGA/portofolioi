// Custom Cursor with Perfect Idle Transition
const cursor = document.querySelector('.cursor');
const cursorFollower = document.querySelector('.cursor-follower');

if (cursor && cursorFollower) {
    let isIdle = false;
    let idleTimer;
    let animationFrame;

    // Position tracking
    let pos = { x: 0, y: 0 };
    let followerPos = { x: 0, y: 0 };
    const angle = { current: 0, target: 0 };
    const radius = 200;

    // Smoothing factors
    const smoothFactor = 0.2;
    const rotationSpeed = 0.05;

    function updateCursorPosition(e) {
        pos.x = e.clientX;
        pos.y = e.clientY;
        if (!isIdle) {
            angle.target = 0;
        }
    }

    function animate() {
        // Smooth follow for normal state
        if (!isIdle) {
            followerPos.x += (pos.x - followerPos.x) * smoothFactor;
            followerPos.y += (pos.y - followerPos.y) * smoothFactor;
            angle.current += (angle.target - angle.current) * rotationSpeed;
        }
        // Circular motion for idle state
        else {
            angle.target += rotationSpeed;
            angle.current = angle.target;
            followerPos.x = pos.x + Math.cos(angle.current) * radius;
            followerPos.y = pos.y + Math.sin(angle.current) * radius;
        }

        // Apply transformations
        cursor.style.transform = `translate(${pos.x}px, ${pos.y}px)`;
        cursorFollower.style.transform = `translate(${followerPos.x}px, ${followerPos.y}px)`;

        animationFrame = requestAnimationFrame(animate);
    }

    function handleIdleState() {
        isIdle = false;
        clearTimeout(idleTimer);

        idleTimer = setTimeout(() => {
            isIdle = true;
            angle.target = angle.current; // Maintain current angle when entering idle
        }, 2000);
    }

    // Initialize
    document.addEventListener('mousemove', (e) => {
        updateCursorPosition(e);
        handleIdleState();
    });

    // Start animation loop
    animate();

    // Cleanup on page exit
    window.addEventListener('beforeunload', () => {
        cancelAnimationFrame(animationFrame);
    });

    // Hover effects
    const hoverElements = document.querySelectorAll('a, button, .neumorph-hover, .input-field, .neumorph-btn');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('cursor-active');
            cursorFollower.classList.add('cursor-follower-active');
        });

        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('cursor-active');
            cursorFollower.classList.remove('cursor-follower-active');
        });
    });
}
