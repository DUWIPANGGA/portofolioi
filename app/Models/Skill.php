<?php

namespace App\Models;

use App\Enums\SkillLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'percentage',
        'level',
        'category',
        'icon',
        'image',
        'order'
    ];

    protected $casts = [
        'percentage' => 'integer',
        'order'      => 'integer',
        'level'      => SkillLevel::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Ambil enum object SkillLevel (dengan fallback berdasarkan percentage jika belum diisi)
     */
    public function getSkillLevelAttribute(): SkillLevel
    {
        if ($this->level instanceof SkillLevel) {
            return $this->level;
        }

        if (is_string($this->level) && ($enum = SkillLevel::tryFrom($this->level))) {
            return $enum;
        }

        // Fallback otomatis berdasarkan persentase
        if ($this->percentage >= 90) return SkillLevel::EXPERT;
        if ($this->percentage >= 80) return SkillLevel::ADVANCED;
        if ($this->percentage >= 65) return SkillLevel::INTERMEDIATE;
        return SkillLevel::BEGINNER;
    }

    public function getLevelLabelAttribute(): string
    {
        return $this->skill_level->label();
    }

    public function getLevelBadgeClassAttribute(): string
    {
        return $this->skill_level->badgeClass();
    }

    public function getLevelProgressColorAttribute(): string
    {
        return $this->skill_level->progressColor();
    }
}