<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'position',
        'company',
        'description',
        'start_date',
        'end_date',
        'order'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
    ];
protected function startDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value),
        );
    }

    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value) : null,
        );
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}