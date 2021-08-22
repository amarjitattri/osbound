<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'path'
    ];

    public function mediable(){
        return $this->morphTo('entity');
    }
    
    // public function job_tags(){
    //     return $this->hasManyThrough(JobTag::class, Job::class);
    // }

}
