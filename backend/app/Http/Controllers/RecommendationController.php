<?php

namespace App\Http\Controllers;

use App\Models\Recommendation; 
use App\Models\Mushroom;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        // Mengambil data recommendations dengan relasi mushroom
        $recommendations = Recommendation::with('mushroom')->get();
        $mushrooms = Mushroom::all();

        // Pastikan relasi sudah ter-load dengan benar
        return view('recommendations.index', compact('recommendations', 'mushrooms'));
    }
    
    public function create()
    {
        $mushrooms = Mushroom::all(); // Mengambil data jamur
        return view('recommendations.create', compact('mushrooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mushroom_id' => 'required|exists:mushrooms,id',
            'photo' => 'nullable|image', // Foto tidak wajib diisi
        ]);
    
        // Menyimpan data ke database
        $recommendation = new Recommendation();
        $recommendation->title = $request->input('title');
        $recommendation->description = $request->input('description');
        $recommendation->mushroom_id = $request->input('mushroom_id');
    
        // Jika ada file foto, simpan foto, jika tidak, set foto default
        $recommendation->photo = $request->hasFile('photo') 
            ? $request->file('photo')->store('photos', 'public') 
            : 'default_photo.jpg';
    
        // Simpan rekomendasi ke dalam tabel
        $recommendation->save();
    
        return redirect()->route('recommendations.index')->with('success', 'Recommendation created successfully');
    }
    

    public function edit($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        $mushroom = $recommendation->mushroom; // Asumsikan ada relasi 'mushroom' di model Recommendation
        
        return view('recommendations.edit', compact('recommendation', 'mushroom'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mushroom_id' => 'required|exists:mushrooms,id',
        ]);

        $recommendation = Recommendation::findOrFail($id);
        $recommendation->update($validated);

        return redirect()->route('recommendations.index')->with('success', 'Recommendation updated successfully!');
    }

    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        $recommendation->delete();

        return redirect()->route('recommendations.index')->with('success', 'Recommendation deleted successfully!');
    }
}
