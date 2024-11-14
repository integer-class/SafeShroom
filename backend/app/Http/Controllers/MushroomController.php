<?php

namespace App\Http\Controllers;
use App\Models\Mushroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
    

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mushroom = Mushroom::findOrFail($id); // Mencari data jamur berdasarkan ID
        return view('mushroom.edit', compact('mushroom'));
    }

    
    public function update(Request $request, $id)
    {
        $mushroom = Mushroom::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_poisonous' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Update nama dan deskripsi jamur
        $mushroom->name = $request->input('name');
        $mushroom->description = $request->input('description');
        $mushroom->is_poisonous = $request->input('is_poisonous');

        // Cek apakah ada foto baru yang diupload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($mushroom->photo) {
                Storage::delete('public/photos/' . $mushroom->photo);
            }

            // Simpan foto baru
            $photoPath = $request->file('photo')->store('photos', 'public');
            $mushroom->photo = basename($photoPath);
        }

        // Simpan perubahan
        $mushroom->save();

        // Redirect dengan pesan sukses
        return redirect()->route('mushroom.index')->with('success', 'Mushroom updated successfully.');
    }

    
    
    public function destroy($id)
    {
        $mushroom = Mushroom::findOrFail($id);

        // Hapus foto jika ada
        if ($mushroom->photo) {
            Storage::delete('public/photos/' . $mushroom->photo);
        }

        // Hapus jamur dari database
        $mushroom->delete();

        // Redirect ke halaman daftar jamur
        return redirect()->route('mushroom.index')->with('success', 'Mushroom deleted successfully.');
    }

    
}
