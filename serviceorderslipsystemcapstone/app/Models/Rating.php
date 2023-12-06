<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table= 'customerrating';
    
    protected $fillable = [
         'reviewerid',
         'reviewername',
         'review',
         'rating',
    ];
}
