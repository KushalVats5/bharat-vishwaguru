<?php

namespace App\Http\Controllers\TR\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     *
     * allow admin only
     *
     */

    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(20);
        return view('tr.admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tr.admin.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param  \App\Http\Requests\StorePermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:permissions', 'max:50'],
        ]);

        $permission = Permission::create($request->all());

        return redirect()->route('permission.index')->with('success', "The $permission->name was saved successfully");
    }

    /**
     * Show the form for editing Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('tr.admin.permissions.edit', compact('permission'));
    }

    /**
     * Update Permission in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'unique:permissions', 'max:20'],
        ]);

        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        return redirect()->route('permission.index')->with('warning', "The $permission->name was updated successfully");
    }

    /**
     * Remove Permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permission.index')->with('danger', "The $permission->name was deleted successfully");
    }

    /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}