<?php

namespace App\Enums;

enum SkillLevel: string
{
    case BEGINNER     = 'beginner';
    case INTERMEDIATE = 'intermediate';
    case ADVANCED     = 'advanced';
    case EXPERT       = 'expert';
    case MASTER       = 'master';

    /**
     * Label yang ramah ditampilkan ke pengguna
     */
    public function label(): string
    {
        return match ($this) {
            self::BEGINNER     => 'Beginner',
            self::INTERMEDIATE => 'Intermediate',
            self::ADVANCED     => 'Advanced',
            self::EXPERT       => 'Expert',
            self::MASTER       => 'Master',
        };
    }

    /**
     * Badge CSS class untuk neo-brutalist styling
     */
    public function badgeClass(): string
    {
        return match ($this) {
            self::BEGINNER     => 'bg-gray-100 text-gray-800 border-gray-400',
            self::INTERMEDIATE => 'bg-g-yellow text-ink border-ink',
            self::ADVANCED     => 'bg-g-blue text-white border-ink',
            self::EXPERT       => 'bg-g-green text-white border-ink',
            self::MASTER       => 'bg-purple-600 text-white border-ink',
        };
    }

    /**
     * Warna progress bar yang selaras
     */
    public function progressColor(): string
    {
        return match ($this) {
            self::BEGINNER     => 'bg-gray-400',
            self::INTERMEDIATE => 'bg-g-yellow',
            self::ADVANCED     => 'bg-g-blue',
            self::EXPERT       => 'bg-g-green',
            self::MASTER       => 'bg-purple-600',
        };
    }

    /**
     * Array semua values
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Key-value list untuk dropdown select
     */
    public static function options(): array
    {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }
}
