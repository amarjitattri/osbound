<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
                            'question',
                            'field',
                            'job_type_slug',
                            'type',
                            'attributes',
                            'is_active',
                        ];

    protected $casts = [
        'attributes' => 'array'
    ];
}
