<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'path',
        'mime_type',
        'size',
        'custom_properties'
    ];

    protected $casts = [
        'custom_properties' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}