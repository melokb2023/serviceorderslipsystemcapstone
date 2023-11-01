<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDatabase extends Model
{
    use HasFactory;

    protected $table= 'servicedata';
    
    protected $fillable = [
         'serviceno',
         'customerappointmentnumber',
         'contactnumber',
         'email',
         'address',
         'typeofservice',
         'maintenancerequired',
         'customerpassword',
         'assignedstaff',
         'defectiveunits',
         'viewtasks',
         'actionstaken',
         'workprogress',
    ];
}
