<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTask extends Model
{
    use HasFactory;

    protected $fillable = [
                            'job_id',
                            'task_action',
                            'status',
                            'date_added',
                            'due_date',
                        ];

    public function setDateAddedAttribute($date){
        $this->attributes['date_added'] = \Carbon\Carbon::parse($date);
    }
    
    public function getDateAddedAttribute($date){

        if($date && \Carbon\Carbon::hasFormat($date ,'Y-m-d' ))
            return $this->attributes['date_added'] = \Carbon\Carbon::createFromFormat('Y-m-d' , $date)->format('d-m-Y');
        
        return $this->attributes['date_added'] = $date;
    }
    
    public function setDueDateAttribute($date){
        $this->attributes['due_date'] = \Carbon\Carbon::parse($date);
    }
    
    public function getDueDateAttribute($date){

        if($date && \Carbon\Carbon::hasFormat($date ,'Y-m-d' ))
            return $this->attributes['due_date'] = \Carbon\Carbon::createFromFormat('Y-m-d' , $date)->format('d-m-Y');
        
        return $this->attributes['due_date'] = $date;
    }
                        
}
