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
        $blogs = Blog::with(['user', 'theme'])->get();
        return view('admin.blog.index', compact('blogs'));
    }


    /**
     * Toggle the active status of a blog.
     */
    public function toggle(Blog $blog)
    {
        $blog->active = !$blog->active; // Toggle the active status
        $blog->save();

        return redirect()->route('admin.blog.index')->with(
            'success',
            $blog->active ? 'Blog activated successfully.' : 'Blog deactivated successfully.'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('user.blog.show', ['blog' => $blog]); //show a single blog
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
