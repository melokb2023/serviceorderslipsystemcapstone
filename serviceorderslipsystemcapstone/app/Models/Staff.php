<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table= 'staff';
    
    protected $fillable = [
         'staffnumber',
         'id',
         'staffname',
         'staffemail',
    ];

    public function getDecryptedPasswordAttribute()
    {
        // Replace 'customerpassword' with the actual attribute name in your model
        return decrypt($this->attributes['customerpassword']);
    }
}
