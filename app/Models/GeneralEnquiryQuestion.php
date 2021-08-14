<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralEnquiryQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
                            'job_id',
                            'enquiry_for',
                            'enquiry_owner',
                            'hear_from',
                            'transport_require',
                            'transport_require_date',
                            'express_quotation',
                            'quotation_required_by',
                            'contract_start',
                            'contract_finish',
                            'site',
                        ];

    protected $casts = [
        'express_quotation' => 'boolean',
        'transport_require' => 'boolean',
        'site' => 'array',
    ];

    public function setTransportRequireDateAttribute($date){
        $this->attributes['transport_require_date'] = \Carbon\Carbon::parse($date);
    }
    
    public function getTransportRequireDateAttribute($date){
        // dd($date);
        if($date && \Carbon\Carbon::hasFormat($date ,'Y-m-d H:i:s' ))
            return $this->attributes['transport_require_date'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' , $date)->format('d-m-Y H:i'); //parse($date)->format('d-m-Y H:i');
        
        return $this->attributes['transport_require_date'] = $date;
    }
    
    public function setQuotationRequiredByAttribute($date){
        $this->attributes['quotation_required_by'] = \Carbon\Carbon::parse($date);
    }
    
    public function getQuotationRequiredByAttribute($date){
        if($date && \Carbon\Carbon::hasFormat($date ,'Y-m-d H:i:s' ))
            return $this->attributes['quotation_required_by'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' , $date)->format('d-m-Y H:i');
        
        return $this->attributes['quotation_required_by'] = $date;
    
    }
    
    public function setContractStartAttribute($date){
        $this->attributes['contract_start'] = \Carbon\Carbon::parse($date);
    }
    
    public function getContractStartAttribute($date){
        if($date && \Carbon\Carbon::hasFormat($date ,'Y-m-d H:i:s' ))
            return $this->attributes['contract_start'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' , $date)->format('d-m-Y');
            
        return $this->attributes['contract_start'] = $date;
    }
    
    public function setContractFinishAttribute($date){
        $this->attributes['contract_finish'] = \Carbon\Carbon::parse($date);
    }
    
    public function getContractFinishAttribute($date){
        if($date && \Carbon\Carbon::hasFormat($date ,'Y-m-d H:i:s'))
            return $this->attributes['contract_finish'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s' , $date)->format('d-m-Y');
        
        return $this->attributes['contract_finish'] = $date;
    }
}
