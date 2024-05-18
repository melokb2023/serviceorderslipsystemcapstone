<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Rating extends Model
{
    use HasFactory;

    protected $table= 'customerrating';
    
    protected $fillable = [
         'serviceno',
         'review',
         'staffperformance',
         'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'serviceno', 'serviceno');
    }
    public function staff()
{
    return $this->belongsTo(Staff::class, 'staffnumber', 'staffnumber');
}
}
