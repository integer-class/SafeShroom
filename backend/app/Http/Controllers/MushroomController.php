<?php

namespace App\Http\Controllers;
use App\Models\Mushroom;
use Illuminate\Http\Request;

class MushroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mushrooms = Mushroom::all();

        
        return view('mushroom.index', compact('mushrooms'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mushroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_poisonous' => 'required|boolean',
        ]);
    
        // Menyimpan foto jika ada
        if ($request->hasFile('photo')) {
            // Mengambil file yang di-upload
            $file = $request->file('photo');
    
            // Menentukan nama file dan lokasi penyimpanan di folder public/mushrooms
            $photoPath = 'mushrooms/' . $file->getClientOriginalName();
    
            // Memindahkan file ke folder public/mushrooms
            $file->move(public_path('mushrooms'), $file->getClientOriginalName());
        } else {
            $photoPath = null;
        }
    
        // Menyimpan data jamur ke database
        Mushroom::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'photo' => $photoPath,  // Menyimpan path file foto
            'is_poisonous' => $validated['is_poisonous'],
        ]);
    
        return redirect()->route('mushroom.index')->with('success', 'Mushroom created successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
