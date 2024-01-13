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
         'typeofservice',
         'listofproblems',
         'customerpassword',
         'defectiveunits',
         'actionsrequired',
         'workprogress',
         'workremarks', 
         'serviceprogress',
         'serviceremarks',
         'servicestarted',
         'serviceend',
         'servicereferencecode'
    ];

    

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staffnumber', 'staffnumber');
    }
    public function getDecryptedPasswordAttribute()
    {
        return decrypt($this->attributes['customerpassword']);
    }
    
    public function customerAppointment()
{
    return $this->belongsTo(CustomerAppointment::class, 'customerappointmentnumber', 'customerappointmentnumber');
}

   public function staffDatabases()
    {
        return $this->hasMany(StaffDatabase::class);
    }

}
