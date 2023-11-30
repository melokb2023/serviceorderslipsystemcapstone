<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;


class StaffController extends Controller
{
    public function customer(){
        $staff = Staff::all();
        return view('admin.customerdata', compact('staff'));
    }
}
