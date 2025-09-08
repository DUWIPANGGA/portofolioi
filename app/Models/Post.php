<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'category',
        'published_at',
        'is_published',
        'reading_time',
        'tags'
    ];

    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
        'is_published' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metable');
    }
    public function scopePublished($query)
{
    return $query->where('is_published', true)
                 ->whereNotNull('published_at')
                 ->where('published_at', '<=', now());
}
}