<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rating;
use App\Http\Requests;
use Session;
use Auth;


class RatingsController extends Controller
{
     public function index(){
        $ratings = Rating:: all();
        return view('admin.customerreviewsandratings', compact('ratings'));
     }
}
