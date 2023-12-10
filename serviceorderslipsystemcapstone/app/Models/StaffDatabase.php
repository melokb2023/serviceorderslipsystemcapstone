<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StaffDatabase extends Model
{
    use HasFactory;

    protected $table= 'staffdatabase';
    
    protected $fillable = [
         'serviceno',
         'staffnumber',
         'actionsrequired',
         'typeofservice',
         'workstarted',
         'workprogress',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($staffDatabase) {
            $staffDatabase->worknumber = static::generateNextWorkNumber($staffDatabase->serviceno);
        });
    }

    public static function generateNextWorkNumber($serviceNo)
{
    $lastWorkNumber = DB::table('staffdatabase')->where('serviceno', $serviceNo)->max('worknumber');
    $newWorkNumber = $lastWorkNumber + 1;

    return $newWorkNumber;
}

    
  
}
