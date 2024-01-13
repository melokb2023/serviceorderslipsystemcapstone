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
    public function services()
{
    return $this->hasMany(Service::class, 'staffnumber');
}

public function user()
{
    return $this->belongsTo(User::class, 'id', 'id');
}

public function user2()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
    public function staffDatabases()
    {
        return $this->hasMany(StaffDatabase::class,'serviceno');
    }

    public function user3()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
