<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
                            'first_name',
                            'last_name',
                            'job_title',
                            'email',
                            'mobile',
                            'telephone',
                            'client_id',
                            'is_active',
                        ];

                        
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
