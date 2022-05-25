<?php

namespace App\Http\Controllers\TR\Admin;

use App\GstInfo;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

class GSTController extends Controller
{
    /**
     *
     * allow client only
     *
     */
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    /**
     * Display a listing of GSTs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        try {
            if (auth()->user()->can('list GstInfo')) {
                $gst_infos = GstInfo::paginate(10);
                return view('tr.admin.gst.index', compact('gst_infos'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->route('tr/user/un-authorized')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }
}