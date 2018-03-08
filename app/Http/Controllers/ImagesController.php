<?php

namespace App\Http\Controllers;

use App\Images;
use App\Albums;
use Illuminate\Http\Request;
use Validator;

class ImagesController extends Controller
{
    public function getForm($id, $messages = null)
    {
        $album = Albums::find($id);
        return view('addimage', compact('messages'))
            ->with('album', $album);
    }

    public function postAdd(Request $request)
    {
        $request_all = $request->all();
        $album = Albums::find($request->album_id);
        $rules = [
            'album_id' => 'required|numeric|exists:albums,id',
            'images.*' => 'required|file|mimes:jpg,png,svg,jpeg'
        ];
       $input = ['album_id' => null];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->route('add_image', ['id' => $request->get('album_id')])->with('messages', $messages);
        }

        $files = $request->file('images');
        foreach ($files as $file) {
            $random_name = str_random(8);
            $destinationPath = 'albums/' . $album->name;
            $extension = $file->getClientOriginalExtension();
            $filename = $random_name . '_album_image.' . $extension;
            $uploadSuccess = $file->move($destinationPath, $filename);
            Images::create(array(
                'description' => $request->get('description'),
                'image' => $filename,
                'album_id' => $request->get('album_id')
            ));
        }

        return redirect()->route('show_album', ['slug' => $album->slug]);
    }

    public function getDelete($id)
    {
        $image = Images::find($id);
        $image->delete();
        return redirect()->route('show_album', ['id' => $image->album_id]);
    }

    public function postMove(Request $request)
    {
        $rules = array(
            'new_album' => 'required|numeric|exists:albums,id',
            'photo' => 'required|numeric|exists:images,id'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('index');
        }
        $image = Images::find($request->get('photo'));
        $image->album_id = $request->get('new_album');
        $image->save();
        return redirect()->route('show_album', ['id' => $request->get('new_album')]);
    }
}
