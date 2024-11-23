<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Necessary to use authorization for edit/update functionalities


class BlogController extends Controller
{
    use AuthorizesRequests; // Necessary to use authorization for edit/update functionalities

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $themes = Theme::all(); // Fetch all themes, so we can display them to be chosen
        $query = Blog::with(['user', 'theme'])->where('active', true);
        // Apply theme filter if a theme_id is provided
        if ($request->filled('theme_id')) {
            $query->where('theme_id', $request->input('theme_id'));
        }
        $blogs = $query->get(); // Retrieve the filtered blogs

        return view('user.blog.index', compact('blogs', 'themes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $themes = Theme::all(); // Fetch all themes so we can display them to be chosen
        return view('user.blog.create', compact('themes'));    // Send themes to be displayed
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
        $blog->theme_id = $request->input('theme_id');
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
     * Display the specified resource.
     */
    public function delete(Blog $blog)
    {
        return view('user.blog.delete', ['blog' => $blog]); //show a single blog
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
