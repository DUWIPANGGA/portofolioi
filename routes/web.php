<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CustomSectionController;
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\MediaController;
    use App\Http\Controllers\SkillController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ProjectController;
    use App\Http\Controllers\SeoMetaController;
    use App\Http\Controllers\ServiceController;
    use App\Http\Controllers\PageViewController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\EducationController;
    use App\Http\Controllers\ExperienceController;
    use App\Http\Controllers\SubscriberController;
    use App\Http\Controllers\TechnologyController;
    use App\Http\Controllers\TestimonialController;
    use App\Http\Controllers\ThemeSettingController;
    use App\Http\Controllers\PortfolioStatController;
    use App\Http\Controllers\ContactMessageController;
    use App\Http\Controllers\DevelopmentProcessController;
    use App\Http\Controllers\ProjectTechnologyPivotController;
    use App\Http\Controllers\FormSubmissionController;
    
    Route::get('/', [PortfolioController::class,'index']);
    Route::get('/1', function () {
        return view('welcome');
    });
    Route::get('dog', function () {
        return view('dog');
    });
    Route::get('car', function () {
        return view('car');
    });
    Route::get('login', function () {
        return view('auth.login');
    });
    Route::get('card', function () {
        return view('card');
    });
    
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile{', [ProfileController::class, 'update'])->name('profile.update');
        Route::patch('pages/{page}/toggle-status', [PageController::class, 'toggleStatus'])->name('admin.pages.toggle-status');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('users', UserController::class);
            Route::resource('profiles', ProfileController::class);
            Route::resource('services', ServiceController::class);
            Route::resource('technologies', TechnologyController::class);
            Route::resource('experience', ExperienceController::class);
            Route::resource('educations', EducationController::class);
            Route::resource('skills', SkillController::class);
            Route::resource('custom_sections', CustomSectionController::class);
            Route::resource('portfolio-stats', PortfolioStatController::class);
            Route::resource('projects', ProjectController::class);
            Route::resource('project-technology-pivots', ProjectTechnologyPivotController::class);
            Route::resource('testimonials', TestimonialController::class);
            Route::resource('posts', PostController::class);
            Route::resource('contact-messages', ContactMessageController::class);
            Route::resource('form-submissions', FormSubmissionController::class);
            Route::resource('subscribers', SubscriberController::class);
            Route::resource('media', MediaController::class);
            Route::resource('pages', PageController::class);
            Route::resource('settings', SettingController::class);
            Route::resource('theme-settings', ThemeSettingController::class);
            Route::resource('seo-metas', SeoMetaController::class);
            Route::resource('page-views', PageViewController::class);
            Route::resource('development_processes', DevelopmentProcessController::class);
            Route::resource('sertifikat', CertificateController::class);
            Route::post('/sertifikat/{certificate}/toggle-active', [CertificateController::class, 'toggleActive'])->name('certificates.toggle-active');
            Route::post('/sertifikat/update-order', [CertificateController::class, 'updateOrder'])->name('certificates.update-order');
        });
        // Theme settings routes
    });
    
    require __DIR__.'/auth.php';
