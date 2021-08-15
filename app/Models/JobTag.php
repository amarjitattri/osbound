<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;

class JobTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'is_active'
    ];

    public function jobs(){
        return $this->belongsToMany(Job::class,'jobs_job_tags');
    }
}
