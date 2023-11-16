<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDatabase extends Model
{
    use HasFactory;

    protected $table= 'staffdatabase';
    
    protected $fillable = [
         'serviceno',
         'customerappointmentnumber',
         'typeofservice',
         'listofproblems',
         'maintenancerequired',
         'customerpassword',
         'assignedstaff',
         'defectiveunits',
         'viewtasks',
         'actionstaken',
         'workprogress',
    ];
}
