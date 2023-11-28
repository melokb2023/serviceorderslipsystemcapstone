<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAppointment extends Model
{
    use HasFactory;

    protected $table= 'customerappointment';
    
    protected $fillable = [
         'firstname',
         'middlename',
         'lastname',
         'contactnumber',
         'email',
         'address',
         'appointnmentpurpose',
         'appointnmenttype',
         'dateandtime',
         'serviceprogress',
    ];

    public function serviceprogress()
{
    return $this->belongsTo(ServiceProgress::class, 'serviceprogressno');
}
}
