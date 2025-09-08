<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;
protected $table = 'technologies';
    protected $fillable = [
        'user_id',
        'name',
        'icon',
        'category',
        'is_checked',
        'order'
    ];

    protected $casts = [
        'is_checked' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}