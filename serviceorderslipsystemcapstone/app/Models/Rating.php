<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table= 'customerrating';
    
    protected $fillable = [
         'serviceno',
         'reviewerid',
         'reviewername',
         'assignedstaff',
         'review',
         'rating',
    ];
}
