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
// If request is filled with something that has the key "theme_id"
        if ($request->filled('theme_id')) {
// Filter blogs based on the selected `theme_id` by adding a where condition
            $query->where('theme_id', $request->input('theme_id'));
        }
// If request is filled with something that has the key "search"
        if ($request->filled('search')) {
            // Retrieve the value of the 'search' input
            $searchTerm = $request->input('search');
            // Add a nested condition to the query
            $query->where(function ($q) use ($searchTerm) {
                // Match blogs where the title contains the search term
                $q->where('title', 'like', "%{$searchTerm}%")
                    // Or match blogs where the description contains the search term
                    ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        $blogs = $query->get(); // Retrieve the filtered blogs by fetching the query and storing it in $blogs

        // Display (filtered) blogs and themes (which user can filter with)
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

        // Handle base64 image data
        if ($request->filled('image_data')) {
            $imageData = $request->input('image_data');
            $imageData = explode(',', $imageData)[1]; // Remove the data URL prefix
            $imageData = base64_decode($imageData);

            $imageName = uniqid('blog_image_', true) . '.png';
            $imagePath = storage_path('app/public/outfits/' . $imageName);

            file_put_contents($imagePath, $imageData);

            $blog->image = 'outfits/' . $imageName; // Save relative path in the database
        }

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
        // Authorize the action through policy
        $this->authorize('update', $blog);

        // Return to edit view
        return view('user.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // Authorize the action through policy
        $this->authorize('update', $blog);

        // Validate input
        $request->validate([
            'title' => 'required|max:100', // Maximum is the same as in create
            'description' => 'required',
        ]);

        // Update blog details
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->theme_id = $request->input('theme_id');

        // Handle image upload
        if ($request->filled('image_data')) {
            // Get image data from request
            $imageData = $request->input('image_data');
            // Log the image data to check its contents
            error_log('Image Data: ' . $imageData);
            // Split the base64 string to remove the data URL
            // and extract only the actual base64-encoded image content
            $base64 = explode(',', $imageData)[1];
            // Decode the base64 string into binary image data
            $image = base64_decode($base64);

            // Add unique id to filename
            $imageName = uniqid('outfit_', true) . '.png';
            // Add unique filename to imagePath and store in variable
            $imagePath = storage_path('app/public/outfits/' . $imageName);
            // Put the imageData in filePath with imageName
            file_put_contents($imagePath, $image);

            $blog->image = $imagePath; // Save path in database
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
        // Authorize the action
        $this->authorize('delete', $blog);
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
