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
         'typeofservice',
         'listofproblems',
         'maintenancerequired',
         'customerpassword',
         'defectiveunits',
         'viewtasks',
         'assignedstaff',
         'remarks',
         'dateandtime',
    ];
}
