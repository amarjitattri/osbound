<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'job_type_slug',
        'from',
        'to',
        'subject',
        'message'
    ];
}
