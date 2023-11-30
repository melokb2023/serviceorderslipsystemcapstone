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
         'assignedstaff',
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
}
