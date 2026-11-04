@extends('layouts.app')

@section('title', 'Achievements & Speaker')
@section('subtitle', 'Kelola achievement, kompetisi, sertifikat pemateri, dan dokumentasi')

@section('content')
<div class="section space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h3 class="text-2xl font-bold flex items-center gap-2">
                <i class="fas fa-trophy text-yellow-500"></i> Achievements & Speaking
            </h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                Kelola portofolio prestasi lomba, sertifikat pemateri / speaker, serta dokumentasi kegiatan
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.achievements.index') }}" class="w-full md:w-64">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <div class="relative">
                    <input type="text" name="search" placeholder="Cari judul, acara, hasil..."
                           value="{{ request('search') }}"
                           class="w-full input-field dark:input-field pl-10 pr-4 py-2">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-500 dark:text-gray-400"></i>
                </div>
            </form>

            <!-- Create New Button -->
            <a href="{{ route('admin.achievements.create', ['category' => request('category', 'speaker')]) }}"
               class="neumorph-btn dark:neumorph-btn-dark px-4 py-2 rounded-xl text-primary hover:bg-primary hover:text-white transition flex items-center justify-center whitespace-nowrap font-medium">
                <i class="fas fa-plus mr-2"></i> Tambah Data
            </a>
        </div>
    </div>

    <!-- Category Filter Tabs -->
    <div class="flex flex-wrap gap-2 pb-2 border-b border-gray-200 dark:border-gray-700">
        <a href="{{ route('admin.achievements.index', array_merge(request()->except('category', 'page'))) }}"
           class="px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-2 {{ !request('category') ? 'bg-primary text-white shadow-md' : 'neumorph-btn dark:neumorph-btn-dark text-gray-700 dark:text-gray-300' }}">
            <i class="fas fa-layer-group"></i> Semua
            <span class="px-2 py-0.5 rounded-full text-xs {{ !request('category') ? 'bg-white/20 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                {{ $categoryCounts['all'] ?? 0 }}
            </span>
        </a>

        <a href="{{ route('admin.achievements.index', array_merge(request()->except('page'), ['category' => 'speaker'])) }}"
           class="px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-2 {{ request('category') === 'speaker' ? 'bg-purple-600 text-white shadow-md' : 'neumorph-btn dark:neumorph-btn-dark text-gray-700 dark:text-gray-300' }}">
            <i class="fas fa-microphone-alt text-purple-400"></i> Speaker & Pemateri
            <span class="px-2 py-0.5 rounded-full text-xs {{ request('category') === 'speaker' ? 'bg-white/20 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                {{ $categoryCounts['speaker'] ?? 0 }}
            </span>
        </a>

        <a href="{{ route('admin.achievements.index', array_merge(request()->except('page'), ['category' => 'competition'])) }}"
           class="px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-2 {{ request('category') === 'competition' ? 'bg-amber-500 text-white shadow-md' : 'neumorph-btn dark:neumorph-btn-dark text-gray-700 dark:text-gray-300' }}">
            <i class="fas fa-trophy text-amber-300"></i> Kompetisi & Lomba
            <span class="px-2 py-0.5 rounded-full text-xs {{ request('category') === 'competition' ? 'bg-white/20 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                {{ $categoryCounts['competition'] ?? 0 }}
            </span>
        </a>

        <a href="{{ route('admin.achievements.index', array_merge(request()->except('page'), ['category' => 'certification'])) }}"
           class="px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-2 {{ request('category') === 'certification' ? 'bg-blue-600 text-white shadow-md' : 'neumorph-btn dark:neumorph-btn-dark text-gray-700 dark:text-gray-300' }}">
            <i class="fas fa-certificate text-blue-300"></i> Sertifikasi
            <span class="px-2 py-0.5 rounded-full text-xs {{ request('category') === 'certification' ? 'bg-white/20 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                {{ $categoryCounts['certification'] ?? 0 }}
            </span>
        </a>

        <a href="{{ route('admin.achievements.index', array_merge(request()->except('page'), ['category' => 'award'])) }}"
           class="px-4 py-2 rounded-xl text-sm font-semibold transition flex items-center gap-2 {{ request('category') === 'award' ? 'bg-emerald-600 text-white shadow-md' : 'neumorph-btn dark:neumorph-btn-dark text-gray-700 dark:text-gray-300' }}">
            <i class="fas fa-medal text-emerald-300"></i> Penghargaan
            <span class="px-2 py-0.5 rounded-full text-xs {{ request('category') === 'award' ? 'bg-white/20 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300' }}">
                {{ $categoryCounts['award'] ?? 0 }}
            </span>
        </a>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
        <div class="p-4 rounded-xl bg-green-100 dark:bg-green-900/40 border border-green-300 dark:border-green-700 text-green-800 dark:text-green-300 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-lg"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
        @if($achievements->isEmpty())
            <div class="text-center py-16 px-4">
                <div class="mx-auto w-24 h-24 rounded-full neumorph dark:neumorph-dark mb-4 flex items-center justify-center text-primary">
                    @if(request('category') === 'speaker')
                        <i class="fas fa-microphone-alt text-4xl text-purple-500"></i>
                    @else
                        <i class="fas fa-trophy text-4xl text-yellow-500"></i>
                    @endif
                </div>
                <h4 class="text-xl font-bold mb-2">Belum ada data achievement</h4>
                <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-6">
                    @if(request()->has('search'))
                        Tidak ada achievement yang cocok dengan pencarian "{{ request('search') }}".
                    @elseif(request('category') === 'speaker')
                        Belum ada data sertifikat as pemateri / speaker. Tambahkan pengalaman dan sertifikat sebagai pembicara kamu sekarang!
                    @else
                        Mulai tambahkan prestasi lomba atau sertifikat pemateri kamu lengkap dengan foto dokumentasi.
                    @endif
                </p>
                <a href="{{ route('admin.achievements.create', ['category' => request('category', 'speaker')]) }}"
                   class="neumorph-btn dark:neumorph-btn-dark px-6 py-2.5 rounded-xl bg-primary text-white hover:bg-primary-dark transition inline-flex items-center gap-2 font-medium">
                    <i class="fas fa-plus"></i> Tambah Data Sekarang
                </a>
            </div>
        @else
            <!-- Achievements Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                @foreach($achievements as $achievement)
                    <div class="neumorph-card dark:neumorph-card-dark rounded-2xl p-5 hover:shadow-xl transition-all duration-300 flex flex-col justify-between border border-gray-100 dark:border-gray-800">
                        <div>
                            <!-- Cover: sertifikat atau foto pertama -->
                            <div class="relative mb-4 group rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                                @php
                                    $cover = $achievement->certificate_image
                                        ?: (($achievement->photos && count($achievement->photos)) ? $achievement->photos[0] : null);
                                    
                                    $badgeColor = match($achievement->category) {
                                        'speaker' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/60 dark:text-purple-300 border-purple-300',
                                        'competition' => 'bg-amber-100 text-amber-800 dark:bg-amber-900/60 dark:text-amber-300 border-amber-300',
                                        'certification' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/60 dark:text-blue-300 border-blue-300',
                                        'award' => 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/60 dark:text-emerald-300 border-emerald-300',
                                        default => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300 border-gray-300',
                                    };
                                @endphp

                                @if($cover)
                                    <img src="{{ Storage::url($cover) }}"
                                         alt="{{ $achievement->title }}"
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-48 flex items-center justify-center text-gray-400">
                                        <i class="fas {{ $achievement->category_icon }} text-5xl"></i>
                                    </div>
                                @endif

                                <!-- Category Badge -->
                                <div class="absolute top-3 left-3">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold border backdrop-blur-md {{ $badgeColor }} flex items-center gap-1.5 shadow-sm">
                                        <i class="fas {{ $achievement->category_icon }}"></i>
                                        {{ $achievement->category_label }}
                                    </span>
                                </div>

                                <!-- Photo count badge -->
                                @if($achievement->photos && count($achievement->photos))
                                    <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-full text-xs font-semibold bg-black/70 text-white backdrop-blur-sm flex items-center gap-1">
                                        <i class="fas fa-images"></i> {{ count($achievement->photos) }} Foto
                                    </div>
                                @endif
                                
                                @if($achievement->certificate_image)
                                    <div class="absolute bottom-3 left-3 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-blue-600/90 text-white backdrop-blur-sm flex items-center gap-1">
                                        <i class="fas fa-file-certificate"></i> Ada Sertifikat
                                    </div>
                                @endif
                            </div>

                            <!-- Info -->
                            <div class="space-y-2.5">
                                <h4 class="font-bold text-lg leading-snug line-clamp-2 text-gray-900 dark:text-white" title="{{ $achievement->title }}">
                                    {{ $achievement->title }}
                                </h4>

                                @if($achievement->organizer)
                                    <p class="text-gray-600 dark:text-gray-400 text-sm flex items-center gap-1.5">
                                        <i class="fas fa-building text-xs text-gray-400"></i>
                                        <span class="truncate">{{ $achievement->organizer }}</span>
                                    </p>
                                @endif

                                <div class="flex flex-wrap gap-2 pt-1">
                                    @if($achievement->result)
                                        <span class="px-3 py-1 rounded-lg text-xs font-bold bg-yellow-100 dark:bg-yellow-900/40 text-yellow-800 dark:text-yellow-300 border border-yellow-200 dark:border-yellow-800">
                                            @if($achievement->category === 'speaker')
                                                <i class="fas fa-user-tie mr-1"></i>{{ $achievement->result }}
                                            @else
                                                🏆 {{ $achievement->result }}
                                            @endif
                                        </span>
                                    @endif
                                    @if($achievement->event_date)
                                        <span class="px-3 py-1 rounded-lg text-xs font-medium bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                                            <i class="fas fa-calendar-alt mr-1 text-gray-400"></i>{{ $achievement->event_date->format('d M Y') }}
                                        </span>
                                    @endif
                                </div>

                                @if($achievement->description)
                                    <p class="text-gray-600 dark:text-gray-400 text-xs line-clamp-2 pt-1 leading-relaxed">
                                        {{ $achievement->description }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <!-- Footer Actions -->
                        <div class="mt-5 pt-3 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                            <!-- Toggle Active -->
                            <form action="{{ route('admin.achievements.toggle-active', $achievement) }}" method="POST">
                                @csrf
                                <button type="submit" 
                                        class="px-2.5 py-1 rounded-full text-xs font-medium transition cursor-pointer flex items-center gap-1 {{ $achievement->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300 hover:bg-green-200' : 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 hover:bg-gray-200' }}"
                                        title="Klik untuk ubah status tayang">
                                    <span class="w-2 h-2 rounded-full {{ $achievement->is_active ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                                    {{ $achievement->is_active ? 'Aktif' : 'Nonaktif' }}
                                </button>
                            </form>

                            <div class="flex items-center gap-1.5">
                                <a href="{{ route('admin.achievements.show', $achievement) }}"
                                   class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-primary hover:bg-primary hover:text-white transition"
                                   title="Lihat Detail & Foto">
                                    <i class="fas fa-eye text-xs"></i>
                                </a>
                                <a href="{{ route('admin.achievements.edit', $achievement) }}"
                                   class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-blue-500 hover:bg-blue-500 hover:text-white transition"
                                   title="Edit Data">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data achievement ini beserta seluruh fotonya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="neumorph-btn dark:neumorph-btn-dark w-8 h-8 rounded-full flex items-center justify-center text-red-500 hover:bg-red-500 hover:text-white transition"
                                            title="Hapus Data">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($achievements->hasPages())
                <div class="neumorph-inset dark:neumorph-inset-dark px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                    {{ $achievements->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection