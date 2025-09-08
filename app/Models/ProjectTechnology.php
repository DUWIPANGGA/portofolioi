<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectTechnology extends Pivot
{
    use HasFactory;

    protected $table = 'project_technology';
    
    protected $fillable = [
        'project_id',
        'technology_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}