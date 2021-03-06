<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ACLController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function role()
    {
        if (Auth::user()->isAbleTo('role')) {
            $roles = Role::where('id', '>', '3')->get();
            $permissions = Permission::all();
            return view('role.index', compact('roles', 'permissions'));
        } else {
            abort(403);
        }
    }


    public function roleStore(Request $request)
    {
        if (Auth::user()->isAbleTo('role')) {
            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'displayName' => 'required',
                'permission' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $r = new Role;
                $r->name = $request->name;
                $r->display_name = $request->displayName;
                $r->save();
                foreach ($request->permission as $m) {
                    $r->attachPermission($m);
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The role has been created successfully.");
                return redirect()->back();
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function roleEdit($rid)
    {
        if (Auth::user()->isAbleTo('role') && ($rid * 1) > 3) {
            $redit = Role::find($rid);
            $roles = Role::where('id', '>', '3')->get();
            $permissions = Permission::all();
            $pedits = $redit->permissions()->get();
            return view('role.edit', compact('redit', 'roles', 'permissions', 'pedits'));
        } else {
            abort(403);
        }
    }


    public function roleUpdate(Request $request, $rid)
    {
        if (Auth::user()->isAbleTo('role') && ($rid * 1) > 3) {
            $this->validate($request, [
                'name' => 'required',
                'displayName' => 'required',
                'permission' => 'required',
            ]);
            $r = Role::find($rid);
            if ($r->name != $request->name) {
                $this->validate($request, [
                    'name' => 'unique:roles,name',
                ]);
            }
            DB::beginTransaction();
            try {
                $r->name = $request->name;
                $r->display_name = $request->displayName;
                $r->update();
                foreach ($request->permission as $m) {
                    $p[] = Permission::find($m);
                }
                $r->syncPermissions($p);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The role has been updated successfully.");
                return redirect()->route('role');
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->route('role');
            }

        } else {
            abort(403);
        }
    }


    public function roleDestroy($rid)
    {
        if (Auth::user()->isAbleTo('role') && (($rid * 1) > 3)) {
            $r = Role::find($rid);
            $a = User::whereRoleIs([$r->name])->get();
            if (count($a) > 0) {
                Session::flash('unSuccess', "Can not delete Role with assigned users !");
                return redirect()->back();
            } else {
                $r->delete();
                Session::flash('success', "The Role has bees deleted successfully");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function permission()
    {
        if (Auth::user()->isAbleTo('permission')) {
            $ps = Permission::all();
            return view('permission.index', compact('ps'));
        } else {
            abort(403);
        }
    }


    public function permissionEdit($pid)
    {
        if (Auth::user()->isAbleTo('permission')) {
            $pedit = Permission::find($pid);
            $ps = Permission::all();
            return view('permission.edit', compact('ps', 'pedit'));
        } else {
            abort(403);
        }
    }


    public function permissionUpdate(Request $request, $pid)
    {
        if (Auth::user()->isAbleTo('permission')) {
            $this->validate($request, [
                'displayName' => 'required',
                'description' => 'required',
            ]);
            $p = Permission::find($pid);
            $p->display_name = $request->displayName;
            $p->description = $request->description;
            $p->update();
            Session::flash('success', "The Permission has been updated successfully.");
            return redirect()->route('permission');
        } else {
            abort(403);
        }
    }


    public function users()
    {
        if (Auth::user()->isAbleTo('user')) {
            $users = User::where('id', '>', '3')->get();
            $roles = Role::where('id', '>', '3')->get();
            return view('users.index', compact('users', 'roles'));
        } else {
            abort(403);
        }
    }


    public function userStore(Request $request)
    {
        if (Auth::user()->isAbleTo('user')) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
                'roles' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $u = new User;
                $u->name = $request->name;
                $u->email = $request->email;
                $u->password = bcrypt($request->password);
                $u->save();
                foreach ($request->roles as $m) {
                    $u->attachRole($m);
                }
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The User '$request->name' has been created successfully.");
                return redirect()->back();
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function userEdit($uid)
    {
        if (Auth::user()->isAbleTo('user') && ($uid * 1) > 3) {
            $uedit = User::find($uid);
            $users = User::where('id', '>', '3')->get();
            $roles = Role::where('id', '>', '3')->get();
            $redits = $uedit->roles()->get();
            return view('users.edit', compact('users', 'uedit', 'roles', 'redits'));
        } else {
            abort(403);
        }
    }


    public function userUpdate(Request $request, $uid)
    {
        if (Auth::user()->isAbleTo('user') && ($uid * 1) > 3) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'roles' => 'required',
            ]);
            $u = User::find($uid);
            if ($u->email != $request->email) {
                $this->validate($request, [
                    'email' => 'unique:users,email',
                ]);
            }
            if ($request->filled('password') || $request->filled('password_confirmation')) {
                $this->validate($request, [
                    'password' => 'required|confirmed',
                ]);
                $u->password = bcrypt($request->password);
            }

            DB::beginTransaction();
            try {
                $u->name = $request->name;
                $u->email = $request->email;
                $u->update();
                foreach ($request->role as $m) {
                    $p[] = Role::find($m);
                }
                $u->syncRoles([$p]);
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The User '$request->name' has been updated successfully.");
                return redirect()->route('users');
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->route('users');
            }
        } else {
            abort(403);
        }
    }

}
