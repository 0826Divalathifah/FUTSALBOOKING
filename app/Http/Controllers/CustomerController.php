<?php

// app/Http/Controllers/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }
}


