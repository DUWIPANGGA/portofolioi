<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'section_name',
        'title',
        'content',
        'order',
        'is_active',
        'custom_data'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'custom_data' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}