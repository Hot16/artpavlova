<?php

namespace App\Http\Controllers;

use Slug;
use App\Albums;
use App\Images;
use App\albumsCategory;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function getList()
    {
        $albums = Albums::with('Images')->get();
        return view('index')->with('albums', $albums);
    }

    public function getAlbum($slug)
    {
        $album = Albums::with('Images')->where('slug', $slug)->first();
        if (is_null($album)){
            abort(404);
        }
//        $album = Albums::with('Images')->find($id);
        $albums = Albums::with('Images')->get();
        //dd($album);
        return view('album', ['album' => $album])->with('albums', $albums);
        //->with('album',$album);
    }

    public function getForm()
    {
        /**
         * Все категории для альбомов
         */
        $categoryes_list = albumsCategory::all();
        return view('createalbum')->with('categoryes_list', $categoryes_list);
    }

    public function postCreate(Request $request)
    {
        /*$rules = array(
          'name' => 'required',
          'cover_image'=>'required|image'
      );*/
        $rules = ['name' => 'required', 'cover_image' => 'required|image', 'parent_category'=> 'required'];
        $input = ['name' => null];
        //Validator::make($input, $rules)->passes(); // true
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // return Redirect::route('create_album_form') ;
            return redirect()->route('create_album_form')->withErrors($validator)->withInput();
        }
        // $file = Input::file('cover_image');

        $slug = Slug::build($request->get('name'));

        $file = $request->file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'albums/'.$request->name;
        $extension = $file->getClientOriginalExtension();
        $filename = $random_name . '_cover.' . $extension;
        $uploadSuccess = $request->file('cover_image')->move($destinationPath, $filename);
        $category_id = $request->get('parent_category');
        $album = Albums::create(array(
            'name' => $request->get('name'),
            'category_id' => (integer)$request->get('parent_category'),
            'description' => $request->get('description'),
            'cover_image' => $filename,
            'slug' => $slug,
        ));
        return redirect()->route('show_album', ['slug' => $album->slug]);
    }

    public function getDelete($id)
    {
        $album = Albums::find($id);
        $destinationPath = public_path().'/albums/'.$album->name;

        $dir = Storage::allDirectories('public');
        $del = Storage::deleteDirectory($destinationPath);
        $album->delete();
        return Redirect::route('index');
    }
}
