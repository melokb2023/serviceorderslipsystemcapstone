<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAppointment extends Model
{
    use HasFactory;

    protected $table= 'customerappointment';
    
    protected $fillable = [
         'customerno',
         'customername',
         'customeremail',
         'appointnmentpurpose',
         'appointnmenttype',
         'dateandtime',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'customerno', 'id');
}

   
  
}
