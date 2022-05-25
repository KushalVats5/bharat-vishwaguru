<?php

namespace App\Http\Controllers\TR\Freelancer;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('tr.freelancer.dashboard');
    }
}