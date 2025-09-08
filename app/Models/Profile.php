<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'bio',
        'avatar',
        'phone',
        'location',
        'cv_path',
        'social_links'
    ];

    // App/Models/Profile.php
protected $casts = [
    'social_links' => 'array',
];


 public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    public function getSocialLinksAttribute($value)
    {
        return json_decode($value, true) ?? [];
    }
}