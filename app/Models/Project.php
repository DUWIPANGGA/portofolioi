<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
protected $table = 'projects';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'image_path',
        'featured_image_path',
        'is_featured',
        'project_date',
        'client',
        'demo_url',
        'case_study_url',
        'technologies',
        'order'
    ];

    protected $casts = [
        'technologies' => 'array',
        'project_date' => 'date',
        'is_featured' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technology')
                    ->using(ProjectTechnology::class)
                    ->withTimestamps();
    }

    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'metable');
    }
}