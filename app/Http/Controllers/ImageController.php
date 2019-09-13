<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as Images;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index(){
    	$images = Image::all();

    	return view('admin.images.index', compact('images'));
    }

    public function show(){
    	$images = Image::all();

    	return view('images.index', compact('images'));
    }

    public function store(Request $request){
    	$rules = [
    		'image'		=> 'required|file|image'
    	];

    	$validator = Validator::make($request->all(), $rules);

    	if ($validator->fails()) {
    		$errors = $validator->getMessageBag();
    		$images = Image::all();
    		return view('admin.images.index', compact('errors', 'images'));
        } else {

			$image		= $request->file('image');
			$image_name	= 'image-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
			$path = public_path('images/' . $image_name);

            Images::make($image->getRealPath())->resize(800, 800)->save($path);

            Image::create(['name' => $image_name]);

            $images = Image::all();

        	return redirect()->route('admin.images', compact('images'));
        }
    }

    public function destroy(request $request)
    {
    	$image = public_path('images') . '\\' . Image::find($request->id)->name;
		File::delete($image);

		Image::find($request->id)->delete();

		return response()->json(['id' => $request->id]);
    }
}
