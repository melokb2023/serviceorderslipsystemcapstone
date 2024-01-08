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
         'staffname',
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
         'serviceend',
         'orderreferencecode'
    ];

    public function customerAppointment()
    {
        return $this->belongsTo(CustomerAppointment::class, 'customerappointmentnumber', 'customerno');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staffnumber');
    }
    public function getDecryptedPasswordAttribute()
    {
        return decrypt($this->attributes['customerpassword']);
    }
}
