<?php

namespace App\Http\Controllers;

use App\Models\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserinfoController extends Controller
{

    public function accountSettingsUpdateInfo(Request $request)
    {
        DB::beginTransaction();
        try {
            $uid = Auth::id();
            $u = Userinfo::where('user_id', $uid)->first();
            $u->date_of_birth = $request->date_of_birth;
            $u->mobile_1 = $request->mobile_1;
            $u->mobile_2 = $request->mobile_2;
            $u->job_title = $request->job_title;
            $u->job_description = $request->job_description;
            $u->address = $request->address;
            $u->education = $request->education;
            $u->employment = $request->employment;
            $u->skills = $request->skills;
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
                $user = Auth::user();
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
