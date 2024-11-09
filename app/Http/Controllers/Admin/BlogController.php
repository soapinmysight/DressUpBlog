<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all(); //retrieve all blogs from the database

        return view('admin.blog.index', ['blogs' => $blogs]); //return the blogs to a view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
        ]);
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->user_id = auth()->id();  // Associate the blog with the logged-in user
        $blog->active = true;
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('images', 'public');
        }
        $blog->save();
        return redirect()->route('blog.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog.show', ['blog' => $blog]); //show a single blog

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blogs)
    {
        //
    }
}
