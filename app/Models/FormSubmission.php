<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_type',
        'data',
        'is_processed'
    ];

    protected $casts = [
        'data' => 'array',
        'is_processed' => 'boolean'
    ];
}