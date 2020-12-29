<?php

namespace App\Http\Controllers;

use App\Models\ImageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ImageCategoryController extends Controller
{

    public function index()
    {
        if (Auth::user()->isAbleTo('image_category')) {
            $categories = ImageCategory::all();
            return view('images.category.index', compact('categories'));
        } else {
            abort(403);
        }
    }


    public function store(Request $request)
    {
        if (Auth::user()->isAbleTo('image_category')) {
            $request->validate([
                'name' => 'required|unique:image_categories,name',
            ]);
            $c = new ImageCategory;
            $c->name = $request->name;
            $c->description = $request->description;
            $c->save();
            Session::flash('success', "The Image Category has been created successfully.");
            return redirect()->back();
        } else {
            abort(403);
        }
    }


    public function edit($cid)
    {
        if (Auth::user()->isAbleTo('image_category')) {
            $cedit = ImageCategory::find($cid);
            if ($cedit) {
                $categories = ImageCategory::all();
                return view('images.category.edit', compact('categories', 'cedit'));
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function update(Request $request, $cid)
    {
        if (Auth::user()->isAbleTo('image_category')) {
            $request->validate([
                'name' => 'required',
            ]);
            $cedit = ImageCategory::find($cid);
            if ($cedit) {
                if ($cedit->name != $request->name) {
                    $request->validate([
                        'name' => 'unique:image_categories,name',
                    ]);
                }
                $cedit->name = $request->name;
                $cedit->description = $request->description;
                $cedit->update();
                Session::flash('success', "The Image Category has been updated successfully.");
                return redirect()->back();
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


    public function destroy($cid)
    {
        if (Auth::user()->isAbleTo('image_category')) {
            $cedit = ImageCategory::find($cid);
            if ($cedit) {
                dd('ImageCategoryController destroy()');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }


}






