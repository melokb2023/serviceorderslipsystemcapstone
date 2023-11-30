<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function customer(){
        $customer = Customer::all();
        return view('admin.customerdata', compact('customer'));
    }
}
