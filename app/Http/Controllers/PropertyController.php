<?php

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return Property::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image'
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        $property = Property::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'photo' => $path,
        ]);

        return response()->json([
            'message' => 'Property created successfully',
            'property' => $property
        ]);
    }

    public function show($id)
    {
        return Property::findOrFail($id);
    }
}
