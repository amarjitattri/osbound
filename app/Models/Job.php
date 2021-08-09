<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
                            'job_no',
                            'contact_id',
                            'date',
                            'description',
                            'job_type',
                            'job_type_slug',
                            'is_active',
                        ];  
}
