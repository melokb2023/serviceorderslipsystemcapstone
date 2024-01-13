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
         'workstarted',
         'actionstaken',
    ];

    public function staff()
{
    return $this->belongsTo(Staff::class, 'serviceno', 'staffnumber');
}


public function service()
{
    return $this->belongsTo(Service::class, 'serviceno', 'serviceno');
}

public function staff2()
{
    return $this->belongsTo(Staff::class);
}

public function service2()
{
    return $this->belongsTo(Service::class);
}



}
