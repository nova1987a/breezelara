<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Blog;
use App\Models\BlogImage;

class BlogController extends Controller
{
    public function guest()
    {
//        $blogs =  Blog::all();
	$blogs = Blog::orderBy('created_at','desc')->get();
        $blogImgs = BlogImage::all();
        return view('guest', compact("blogs","blogImgs" ));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = Blog::latest()->paginate(5);
	return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
	    'title' => 'required|string|max:255',
	    'description' => 'required|string|max:255',
	]);
	
	Blog::create($request->all());
	return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): View
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
	    'title' => 'required|string|max:255',
	    'description' => 'required|string|max:255',
	]);
	
	$blog->update($request->all());
	return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $blog->delete();
	return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}
