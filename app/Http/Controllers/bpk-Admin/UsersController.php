<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use App\UserLoginLog;
use Illuminate\Support\Facades\Auth;
use Exception;

class UsersController extends Controller
{
    /**
     *
     * allow admin only
     *
     */
    public function __construct()
    {
        //$this->middleware(['role:admin|creator']);
        $this->middleware(['role:super-admin|admin']);
    }

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            if (auth()->user()->can('list users')) {
                $users = User::where('id', '!=', auth()->id())->paginate(10);

                return view('admin.users.index', compact('users'));
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
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function freelancers()
    {
        try {
            if (auth()->user()->can('list users')) {
                // $users = User::where('id', '!=', auth()->id())->paginate(10);
                $users = User::role('freelancer')->paginate(10);
                return view('admin.users.freelancers', compact('users'));
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
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLoginLogs()
    {
        $userLoginActivities = UserLoginLog::paginate(10);

        return view('admin.activity.logs', compact('userLoginActivities'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            if (auth()->user()->can('create users')) {
                $roles = Role::get()->pluck('name', 'name');

                return view('admin.users.create', compact('roles'));
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
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if (auth()->user()->can('create users')) {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'mobile' => ['required', 'numeric', 'digits:10', 'unique:users'],
                    'password' => ['required', 'min:5'],
                    'roles.*' => ['required']
                ]);

                $user = User::create(array_merge($request->all(), ['password' => bcrypt($request->password)]));
                $roles = $request->input('roles') ? $request->input('roles') : [];
                $user->assignRole($roles);

                return redirect()->route('users.index')->with('success', "The $user->name was saved successfully");
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
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            if (auth()->user()->can('edit users')) {
                $roles = Role::get()->pluck('name', 'name');

                $user = User::findOrFail($id);

                $data = $user->roles()->pluck('name');
                $selectedRoles = $data[0];

                return view('admin.users.edit', compact('user', 'roles', 'selectedRoles'));
            } else {
                throw new Exception('You don\'t have a rights to perform this action');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('warning', $e->getMessage());
            // return redirect()->route('home')->with('warning', $e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            if (auth()->user()->can('edit users')) {
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                    'mobile' => ['required', 'numeric', 'digits:10', Rule::unique('users')->ignore($id)],
                    'password' => ['sometimes', 'nullable', 'min:5'],
                    'roles.*' => ['required']
                ]);

                $user = User::findOrFail($id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->mobile = $request->mobile;
                $user->is_active = $request->is_active;
                if ($request->password == null) {
                    # code...
                    $user->password = bcrypt($request->password);
                }
                $user->save();
                // dd($user, $request->all());
                $roles = $request->input('roles') ? $request->input('roles') : [];
                $user->syncRoles($roles);
                return redirect()->route('users.index')->with('warning', "The $user->name was updated successfully");
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
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (auth()->user()->can('delete users')) {
                $user = User::findOrFail($id);
                $user->delete();

                return redirect()->route('users.index')->with('danger', "The $user->name was deleted successfully");
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
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}