<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnimalRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecordController extends Controller 
{
    public function create()
    {
        // Get only the current farmer's records
        $records = AnimalRecord::where('user_id', Auth::guard('farmer')->id())
            ->latest()
            ->get();

        return view('records.create')->with('records', $records);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'animal_type' => 'required|in:chicken,cattle',
            'breed' => 'required|string|max:255',
            'meat_yield' => 'required|numeric|min:0',
            'egg_production' => 'nullable|numeric|min:0',
            'milk_production' => 'nullable|numeric|min:0',
            'health_status' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('animal_photos', 'public');
            
        }

        // Save the record
        $record = AnimalRecord::create([
            'user_id' => Auth::guard('farmer')->id(), // linked to farmer
            'animal_type' => $validated['animal_type'],
            'breed' => $validated['breed'],
            'meat_yield' => $validated['meat_yield'],
            'egg_production' => $validated['egg_production'] ?? null,
            'milk_production' => $validated['milk_production'] ?? null,
            'health_status' => $validated['health_status'],
            'photo_path' => $photoPath,
        ]);

        return redirect()->route('records.create')->with([
            'success' => 'Animal record added successfully!',
            'new_record' => $record,
        ]);




    }
}