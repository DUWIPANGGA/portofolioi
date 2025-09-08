<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevelopmentProcess extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'step_number',
        'title',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}