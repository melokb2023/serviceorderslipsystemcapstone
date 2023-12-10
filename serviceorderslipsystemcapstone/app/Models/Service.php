<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table= 'servicedata';
    
    protected $fillable = [
         'customerappointmentnumber',
         'staffnumber',
         'customername',
         'typeofservice',
         'listofproblems',
         'customerpassword',
         'defectiveunits',
         'actionsrequired',
         'workprogress',
         'workremarks', 
         'serviceprogress',
         'serviceremarks',
         'dateandtime',
         'servicestarted',
         'orderreferencecode'
    ];

    public function customerAppointment()
    {
        return $this->belongsTo(CustomerAppointment::class, 'customerappointmentnumber', 'customerno');
    }
}
