<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'client_name',
        'client_position',
        'client_company',
        'client_avatar',
        'content',
        'rating',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'rating' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}