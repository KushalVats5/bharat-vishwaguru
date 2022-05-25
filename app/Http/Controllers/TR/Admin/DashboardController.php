<?php

namespace App\Http\Controllers\TR\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('tr.admin.dashboard');
    }
}