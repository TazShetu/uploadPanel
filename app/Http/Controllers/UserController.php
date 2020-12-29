<?php

namespace App\Http\Controllers;

use App\Mail\TwinbitActivationEmailClass;
use App\Models\Role;
use App\Models\User;
use App\Models\UserCreateHistory;
use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function users()
    {
        if (Auth::user()->isAbleTo('user')) {
            $users = User::where('id', '>', '1')->get();
            foreach ($users as $u) {
                $u['role'] = $u->roles()->get();
            }
//            $roles = Role::where('id', '>', '3')->get();
            return view('users.index', compact('users'));
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
//                'password' => 'required|confirmed',
//                'roles' => 'required',
            ]);
            DB::beginTransaction();
            try {
                $u = new User;
                $u->name = $request->name;
                $u->email = $request->email;
                $u->password = bcrypt(uniqid());
                $u->save();
//                foreach ($request->roles as $m) {
//                    $u->attachRole($m);
//                }
                $u->attachRole(1);
                $uch = new UserCreateHistory;
                $uch->user_id = $u->id;
                $uch->created_by_user_id = Auth::id();
                $uch->last_modified_by_user_id = Auth::id();
                $uch->save();
                $uinfo = new Userinfo;
                $uinfo->user_id = $u->id;
                $uinfo->save();
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "The User '$request->name' has been created successfully with inactive status.");
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
            if ($uedit) {
                $users = User::where('id', '>', '3')->get();
                $roles = Role::where('id', '>', '3')->get();
                $redits = $uedit->roles()->get();
                $uinfo = Userinfo::where('user_id', $uid)->first();
                $datalist['designation'] = DB::select(DB::raw('SELECT job_title FROM user_infos GROUP BY job_title'));
                return view('users.edit', compact('users', 'uedit', 'roles', 'redits', 'uinfo', 'datalist'));
            } else {
                abort(404);
            }
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
            ]);
            $u = User::find($uid);
            $redits = $u->roles()->get();
            if (($redits[0]->id) != 1) {
                $this->validate($request, [
                    'roles' => 'required',
                ]);
            }
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
                if (($redits[0]->id) != 1) {
                    // $u->syncRoles([$request->roles[0], $request->roles[1]]);
                    // syncRoles() does not work with associative array, not even with default keys like 0 1 2 ...
                    $u->detachRoles();
                    foreach ($request->roles as $m) {
                        $u->attachRole($m);
                    }
                }
                $uch = UserCreateHistory::where('user_id', $uid)->first();
                $uch->last_modified_by_user_id = Auth::id();
                $uch->update();
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


    public function makeUserInactive($uid)
    {
        if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin')) {
            $u = User::find($uid);
            if ($u) {
                DB::beginTransaction();
                try {
                    $u->detachRoles();
                    $u->attachRole(1);
                    $uch = UserCreateHistory::where('user_id', $uid)->first();
                    $uch->last_modified_by_user_id = Auth::id();
                    $uch->update();
                    DB::commit();
                    $success = true;
                } catch (\Exception $e) {
                    $success = false;
                    DB::rollback();
                }
                if ($success) {
                    Session::flash('success', "$u->name is now Inactive.");
                    return redirect()->back();
                } else {
                    Session::flash('unSuccess', "Something went wrong :(");
                    return redirect()->back();
                }
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function makeUserActive($uid)
    {
        if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin')) {
            $user = User::find($uid);
            if ($user) {
                $roles = Role::where('id', '>', '3')->get();
                return view('users.active', compact('user', 'roles'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function makeUserActiveUpdate(Request $request, $uid)
    {
        if (Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin')) {
            $this->validate($request, [
                'roles' => 'required',
            ]);
            $u = User::find($uid);
            DB::beginTransaction();
            try {
                $u->detachRoles();
                foreach ($request->roles as $m) {
                    $u->attachRole($m);
                }
                $uch = UserCreateHistory::where('user_id', $uid)->first();
                $uch->last_modified_by_user_id = Auth::id();
                $uch->update();
                $password = '123456789';
                $u->password = bcrypt($password);
                $u->update();
                $emailDetails = [
                    'email' => "$u->email",
                    'password' => "$password"
                ];
//                Mail::to("$u->email")->send(new TwinbitActivationEmailClass($emailDetails));
                DB::commit();
                $success = true;
            } catch (\Exception $e) {
                $success = false;
                DB::rollback();
            }
            if ($success) {
                Session::flash('success', "$u->name is now Active.");
                return redirect()->route('users');
            } else {
                Session::flash('unSuccess', "Something went wrong :(");
                return redirect()->back();
            }
        } else {
            abort(403);
        }
    }


    public function accountSettings()
    {
        $uid = Auth::id();
        $uedit = User::find($uid);
        $redits = $uedit->roles()->get();
        if (($redits[0]->id) != 1) {
            $uinfo = Userinfo::where('user_id', $uid)->first();
            return view('users.accountSettings', compact('uedit', 'uinfo'));
        } else {
            abort(403);
        }
    }


    public function accountSettingsUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $u = User::find(Auth::id());
        if ($request->filled('password') || $request->filled('password_confirmation')) {
            $this->validate($request, [
                'password' => 'required|confirmed',
            ]);
            $u->password = bcrypt($request->password);
        }
        $u->name = $request->name;
        $u->update();
        Session::flash('success', "Your account has been updated successfully.");
        return redirect()->back();
    }


    public function accountSettingsUpdateInfo(Request $request, $uid)
    {
        DB::beginTransaction();
        try {
            $u = UserInfo::where('user_id', $uid)->first();
            $u->date_of_birth = $request->date_of_birth;
            $u->mobile_1 = $request->mobile_1;
            $u->mobile_2 = $request->mobile_2;
            $u->job_title = $request->job_title;
            $u->job_description = $request->job_description;
            $u->address = $request->address;
            $u->education = $request->education;
            $u->employment = $request->employment;
            $u->skills = $request->skills;
            if ($request->is_designation) {
                $u->job_title = $request->job_title;
            }
//            if ($request->hasFile('cv')) {
//                if ($u->cv) {
//                    unlink($u->cv);
//                }
//                $img = $request->cv;
//                $img_name = time() . $img->getClientOriginalName();
//                $a = $img->move('uploads/users/cv', $img_name);
//                $d = 'uploads/users/cv/' . $img_name;
//                $u->cv = $d;
//            }
            $u->update();
            if ($request->hasFile('image')) {
                $user = User::find($uid);
                if ($user->profile_photo_path) {
                    unlink($user->profile_photo_path);
                }
                $img = $request->image;
                $img_name = time() . $img->getClientOriginalName();
                $a = $img->move('uploads/users/images', $img_name);
                $d = 'uploads/users/images/' . $img_name;
                $user->profile_photo_path = $d;
                $user->update();
            }
            DB::commit();
            $success = true;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
        }
        if ($success) {
            Session::flash('success', "Account has been updated successfully.");
            return redirect()->back();
        } else {
            Session::flash('unSuccess', "Something went wrong :(");
            return redirect()->back();
        }
    }


}
