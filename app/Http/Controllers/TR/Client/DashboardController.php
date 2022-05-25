<?php

namespace App\Http\Controllers\TR\Client;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('tr.client.dashboard');
    }

    public function unauthorized_access()
    {
        return view('tr.client.un-authorized');
    }
}