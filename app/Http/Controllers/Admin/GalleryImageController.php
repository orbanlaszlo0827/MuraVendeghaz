<?php

namespace App\Http\Controllers\Admin;

use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryImageController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = GalleryImage::all();

        return view('admin.edit_gallery', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $imagePath = $request->file('image')->store('gallery_images', 'public');

        GalleryImage::create([
            'image_path' => $imagePath,
            'category' => 'all'
        ]);
        session()->flash('success', 'A képek sikeresen feltöltve!');

        return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required|string'
        ]);

        $image = GalleryImage::findOrFail($id);
        $image->update(['category' => $request->category]);

        return response()->json(['success' => true, 'message' => 'Kategória frissítve']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = GalleryImage::findOrFail($id);

        $imagePath = public_path('storage/' . $image->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Kép sikeresen törölve!');
    }
}
