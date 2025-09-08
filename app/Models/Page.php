<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'seo_title',
        'seo_description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metable');
    }
}