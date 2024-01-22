<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class BlogImageController extends Controller
{
    public function index(int $blogId) {
	$blog = Blog::findOrFail($blogId);
	$blogImages = BlogImage::where('blog_id', $blogId)->get();
	return view('blog-images.index', compact('blog', 'blogImages'));
    }

    public function store(Request $request, int $blogId) {
	$request->validate([
	    'images.*' => 'required|image|mimes:png,jpg,jpeg,webp'
	]);

	$blog = Blog::findOrFail($blogId);

	$imageData = [];
	if($files = $request->file('images')) {
	    foreach($files as $key => $file) {
		$extension = $file->getClientOriginalExtension();
		$filename = $key.'_'.time().'.'.$extension;

		$path = "uploads/blogs/";
		$file->move($path, $filename);

		$imageData[] = [
		    'blog_id' => $blog->id,
		    'image' => $path.$filename,
		];
	    }
	}

	BlogImage::insert($imageData);
	return redirect()->back()->with('status', 'Upload successfully');
    }

    public function destroy(int $blogImageId) {
	$blogImage = BlogImage::findOrFail($blogImageId);
	//$blogImg = $blogImage->image
	if(File::exists($blogImage->image)) {
	    File::delete($blogImage->image);
	}
	$blogImage->delete();

	return redirect()->back()->with('status', 'Image Deleted');
    }
}
