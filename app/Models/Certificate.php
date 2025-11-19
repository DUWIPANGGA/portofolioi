<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'issuer',
        'issue_date',
        'expiry_date',
        'credential_id',
        'credential_url',
        'description',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
        'is_active' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk sertifikat aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk mengurutkan
    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('issue_date', 'desc');
    }

    // Accessor untuk status sertifikat
    public function getStatusAttribute()
    {
        if ($this->expiry_date && $this->expiry_date->isPast()) {
            return 'expired';
        }
        return 'valid';
    }

    // Accessor untuk durasi (masa berlaku)
    public function getDurationAttribute()
    {
        if (!$this->expiry_date) {
            return 'Tidak ada masa kedaluwarsa';
        }

        $now = now();
        if ($this->expiry_date->isPast()) {
            return 'Kedaluwarsa ' . $this->expiry_date->diffForHumans();
        }

        return 'Berlaku hingga ' . $this->expiry_date->format('d M Y');
    }

    // Accessor untuk badge color berdasarkan status
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'valid' => 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200',
            'expired' => 'bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200',
            default => 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200'
        };
    }

    // Check if certificate is expired
    public function getIsExpiredAttribute()
    {
        return $this->expiry_date && $this->expiry_date->isPast();
    }
}