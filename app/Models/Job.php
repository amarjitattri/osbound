<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Media;
use App\Models\GeneralEnquiryQuestion;
use App\Models\JobSpecificEnquiryQuestion;

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
                            'reason',
                            'status',
                            'is_active',
                        ];  

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function jobTasks(){
        return $this->hasMany(JobTask::class);
    }
   
    public function jobTags(){
        return $this->belongsToMany(JobTag::class,'jobs_job_tags');
    }

    public function medias(){
        return $this->morphMany(Media::class, 'entity');
    }

    public function audios(){
        return $this->morphMany(Media::class, 'entity')->where('type', 'audio');
    }

    public function images(){
        return $this->morphMany(Media::class, 'entity')->where('type' , 'image');
    }

    public function generalEnquiryQuestion(){
        return $this->hasOne(GeneralEnquiryQuestion::class);
    }
    
    public function jobSpecificEnquiryQuestion(){
        return $this->hasOne(JobSpecificEnquiryQuestion::class);
    }
}
