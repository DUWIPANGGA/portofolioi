<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'title',
        'organizer',
        'result',
        'event_date',
        'description',
        'certificate_image',
        'photos',
        'order',
        'is_active'
    ];

    protected $casts = [
        'event_date' => 'date',
        'photos' => 'array',
        'is_active' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('event_date', 'desc');
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getCategoryLabelAttribute()
    {
        return match ($this->category) {
            'speaker' => 'Speaker & Pemateri',
            'competition' => 'Kompetisi & Lomba',
            'certification' => 'Sertifikasi',
            'award' => 'Penghargaan',
            default => ucfirst($this->category ?? 'Achievement'),
        };
    }

    public function getCategoryIconAttribute()
    {
        return match ($this->category) {
            'speaker' => 'fa-microphone-alt',
            'competition' => 'fa-trophy',
            'certification' => 'fa-certificate',
            'award' => 'fa-medal',
            default => 'fa-award',
        };
    }
}
