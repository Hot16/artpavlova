<?php

namespace App\Http\Controllers;

use App\albumsCategory;
use Illuminate\Http\Request;
use Validator;
use Slug;

class AlbumsCategoryController extends Controller
{
    public function getForm()
    {
        $categoryes_list = albumsCategory::all();
        return view('create_category_album')->with('categoryes_list', $categoryes_list);
    }

    public function create(Request $request)
    {
        $rules = ['name' => 'required', 'cover_image' => 'required|image'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return redirect()->route('create_category_album_form');
        }
        $slug = Slug::build($request->get('name'));

        $file = $request->file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'img/category_cover/'.$request->name;
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name . '_cover.' . $extension;
        $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
        $album = albumsCategory::create(array(
            'parent_id' => $request->get('parent_category'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'cover_image' => $filename,
            'slug' => $slug,
        ));
        return redirect()->route('create_category_album');

    }
}
