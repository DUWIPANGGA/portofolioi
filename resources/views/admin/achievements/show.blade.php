@extends('layouts.app')

@section('title', 'Detail Achievement / Speaker')
@section('subtitle', $achievement->title)

@section('content')
<div class="section max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                @php
                    $badgeColor = match($achievement->category) {
                        'speaker' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/60 dark:text-purple-300 border-purple-300',
                        'competition' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/60 dark:text-amber-300 border-amber-300',
                        'certification' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/60 dark:text-blue-300 border-blue-300',
                        'award' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/60 dark:text-emerald-300 border-emerald-300',
                        default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 border-gray-300',
                    };
                @endphp
                <span class="px-3 py-1 rounded-full text-xs font-bold border {{ $badgeColor }} flex items-center gap-1.5">
                    <i class="fas {{ $achievement->category_icon }}"></i>
                    {{ $achievement->category_label }}
                </span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $achievement->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900/60 dark:text-green-300' : 'bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300' }}">
                    {{ $achievement->is_active ? 'Aktif Tayang' : 'Nonaktif' }}
                </span>
            </div>
            <h3 class="text-2xl font-bold">{{ $achievement->title }}</h3>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.achievements.edit', $achievement) }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-blue-600 hover:bg-blue-600 hover:text-white transition flex items-center gap-2 text-sm font-medium">
                <i class="fas fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.achievements.index') }}" 
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-gray-600 hover:text-primary transition flex items-center gap-2 text-sm font-medium">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Details Card -->
    <div class="neumorph-3d dark:neumorph-3d-dark p-6 md:p-8 rounded-2xl">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold uppercase">Penyelenggara / Institusi</p>
                <p class="text-base font-bold mt-1 text-gray-900 dark:text-white">
                    {{ $achievement->organizer ?? '-' }}
                </p>
            </div>

            <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold uppercase">
                    {{ $achievement->category === 'speaker' ? 'Peran Pemateri' : 'Hasil / Peringkat' }}
                </p>
                <p class="text-base font-bold mt-1 text-yellow-600 dark:text-yellow-400">
                    {{ $achievement->result ?? '-' }}
                </p>
            </div>

            <div class="p-4 rounded-xl bg-gray-50 dark:bg-gray-800/50 border border-gray-200 dark:border-gray-700">
                <p class="text-xs text-gray-500 dark:text-gray-400 font-semibold uppercase">Tanggal Pelaksanaan</p>
                <p class="text-base font-bold mt-1 text-gray-900 dark:text-white">
                    {{ $achievement->event_date ? $achievement->event_date->format('d F Y') : '-' }}
                </p>
            </div>
        </div>

        @if($achievement->description)
            <div class="mb-8 p-5 rounded-xl bg-gray-50 dark:bg-gray-800/30 border border-gray-200 dark:border-gray-700">
                <h4 class="font-bold text-sm mb-2 uppercase text-gray-600 dark:text-gray-400 tracking-wider">
                    Deskripsi / Cerita Singkat
                </h4>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                    {{ $achievement->description }}
                </p>
            </div>
        @endif

        <!-- Certificate Image -->
        <div class="mb-8">
            <h4 class="font-bold text-base mb-3 flex items-center gap-2">
                <i class="fas fa-file-certificate text-blue-500"></i> Sertifikat (Piagam)
            </h4>
            @if($achievement->certificate_image)
                <div class="p-3 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                    <img src="{{ Storage::url($achievement->certificate_image) }}" 
                         alt="{{ $achievement->title }}" 
                         class="max-h-96 mx-auto rounded-xl object-contain shadow-md">
                    <div class="text-center mt-3">
                        <a href="{{ Storage::url($achievement->certificate_image) }}" target="_blank"
                           class="inline-flex items-center gap-1.5 text-sm text-primary hover:underline font-semibold">
                            <i class="fas fa-external-link-alt"></i> Buka Gambar Ukuran Penuh
                        </a>
                    </div>
                </div>
            @else
                <div class="p-6 text-center rounded-xl border border-dashed border-gray-300 dark:border-gray-700 text-gray-500">
                    <i class="fas fa-file-image text-3xl mb-2 text-gray-400"></i>
                    <p class="text-sm">Belum ada file sertifikat yang diunggah.</p>
                </div>
            @endif
        </div>

        <!-- Documentation Photos -->
        <div>
            <h4 class="font-bold text-base mb-3 flex items-center gap-2">
                <i class="fas fa-camera text-purple-500"></i> Foto Dokumentasi Kegiatan
                @if($achievement->photos)
                    <span class="text-xs px-2 py-0.5 rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900/60 dark:text-purple-300 font-semibold">
                        {{ count($achievement->photos) }} Foto
                    </span>
                @endif
            </h4>

            @if($achievement->photos && count($achievement->photos))
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($achievement->photos as $photo)
                        <div class="rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 group relative">
                            <img src="{{ Storage::url($photo) }}" alt="Dokumentasi" class="w-full h-44 object-cover group-hover:scale-105 transition duration-300">
                            <a href="{{ Storage::url($photo) }}" target="_blank"
                               class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center text-white text-sm font-semibold gap-1">
                                <i class="fas fa-expand"></i> Lihat
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="p-6 text-center rounded-xl border border-dashed border-gray-300 dark:border-gray-700 text-gray-500">
                    <i class="fas fa-images text-3xl mb-2 text-gray-400"></i>
                    <p class="text-sm">Belum ada foto dokumentasi yang diunggah.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
