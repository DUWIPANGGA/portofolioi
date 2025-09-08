<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'metable_type',
        'metable_id',
        'title',
        'description',
        'keywords',
        'og_image'
    ];

    public function metable()
    {
        return $this->morphTo();
    }
}