<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Write Your Code..
     *
     * @return string
    */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('danger', 'Please login');
        }
        $input = $request->all();

        $request->validate([
            'body'=>'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
}