<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProgress extends Model
{
    use HasFactory;

    protected $table= 'serviceprogress';
    
    protected $fillable = [
         'serviceno',
         'dateandtime',
         'serviceprogress',
    ];
}
