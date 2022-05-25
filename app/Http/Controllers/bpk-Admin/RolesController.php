<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Exception;

class RolesController extends Controller
{
    /**
     *
     * allow admin only
     *
     */

    public function __construct()
    {
        $this->middleware('role:super-admin|admin');
    }

    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (auth()->user()->can('list users')) {
                $roles = Role::all();

                return view('admin.roles.index', compact('roles'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if (auth()->user()->can('create roles')) {
                $permissions = Permission::get()->pluck('name', 'name');

                return view('admin.roles.create', compact('permissions'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (auth()->user()->can('create roles')) {
                $request->validate([
                    'name' => ['required', 'unique:roles', 'max:20'],
                    'permission' => ['required'],
                ]);

                $role = Role::create($request->except('permission'));
                $permissions = $request->input('permission') ? $request->input('permission') : [];
                $role->givePermissionTo($permissions);

                return redirect()->route('roles.index')->with('success', "The $role->name was saved successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            if (auth()->user()->can('edit roles')) {
                $permissions = Permission::get()->pluck('name', 'name');
                $role = Role::findOrFail($id);
                $data = $role->permissions()->pluck('name', 'name');
                // $selectedPermissions = $data[0];
                $selectedPermissions = $data->toArray();
                return view('admin.roles.edit', compact('role', 'permissions', 'selectedPermissions'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if (auth()->user()->can('edit roles')) {
                $request->validate([
                    'name' => ['required', Rule::unique('roles')->ignore($id), 'max:20'],
                    'permission' => ['required'],
                ]);

                $role = Role::findOrFail($id);
                $role->update($request->except('permission'));
                $permissions = $request->input('permission') ? $request->input('permission') : [];
                $role->syncPermissions($permissions);
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }


        // return redirect()->route('roles.index')->with('warning', "The $role->name was updated successfully");
        return redirect()->back()->with('warning', "The $role->name was updated successfully");
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (auth()->user()->can('delete roles')) {
                $role = Role::findOrFail($id);
                $role->delete();

                return redirect()->route('roles.index')->with('danger', "The $role->name was deleted successfully");
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            // return redirect()->back()->with('danger', $e->getMessage());
            return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = Role::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}