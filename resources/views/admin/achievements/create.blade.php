@extends('layouts.app')

@section('title', 'Tambah Achievement / Speaker')
@section('subtitle', 'Tambah prestasi lomba atau sertifikat as pemateri baru')

@section('content')
<div class="section max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-bold flex items-center gap-2">
                <i class="fas fa-plus-circle text-primary"></i> Tambah Data Baru
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Pilih kategori: Pemateri / Speaker, Prestasi Lomba, atau Sertifikasi
            </p>
        </div>
        <a href="{{ route('admin.achievements.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-gray-600 hover:text-primary transition flex items-center gap-2 text-sm">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-xl bg-red-100 dark:bg-red-900/40 border border-red-300 dark:border-red-700 text-red-700 dark:text-red-300">
            <div class="font-bold mb-1 flex items-center gap-2">
                <i class="fas fa-exclamation-triangle"></i> Ada beberapa kesalahan input:
            </div>
            <ul class="list-disc list-inside text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="neumorph-3d dark:neumorph-3d-dark p-6 md:p-8 rounded-2xl">
        <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Kategori / Jenis -->
            <div>
                <label class="block font-semibold mb-2">Kategori Kegiatan *</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="speaker" class="sr-only peer" 
                               {{ old('category', request('category', 'speaker')) === 'speaker' ? 'checked' : '' }}
                               onchange="updateLabels('speaker')">
                        <div class="p-3.5 rounded-xl border-2 text-center transition peer-checked:border-purple-600 peer-checked:bg-purple-50 dark:peer-checked:bg-purple-950/40 peer-checked:text-purple-600 border-gray-200 dark:border-gray-700 hover:border-gray-300">
                            <i class="fas fa-microphone-alt text-2xl mb-1 block"></i>
                            <span class="font-bold text-sm">Speaker / Pemateri</span>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="competition" class="sr-only peer"
                               {{ old('category', request('category')) === 'competition' ? 'checked' : '' }}
                               onchange="updateLabels('competition')">
                        <div class="p-3.5 rounded-xl border-2 text-center transition peer-checked:border-amber-500 peer-checked:bg-amber-50 dark:peer-checked:bg-amber-950/40 peer-checked:text-amber-600 border-gray-200 dark:border-gray-700 hover:border-gray-300">
                            <i class="fas fa-trophy text-2xl mb-1 block"></i>
                            <span class="font-bold text-sm">Kompetisi / Lomba</span>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="certification" class="sr-only peer"
                               {{ old('category', request('category')) === 'certification' ? 'checked' : '' }}
                               onchange="updateLabels('certification')">
                        <div class="p-3.5 rounded-xl border-2 text-center transition peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-950/40 peer-checked:text-blue-600 border-gray-200 dark:border-gray-700 hover:border-gray-300">
                            <i class="fas fa-certificate text-2xl mb-1 block"></i>
                            <span class="font-bold text-sm">Sertifikasi</span>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="award" class="sr-only peer"
                               {{ old('category', request('category')) === 'award' ? 'checked' : '' }}
                               onchange="updateLabels('award')">
                        <div class="p-3.5 rounded-xl border-2 text-center transition peer-checked:border-emerald-600 peer-checked:bg-emerald-50 dark:peer-checked:bg-emerald-950/40 peer-checked:text-emerald-600 border-gray-200 dark:border-gray-700 hover:border-gray-300">
                            <i class="fas fa-medal text-2xl mb-1 block"></i>
                            <span class="font-bold text-sm">Penghargaan / Lainnya</span>
                        </div>
                    </label>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" id="titleLabel" class="block font-semibold mb-2">
                        Topik / Nama Acara *
                    </label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" 
                           placeholder="contoh: Workshop Internet of Things (IoT) dengan ESP32"
                           class="w-full input-field dark:input-field" required>
                </div>

                <!-- Organizer -->
                <div>
                    <label for="organizer" id="organizerLabel" class="block font-semibold mb-2">
                        Penyelenggara / Institusi / Komunitas
                    </label>
                    <input type="text" id="organizer" name="organizer" value="{{ old('organizer') }}"
                           placeholder="contoh: Himpunan Mahasiswa Informatika / Google DSC"
                           class="w-full input-field dark:input-field">
                </div>

                <!-- Result / Role -->
                <div>
                    <label for="result" id="resultLabel" class="block font-semibold mb-2">
                        Peran / Peringkat
                    </label>
                    <input type="text" id="result" name="result" value="{{ old('result') }}"
                           placeholder="contoh: Pemateri Utama, Keynote Speaker, Juara 1"
                           class="w-full input-field dark:input-field">
                    <p class="text-xs text-gray-500 mt-1" id="resultHelp">
                        Untuk Speaker: misal "Keynote Speaker", "Pemateri Workshop", "Narasumber". Untuk Lomba: "Juara 1", "Finalis".
                    </p>
                </div>

                <!-- Event Date -->
                <div>
                    <label for="event_date" class="block font-semibold mb-2">Tanggal Pelaksanaan</label>
                    <input type="date" id="event_date" name="event_date" value="{{ old('event_date') }}"
                           class="w-full input-field dark:input-field">
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block font-semibold mb-2">Urutan Tampil (Order)</label>
                    <input type="number" id="order" name="order" value="{{ old('order', 0) }}" min="0"
                           class="w-full input-field dark:input-field">
                    <p class="text-xs text-gray-500 mt-1">Angka lebih kecil tampil lebih dulu (0, 1, 2, ...)</p>
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block font-semibold mb-2">Deskripsi / Ringkasan Acara</label>
                    <textarea id="description" name="description" rows="3"
                              placeholder="Ceritakan tentang topik yang dibawakan, jumlah peserta, atau karya yang dilombakan..."
                              class="w-full input-field dark:input-field">{{ old('description') }}</textarea>
                </div>

                <!-- Certificate Image (Upload Piagam/Sertifikat) -->
                <div>
                    <label class="block font-semibold mb-2">
                        <i class="fas fa-file-contract text-blue-500 mr-1"></i> File Sertifikat (Gambar)
                    </label>
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-4 text-center hover:border-primary transition">
                        <input type="file" id="certificate_image" name="certificate_image" accept="image/*" class="hidden" onchange="previewCertificate(event)">
                        <label for="certificate_image" class="cursor-pointer block">
                            <div id="certPreviewContainer" class="hidden mb-3">
                                <img id="certPreview" src="" alt="Preview Sertifikat" class="max-h-48 mx-auto rounded-lg shadow-sm border">
                            </div>
                            <div id="certPlaceholder">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Upload sertifikat (as pemateri / juara)</p>
                                <p class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP maksimal 4MB</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Photos Documentation (Upload Dokumentasi Saat Mengisi/Lomba) -->
                <div>
                    <label class="block font-semibold mb-2">
                        <i class="fas fa-camera text-purple-500 mr-1"></i> Foto Dokumentasi Kegiatan (Bisa Multi)
                    </label>
                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-4 text-center hover:border-primary transition">
                        <input type="file" id="photos" name="photos[]" accept="image/*" multiple class="hidden" onchange="previewPhotos(event)">
                        <label for="photos" class="cursor-pointer block">
                            <div id="photosPreviewGrid" class="hidden grid grid-cols-3 gap-2 mb-3"></div>
                            <div id="photosPlaceholder">
                                <i class="fas fa-images text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Upload foto dokumentasi panggung / acara</p>
                                <p class="text-xs text-gray-400 mt-1">Pilih hingga 10 foto (maks 4MB/foto)</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Is Active -->
                <div class="md:col-span-2 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}
                               class="w-5 h-5 text-primary rounded border-gray-300 focus:ring-primary">
                        <div>
                            <span class="font-semibold block">Tampilkan di Portofolio</span>
                            <span class="text-xs text-gray-500">Centang agar achievement ini langsung terlihat oleh pengunjung</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-6 border-t border-gray-200 dark:border-gray-700 flex justify-end gap-3">
                <a href="{{ route('admin.achievements.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-6 py-2.5 rounded-xl text-gray-600 hover:text-gray-800 transition">
                    Batal
                </a>
                <button type="submit" class="neumorph-btn dark:neumorph-btn-dark px-8 py-2.5 rounded-xl bg-primary text-white hover:bg-primary-dark transition font-semibold flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan Achievement
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function updateLabels(category) {
    const titleLabel = document.getElementById('titleLabel');
    const titleInput = document.getElementById('title');
    const resultLabel = document.getElementById('resultLabel');
    const resultInput = document.getElementById('result');
    const resultHelp = document.getElementById('resultHelp');

    if (category === 'speaker') {
        titleLabel.innerText = 'Topik / Materi / Nama Seminar / Workshop *';
        titleInput.placeholder = 'contoh: Workshop Modern Web Architecture dengan Laravel & Vue';
        resultLabel.innerText = 'Peran sebagai Pemateri';
        resultInput.placeholder = 'contoh: Pemateri Utama, Keynote Speaker, Narasumber';
        resultHelp.innerText = 'Tuliskan peran kamu dalam kegiatan pemateri tersebut.';
    } else if (category === 'competition') {
        titleLabel.innerText = 'Nama Kompetisi / Lomba / Hackathon *';
        titleInput.placeholder = 'contoh: Gemastik XVII - Divisi IoT Smart Device';
        resultLabel.innerText = 'Hasil / Peringkat';
        resultInput.placeholder = 'contoh: Juara 1, Medali Emas, Finalis Nasional';
        resultHelp.innerText = 'Tuliskan pencapaian peringkat yang kamu raih.';
    } else if (category === 'certification') {
        titleLabel.innerText = 'Nama Sertifikasi / Pelatihan *';
        titleInput.placeholder = 'contoh: Certified Embedded Systems Engineer';
        resultLabel.innerText = 'Status / Nilai';
        resultInput.placeholder = 'contoh: Certified, Passed with Distinction';
        resultHelp.innerText = 'Tuliskan status kelulusan atau sertifikasi.';
    } else {
        titleLabel.innerText = 'Judul Penghargaan / Prestasi *';
        titleInput.placeholder = 'contoh: Best Innovation Award 2026';
        resultLabel.innerText = 'Penghargaan / Keterangan';
        resultInput.placeholder = 'contoh: Penerima Penghargaan, Awardee';
        resultHelp.innerText = 'Keterangan pencapaian.';
    }
}

// Initial update based on checked
document.addEventListener('DOMContentLoaded', function() {
    const checked = document.querySelector('input[name="category"]:checked');
    if (checked) {
        updateLabels(checked.value);
    }
});

function previewCertificate(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('certPreview').src = e.target.result;
            document.getElementById('certPreviewContainer').classList.remove('hidden');
            document.getElementById('certPlaceholder').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
}

function previewPhotos(event) {
    const files = event.target.files;
    const grid = document.getElementById('photosPreviewGrid');
    grid.innerHTML = '';
    if (files && files.length > 0) {
        grid.classList.remove('hidden');
        document.getElementById('photosPlaceholder').classList.add('hidden');
        Array.from(files).slice(0, 6).forEach(file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-20 object-cover rounded-lg border';
                grid.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endsection
