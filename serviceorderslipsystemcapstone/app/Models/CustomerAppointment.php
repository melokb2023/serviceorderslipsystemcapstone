<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAppointment extends Model
{
    use HasFactory;

    protected $table= 'customerappointment';
    
    protected $fillable = [
         'customerno',
         'customername',
         'appointnmentpurpose',
         'appointnmenttype',
         'dateandtime',
    ];

    public function customerAppointments()
    {
        return $this->hasMany(CustomerAppointment::class, 'customerno');
    }

  
}
