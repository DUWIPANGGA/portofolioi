@extends('layouts.app')

@section('title', 'Edit Achievement / Speaker')
@section('subtitle', 'Perbarui data achievement atau sertifikat pemateri')

@section('content')
<div class="section max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h3 class="text-2xl font-bold flex items-center gap-2">
                <i class="fas fa-edit text-blue-500"></i> Edit: {{ $achievement->title }}
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Kategori saat ini: <span class="font-semibold text-primary">{{ $achievement->category_label }}</span>
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.achievements.show', $achievement) }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-primary hover:bg-primary hover:text-white transition flex items-center gap-2 text-sm">
                <i class="fas fa-eye"></i> Lihat Detail
            </a>
            <a href="{{ route('admin.achievements.index') }}" class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-gray-600 hover:text-primary transition flex items-center gap-2 text-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
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
        <form action="{{ route('admin.achievements.update', $achievement) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Kategori / Jenis -->
            <div>
                <label class="block font-semibold mb-2">Kategori Kegiatan *</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="speaker" class="sr-only peer" 
                               {{ old('category', $achievement->category) === 'speaker' ? 'checked' : '' }}
                               onchange="updateLabels('speaker')">
                        <div class="p-3.5 rounded-xl border-2 text-center transition peer-checked:border-purple-600 peer-checked:bg-purple-50 dark:peer-checked:bg-purple-950/40 peer-checked:text-purple-600 border-gray-200 dark:border-gray-700 hover:border-gray-300">
                            <i class="fas fa-microphone-alt text-2xl mb-1 block"></i>
                            <span class="font-bold text-sm">Speaker / Pemateri</span>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="competition" class="sr-only peer"
                               {{ old('category', $achievement->category) === 'competition' ? 'checked' : '' }}
                               onchange="updateLabels('competition')">
                        <div class="p-3.5 rounded-xl border-2 text-center transition peer-checked:border-amber-500 peer-checked:bg-amber-50 dark:peer-checked:bg-amber-950/40 peer-checked:text-amber-600 border-gray-200 dark:border-gray-700 hover:border-gray-300">
                            <i class="fas fa-trophy text-2xl mb-1 block"></i>
                            <span class="font-bold text-sm">Kompetisi / Lomba</span>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="certification" class="sr-only peer"
                               {{ old('category', $achievement->category) === 'certification' ? 'checked' : '' }}
                               onchange="updateLabels('certification')">
                        <div class="p-3.5 rounded-xl border-2 text-center transition peer-checked:border-blue-600 peer-checked:bg-blue-50 dark:peer-checked:bg-blue-950/40 peer-checked:text-blue-600 border-gray-200 dark:border-gray-700 hover:border-gray-300">
                            <i class="fas fa-certificate text-2xl mb-1 block"></i>
                            <span class="font-bold text-sm">Sertifikasi</span>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="category" value="award" class="sr-only peer"
                               {{ old('category', $achievement->category) === 'award' ? 'checked' : '' }}
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
                    <input type="text" id="title" name="title" value="{{ old('title', $achievement->title) }}" 
                           class="w-full input-field dark:input-field" required>
                </div>

                <!-- Organizer -->
                <div>
                    <label for="organizer" id="organizerLabel" class="block font-semibold mb-2">
                        Penyelenggara / Institusi / Komunitas
                    </label>
                    <input type="text" id="organizer" name="organizer" value="{{ old('organizer', $achievement->organizer) }}"
                           class="w-full input-field dark:input-field">
                </div>

                <!-- Result / Role -->
                <div>
                    <label for="result" id="resultLabel" class="block font-semibold mb-2">
                        Peran / Peringkat
                    </label>
                    <input type="text" id="result" name="result" value="{{ old('result', $achievement->result) }}"
                           class="w-full input-field dark:input-field">
                    <p class="text-xs text-gray-500 mt-1" id="resultHelp">
                        Contoh: "Pemateri Workshop", "Keynote Speaker", "Juara 1", "Medali Emas".
                    </p>
                </div>

                <!-- Event Date -->
                <div>
                    <label for="event_date" class="block font-semibold mb-2">Tanggal Pelaksanaan</label>
                    <input type="date" id="event_date" name="event_date" 
                           value="{{ old('event_date', optional($achievement->event_date)->format('Y-m-d')) }}"
                           class="w-full input-field dark:input-field">
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="block font-semibold mb-2">Urutan Tampil (Order)</label>
                    <input type="number" id="order" name="order" value="{{ old('order', $achievement->order) }}" min="0"
                           class="w-full input-field dark:input-field">
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block font-semibold mb-2">Deskripsi / Ringkasan Acara</label>
                    <textarea id="description" name="description" rows="3"
                              class="w-full input-field dark:input-field">{{ old('description', $achievement->description) }}</textarea>
                </div>

                <!-- Certificate Image (Upload Piagam/Sertifikat) -->
                <div>
                    <label class="block font-semibold mb-2">
                        <i class="fas fa-file-contract text-blue-500 mr-1"></i> File Sertifikat (Gambar)
                    </label>

                    @if($achievement->certificate_image)
                        <div class="mb-3 p-2 rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                            <p class="text-xs text-gray-500 mb-1 font-semibold">Sertifikat Saat Ini:</p>
                            <img src="{{ Storage::url($achievement->certificate_image) }}" alt="Current Certificate" class="max-h-40 rounded-lg mx-auto object-contain">
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-4 text-center hover:border-primary transition">
                        <input type="file" id="certificate_image" name="certificate_image" accept="image/*" class="hidden" onchange="previewCertificate(event)">
                        <label for="certificate_image" class="cursor-pointer block">
                            <div id="certPreviewContainer" class="hidden mb-3">
                                <img id="certPreview" src="" alt="Preview Sertifikat Baru" class="max-h-48 mx-auto rounded-lg shadow-sm border">
                            </div>
                            <div id="certPlaceholder">
                                <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                                    {{ $achievement->certificate_image ? 'Ganti Sertifikat' : 'Upload Sertifikat' }}
                                </p>
                                <p class="text-xs text-gray-400 mt-0.5">PNG, JPG, WEBP maksimal 4MB</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Photos Documentation -->
                <div>
                    <label class="block font-semibold mb-2">
                        <i class="fas fa-camera text-purple-500 mr-1"></i> Foto Dokumentasi Kegiatan
                    </label>

                    @if($achievement->photos && count($achievement->photos))
                        <div class="mb-3">
                            <p class="text-xs text-gray-500 mb-2 font-semibold">Foto saat ini (Centang kotak merah untuk menghapus):</p>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach($achievement->photos as $photo)
                                    <div class="relative group rounded-lg overflow-hidden border">
                                        <img src="{{ Storage::url($photo) }}" alt="Foto" class="w-full h-20 object-cover">
                                        <label class="absolute top-1 right-1 bg-red-600/90 text-white rounded p-1 text-xs cursor-pointer flex items-center gap-1">
                                            <input type="checkbox" name="remove_photos[]" value="{{ $photo }}" class="w-3.5 h-3.5">
                                            <span>Hapus</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-4 text-center hover:border-primary transition">
                        <input type="file" id="photos" name="photos[]" accept="image/*" multiple class="hidden" onchange="previewPhotos(event)">
                        <label for="photos" class="cursor-pointer block">
                            <div id="photosPreviewGrid" class="hidden grid grid-cols-3 gap-2 mb-3"></div>
                            <div id="photosPlaceholder">
                                <i class="fas fa-images text-2xl text-gray-400 mb-1"></i>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Tambah Foto Dokumentasi Baru</p>
                                <p class="text-xs text-gray-400 mt-0.5">Pilih foto tambahan untuk diupload</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Is Active -->
                <div class="md:col-span-2 pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $achievement->is_active) ? 'checked' : '' }}
                               class="w-5 h-5 text-primary rounded border-gray-300 focus:ring-primary">
                        <div>
                            <span class="font-semibold block">Tampilkan di Portofolio</span>
                            <span class="text-xs text-gray-500">Centang agar achievement ini tampil di halaman utama</span>
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
                    <i class="fas fa-save"></i> Perbarui Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function updateLabels(category) {
    const titleLabel = document.getElementById('titleLabel');
    const resultLabel = document.getElementById('resultLabel');
    const resultHelp = document.getElementById('resultHelp');

    if (category === 'speaker') {
        titleLabel.innerText = 'Topik / Materi / Nama Seminar / Workshop *';
        resultLabel.innerText = 'Peran sebagai Pemateri';
        resultHelp.innerText = 'Tuliskan peran kamu dalam kegiatan pemateri tersebut (contoh: Keynote Speaker, Pemateri Workshop).';
    } else if (category === 'competition') {
        titleLabel.innerText = 'Nama Kompetisi / Lomba / Hackathon *';
        resultLabel.innerText = 'Hasil / Peringkat';
        resultHelp.innerText = 'Tuliskan pencapaian peringkat yang kamu raih (contoh: Juara 1, Finalis Nasional).';
    } else if (category === 'certification') {
        titleLabel.innerText = 'Nama Sertifikasi / Pelatihan *';
        resultLabel.innerText = 'Status / Nilai';
        resultHelp.innerText = 'Tuliskan status kelulusan atau sertifikasi.';
    } else {
        titleLabel.innerText = 'Judul Penghargaan / Prestasi *';
        resultLabel.innerText = 'Penghargaan / Keterangan';
        resultHelp.innerText = 'Keterangan pencapaian.';
    }
}

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
