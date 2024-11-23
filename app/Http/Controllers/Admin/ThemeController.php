<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Necessary to use authorization for edit/update functionalities


class ThemeController extends Controller
{
    use AuthorizesRequests; // Necessary to use authorization for edit/update functionalities

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $themes = Theme::all();
        return view('admin.theme.index', compact('themes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.theme.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'themeTitle' => 'required|max:100',
        ]);

        $theme = new Theme();
        $theme->themeTitle = $request->input('themeTitle');
        $theme->save();

        return redirect()->route('admin.theme.index')->with('success', 'Theme created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theme $theme)
    {
        return view('admin.theme.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'themeTitle' => 'required|max:100',
        ]);

        $theme->themeTitle = $request->input('themeTitle');
        $theme->save();

        return redirect()->route('admin.theme.index')->with('success', 'Theme updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theme $theme)
    {
        // Ensure themes with associated blogs cannot be deleted
        if ($theme->blogs()->exists()) {
            return redirect()->route('admin.theme.index')
                ->with('error', 'Theme cannot be deleted as it is associated with blogs.');
        }

        $theme->delete();

        return redirect()->route('admin.theme.index')->with('success', 'Theme deleted successfully.');
    }
}
