<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomContent;
use Illuminate\Http\Request;

class RoomContentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = RoomContent::All();

        return view('admin.edit_rooms', compact('rooms'));
    }

    public function updateAll(Request $request)
    {
        $request->validate([
            'rooms' => 'required|array',
            'rooms.*.title' => 'required|string',
            'rooms.*.description' => 'required|string|max:1500',
            'rooms.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096'
        ]);

        foreach ($request->rooms as $id => $data) {
            $roomContent = RoomContent::find($id);

            if ($roomContent -> image_path && $request->hasFile("rooms.{$id}.image")) {
                // Régi kép törlése
                $oldImagePath = public_path('storage/' . $roomContent->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            if ($request->hasFile("rooms.{$id}.image")) {
                $imagePath = $request->file("rooms.{$id}.image")->store('room_images', 'public');
                $roomContent->update(['image_path' => $imagePath]);
            }

            if ($roomContent) {
                $roomContent->update([
                    'title' => $data['title'],
                    'description' => $data['description']
                ]);
            }
        }

        return redirect()->route('admin.rooms.index')->with('success', 'A szobák tartalma sikeresen frissítve!');
    }
}
