<?php

namespace App\Http\Controllers\TR\Admin;

use App\Http\Controllers\Controller;
use App\PostView;

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
    public function post_views()
    {
        $data = PostView::with('article')->paginate(10);
        return view('tr.admin.post_views', compact('data'));
    }
}