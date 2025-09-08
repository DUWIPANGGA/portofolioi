<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

public function profile()
{
    return $this->hasOne(Profile::class, 'user_id'); 
}


    public function experiences()
    {
        return $this->hasMany(Experience::class)->orderBy('order');
    }

    public function educations()
    {
        return $this->hasMany(Education::class)->orderBy('order');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class)->orderBy('order');
    }

    public function projects()
    {
        return $this->hasMany(Project::class)->orderBy('order');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class)->orderBy('order');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class)->orderBy('order');
    }

    public function themeSettings()
    {
        return $this->hasOne(ThemeSetting::class);
    }

    public function portfolioStats()
    {
        return $this->hasOne(PortfolioStat::class);
    }
    
}