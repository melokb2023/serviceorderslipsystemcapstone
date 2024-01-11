<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StaffDatabase extends Model
{
    use HasFactory;

    protected $table= 'staffwork';
    
    protected $fillable = [
         'serviceno',
         'staffname',
         'actionsrequired',
         'typeofservice',
         'workstarted',
         'actionstaken',
         'workprogress',
    ];

}
