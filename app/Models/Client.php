<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Contact;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
                            'client_name',
                            'address_line_1',
                            'town',
                            'country',
                            'postal_code',
                            'is_active',
                        ];

    public function contacts(){
        return $this->hasMany(Contact::class);
    }


}
