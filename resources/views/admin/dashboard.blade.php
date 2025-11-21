@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="section">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-semibold">Dashboard</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Welcome to your administration panel</p>
        </div>
        
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-primary dark:text-gray-400">
                        <i class="fas fa-home mr-2"></i>
                        Home
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-xs text-gray-400 mx-2"></i>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Dashboard</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Users Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden bg-primary text-white">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-black opacity-90">Total Users</p>
                        <h3 class="text-2xl text-black font-bold">{{ $stats['users'] ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full text-black bg-white bg-opacity-20 flex items-center justify-center">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="px-6 py-3 bg-primary-dark bg-opacity-50 flex items-center justify-between text-black">
                <a href="{{ route('admin.users.index') }}" class="text-sm text-black hover:underline opacity-90 ">View Details</a>
                <i class="fas fa-arrow-right text-sm opacity-90"></i>
            </div>
        </div>

        <!-- Projects Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden bg-success text-white">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-black opacity-90">Total Projects</p>
                        <h3 class="text-2xl font-bold text-black">{{ $stats['projects'] ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-gray-500 bg-opacity-20 flex items-center justify-center text-black">
                        <i class="fas fa-project-diagram text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="px-6 py-3 bg-success-dark bg-opacity-50 flex items-center justify-between text-black">
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-dark hover:underline opacity-90 ">View Details</a>
                <i class="fas fa-arrow-right text-sm opacity-90"></i>
            </div>
        </div>

        <!-- Certificates Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden bg-info text-black">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-black opacity-90">Total Certificates</p>
                        <h3 class="text-2xl font-bold">{{ $stats['certificates'] ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-gray-500 bg-opacity-20 flex items-center justify-center text-black">
                        <i class="fas fa-certificate text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="px-6 py-3 bg-info-dark bg-opacity-50 flex items-center justify-between text-black">
                <a href="{{ route('admin.sertifikat.index') }}" class="text-sm text-black hover:underline opacity-90">View Details</a>
                <i class="fas fa-arrow-right text-sm opacity-90"></i>
            </div>
        </div>

        <!-- Messages Card -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden bg-warning text-black">
            <div class="p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-black opacity-90">Contact Messages</p>
                        <h3 class="text-2xl font-bold">{{ $stats['messages'] ?? 0 }}</h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-gray-500 bg-opacity-20 flex items-center justify-center text-black">
                        <i class="fas fa-envelope text-xl"></i>
                    </div>
                </div>
            </div>
            <div class="px-6 py-3 bg-warning-dark bg-opacity-50 flex items-center justify-between text-black">
                <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-black hover:underline opacity-90">View Details</a>
                <i class="fas fa-arrow-right text-sm opacity-90"></i>
            </div>
        </div>
    </div>

    <!-- Quick Access Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Content Management -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-file-alt mr-2 text-primary"></i>
                Content Management
            </h3>
            <div class="space-y-2">
                <a href="{{ route('admin.pages.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Pages</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.posts.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Blog Posts</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Services</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Testimonials</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
            </div>
        </div>

        <!-- Portfolio Management -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-briefcase mr-2 text-primary"></i>
                Portfolio Management
            </h3>
            <div class="space-y-2">
                <a href="{{ route('admin.projects.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Projects</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.sertifikat.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Certificates</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.technologies.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Technologies</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.skills.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Skills</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
            </div>
        </div>

        <!-- System Management -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6">
            <h3 class="text-lg font-semibold mb-4 flex items-center">
                <i class="fas fa-cog mr-2 text-primary"></i>
                System Management
            </h3>
            <div class="space-y-2">
                <a href="{{ route('admin.users.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Users</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.theme-settings.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Theme Settings</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.media.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Media Library</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                    <span>Settings</span>
                    <i class="fas fa-arrow-right text-sm text-gray-400"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Recent Projects -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <div class="flex items-center">
                    <i class="fas fa-project-diagram mr-2 text-primary"></i>
                    <h3 class="text-lg font-semibold">Recent Projects</h3>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-primary hover:underline">View All</a>
            </div>
            <div class="p-6">
                @if(isset($recentProjects) && $recentProjects->count() > 0)
                <div class="space-y-4">
                    @foreach($recentProjects as $project)
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                        <div>
                            <h4 class="font-medium">{{ $project->title }}</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $project->created_at->format('M d, Y') }}</p>
                        </div>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="text-primary hover:text-primary-dark">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No recent projects</p>
                @endif
            </div>
        </div>

        <!-- Recent Certificates -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <div class="flex items-center">
                    <i class="fas fa-certificate mr-2 text-primary"></i>
                    <h3 class="text-lg font-semibold">Recent Certificates</h3>
                </div>
                <a href="{{ route('admin.sertifikat.index') }}" class="text-sm text-primary hover:underline">View All</a>
            </div>
            <div class="p-6">
                @if(isset($recentCertificates) && $recentCertificates->count() > 0)
                <div class="space-y-4">
                    @foreach($recentCertificates as $certificate)
                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                        <div class="flex-1 min-w-0">
                            <h4 class="font-medium truncate">{{ $certificate->title }}</h4>
                            <div class="flex items-center mt-1 space-x-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $certificate->issuer }}</span>
                                <span class="px-2 py-1 rounded-full text-xs font-medium {{ $certificate->status_badge }}">
                                    {{ ucfirst($certificate->status) }}
                                </span>
                            </div>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                Issued: {{ $certificate->issue_date->format('M Y') }}
                            </p>
                        </div>
                        <a href="{{ route('admin.sertifikat.edit', $certificate->id) }}" class="text-primary hover:text-primary-dark ml-2">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No recent certificates</p>
                @endif
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl overflow-hidden">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                <div class="flex items-center">
                    <i class="fas fa-envelope mr-2 text-primary"></i>
                    <h3 class="text-lg font-semibold">Recent Messages</h3>
                </div>
                <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-primary hover:underline">View All</a>
            </div>
            <div class="p-6">
                @if(isset($recentMessages) && $recentMessages->count() > 0)
                <div class="space-y-4">
                    @foreach($recentMessages as $message)
                    <a href="{{ route('admin.contact-messages.show', $message->id) }}" class="block p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-200 transition">
                        <div class="flex justify-between items-start">
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium truncate">{{ $message->name }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400 truncate">{{ Str::limit($message->message, 50) }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">{{ $message->email }}</p>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap ml-2">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No recent messages</p>
                @endif
            </div>
        </div>
    </div>

    <!-- System Information -->
    <div class="neumorph-3d dark:neumorph-3d-dark rounded-xl p-6 mb-8">
        <h3 class="text-lg font-semibold mb-4 flex items-center">
            <i class="fas fa-info-circle mr-2 text-primary"></i>
            System Information
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-dark-200">
                <span class="text-gray-700 dark:text-gray-300">Laravel Version</span>
                <span class="text-sm font-medium text-primary">{{ app()->version() }}</span>
            </div>
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-dark-200">
                <span class="text-gray-700 dark:text-gray-300">PHP Version</span>
                <span class="text-sm font-medium text-primary">{{ PHP_VERSION }}</span>
            </div>
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-dark-200">
                <span class="text-gray-700 dark:text-gray-300">Environment</span>
                <span class="text-sm font-medium text-primary">{{ app()->environment() }}</span>
            </div>
            <div class="flex items-center justify-between p-3 rounded-lg bg-gray-100 dark:bg-dark-200">
                <span class="text-gray-700 dark:text-gray-300">Debug Mode</span>
                <span class="text-sm font-medium {{ config('app.debug') ? 'text-green-600' : 'text-gray-600' }}">
                    {{ config('app.debug') ? 'Enabled' : 'Disabled' }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection