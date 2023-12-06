<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id())
        {
            if(Auth::user()->usertype=='admin')
            {
                return redirect()->route('admindashboard');
            }

            else if(Auth::user()->usertype=='staff')
            {
                return redirect()->route('staffdashboard');
            }
         
            else{
                return redirect()->route('customerdashboard');
           }
        
        }

    else {
        return redirect()->back();
    }  


   
   }

   public function index(){
      return view('admin.home');
   }

   public function index2(){
      return view('admin.startservice');
 }

    
}
