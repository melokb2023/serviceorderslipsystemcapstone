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

    public function storecustomer(Request $request){
        $customer= new Customer();
        $customer->customerid = $request->xcustomerid;
        return redirect()->route('customer');
    }
}
