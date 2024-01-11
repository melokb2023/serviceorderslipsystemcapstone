<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table= 'stafflist';
    
    protected $fillable = [
         'staffnumber',
         'id',
    ];

    public function getDecryptedPasswordAttribute()
    {
        // Replace 'customerpassword' with the actual attribute name in your model
        return decrypt($this->attributes['customerpassword']);
    }
}
