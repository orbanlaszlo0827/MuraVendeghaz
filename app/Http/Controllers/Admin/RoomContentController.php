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
            'rooms.*.description' => 'required|string',
        ]);

        foreach ($request->rooms as $id => $data) {
            $roomContent = RoomContent::find($id);
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
