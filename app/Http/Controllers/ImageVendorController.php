<?php

namespace App\Http\Controllers;

use App\Models\ImageVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ImageVendorController extends Controller
{

    public function index()
    {
        if (Auth::user()->isAbleTo('image_vendor')) {
            $vendors = ImageVendor::all();
            return view('images.vendor.index', compact('vendors'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('image_vendor')) {
            $request->validate([
                'name' => 'required|unique:image_vendors,name',
            ]);
            $c = new ImageVendor;
            $c->name = $request->name;
            $c->details = $request->details;
            $c->save();
            Session::flash('success', "The Image Vendor has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($vid)
    {
        if (Auth::user()->isAbleTo('image_vendor')) {
            $vedit = ImageVendor::find($vid);
            if ($vedit) {
                $vendors = ImageVendor::all();
                return view('images.vendor.edit', compact('vendors', 'vedit'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $vid)
    {
        if (Auth::user()->isAbleTo('image_vendor')) {
            $request->validate([
                'name' => 'required',
            ]);
            $vedit = ImageVendor::find($vid);
            if ($vedit) {
                if ($vedit->name != $request->name) {
                    $request->validate([
                        'name' => 'unique:image_vendors,name',
                    ]);
                }
                $vedit->name = $request->name;
                $vedit->details = $request->details;
                $vedit->update();
                Session::flash('success', "The Image Vendor has been updated successfully.");
                return redirect()->back();
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function destroy($vid)
    {
        if (Auth::user()->isAbleTo('image_vendor')) {
            $vedit = ImageVendor::find($vid);
            if ($vedit) {
                dd('ImageVendorController destroy()');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
}
