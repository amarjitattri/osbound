<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Media;

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

    public function medias(){
        return $this->morphMany(Media::class, 'entity');
    }

    public function audios(){
        return $this->morphMany(Media::class, 'entity')->where('type', 'audio');
    }

    public function images(){
        return $this->morphMany(Media::class, 'entity')->where('type' , 'image');
    }
}
