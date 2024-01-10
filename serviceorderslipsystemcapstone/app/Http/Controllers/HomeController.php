<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Logs;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id())
        {
            if(Auth::user()->usertype=='admin')
            {
                $logs = new Logs;
                $logs->userid = Auth::id(); 
                $logs->description = "Logged in to the System";
                $logs->actiondatetime = now();
                $logs->save();
                return redirect()->route('admindashboard');
            }

            else if(Auth::user()->usertype=='staff')
            {
                $logs = new Logs;
                $logs->userid = Auth::id(); 
                $logs->description = "Logged In To the System";
                $logs->actiondatetime = now();
                $logs->save();
                return redirect()->route('staffdashboard');
            }
         
            else{
                $logs = new Logs;
                $logs->userid = Auth::id(); 
                $logs->description = "Logged in to the System";
                $logs->actiondatetime = now();
                $logs->save();
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
