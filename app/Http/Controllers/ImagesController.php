<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImagesController extends Controller
{
	public function list() {
		$images = Image::get();
		return view('images-list', ['allImages' => $images]);
	}

	public function add() {
		return view('images-add');
	}

    public function create(Request $request) {
		// validate form
		$request->validate([
			'name' => 'required',
			'comment' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		// move image to public/images/
		$imageName = $request->image->getClientOriginalName();
		$storedName = time() . "_" . $imageName;
		$resMove = $request->image->move(public_path(env('IMAGES_PATH','images/')), $storedName);
		// add image to database
		$image = new Image();
		$image->name = $request->input('name');
		$image->path = env('IMAGES_PATH','images/') . $storedName;
		$image->comment = $request->input('comment');
		$image->save();

		return redirect()->back()->with('success', 'New file added');
	}

	public function edit($id) {
		$image = Image::find($id);
		if (is_object($image)) {
			return view('images-edit', ['image' => $image]);
		}
		return redirect(404);
	}

    public function update(Request $request, $id) {
        // validate form
        $request->validate([
            'name' => 'required',
			'comment' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
		// get image from database
		$image = Image::find($id);
        $image->name = $request->input('name');
        $image->comment = $request->input('comment');
		// save image if changed
		if (isset($request->file)) {
    	    $imageName = $request->file->getClientOriginalName();
			$storedName = time() . "_" . $imageName;
        	$image->path = env('IMAGES_PATH', 'images') . $storedName;
	        // move image to public/images
	        $resMove = $request->file->move(env('IMAGES_PATH', 'images'), $storedName);
		}
        $image->save();

        return redirect()->back()->with('success', 'File updated');
    }

	public function delete(Request $request, $id) {
		Image::destroy($id);
		return $this->list();
	}
}

