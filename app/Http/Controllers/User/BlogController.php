<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Necessary to use authorization for edit/update functionalities


class BlogController extends Controller
{
    use AuthorizesRequests; // Necessary to use authorization for edit/update functionalities

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Only fetch blogs that belong to a user (which should be every blog), and that are active
        $blogs = Blog::with('user')->where('active', true)->get();

//        $blogs = Blog::all(); //retrieve all blogs from the database

        return view('user.blog.index', ['blogs' => $blogs]); //return the blogs to a view
    }

    /**
     * Redirect to create with image from flashgame
     */
    public function redirectWithImage(Request $request)
    {
        $imageData = $request->input('image_data'); // Get image data from the request

        // Pass the image data to the blog creation page
        return view('user.blog.create', compact('imageData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('user.blog.create');
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

        // If the blog has an image, store image in public
        if ($request->hasFile('image')) {
            $blog->image = $request->file('image')->store('images', 'public');
        }
        $blog->save();
        // To do: display message
        return redirect()->route('user.blog.index')->with('success', 'Blog created successfully.');
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
    public function edit(Blog $blog)
    {
        // Authorize the action
        $this->authorize('update', $blog);

        // Return to edit view
        return view('user.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Find the id or fail
//        $blog = Blog::findOrFail($blog);

        // Authorize the action
        $this->authorize('update', $blog);

        // Validate input
        $request->validate([
            'title' => 'required|max:100', // Maximum is the same as in create
            'description' => 'required',
        ]);

        // Update blog details
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');

        // If the new version has an image, store image in public
//        if ($request->hasFile('image')) {
//            $blog->image = $request->file('image')->store('images', 'public');
//        }

        // Handle image upload
        if ($request->filled('image_data')) {
            $imageData = $request->input('image_data');
            $imageData = explode(',', $imageData)[1]; // Remove the data URL prefix
            $imageData = base64_decode($imageData);

            $imageName = uniqid('outfit_', true) . '.png';
            $imagePath = storage_path('app/public/images/' . $imageName);
            file_put_contents($imagePath, $imageData);

            $blog->image = 'images/' . $imageName; // Save relative path in the database
        }

        // Save updated version of blog
        $blog->save();

        // Return to all blogs with succes message
        return redirect()->route('user.blog.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Authorize the action
        $this->authorize('delete', $blog);
        // Delete the blog
        $blog->delete();
        // Return to index page
        return redirect()->route('user.blog.index')->with('success', 'Blog deleted successfully.');
    }
}
