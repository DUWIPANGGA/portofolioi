<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'primary_color',
        'secondary_color',
        'dark_mode_primary',
        'dark_mode_secondary',
        'font_family',
        'enable_neumorphism',
        'custom_css'
    ];

    protected $casts = [
        'enable_neumorphism' => 'boolean',
        'custom_css' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}