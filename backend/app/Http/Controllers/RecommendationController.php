<?php

namespace App\Http\Controllers;

use App\Models\Recommendation; 
use App\Models\Mushroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecommendationController extends Controller
{
    // Menampilkan semua recommendations
    public function index()
    {
        $recommendations = Recommendation::with('mushroom')->get();
        return view('recommendations.index', compact('recommendations'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mushroom_id' => 'required|exists:mushrooms,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk file gambar
        ]);
    
        $data = $request->except('photo');
        
        // Simpan file gambar jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('recommendations', 'public'); // Simpan ke storage/public/recommendations
        }
    
        // Simpan data ke model Recommendation
        Recommendation::create($data);
    
        return redirect()->route('recommendations.index')->with('success', 'Recommendation successfully created!');
    }
    // Menampilkan form untuk membuat recommendation baru
    public function create()
    {
        $mushrooms = Mushroom::where('is_edible', true)->get(); // Hanya jamur dapat dimakan
        return view('recommendations.create', compact('mushrooms'));
    }



    // Menampilkan form edit recommendation
    public function edit($id)
    {
        $recommendation = Recommendation::findOrFail($id);
        $mushrooms = Mushroom::where('is_edible', true)->get();
        return view('recommendations.edit', compact('recommendation', 'mushrooms'));
    }

    // Memperbarui recommendation
    public function update(Request $request, $id)
    {
        $recommendation = Recommendation::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mushroom_id' => 'required|exists:mushrooms,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $recommendation->title = $validated['title'];
        $recommendation->description = $validated['description'];
        $recommendation->mushroom_id = $validated['mushroom_id'];

        // Perbarui foto jika diupload
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($recommendation->photo && file_exists(public_path($recommendation->photo))) {
                unlink(public_path($recommendation->photo));
            }

            // Simpan foto baru
            $file = $request->file('photo');
            $photoPath = 'recommendations/' . $file->getClientOriginalName();
            $file->move(public_path('recommendations'), $file->getClientOriginalName());
            $recommendation->photo = $photoPath;
        }

        $recommendation->save();

        return redirect()->route('recommendations.index')->with('success', 'Recommendation updated successfully.');
    }

    // Menghapus recommendation
    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);

        // Hapus foto jika ada
        if ($recommendation->photo && file_exists(public_path($recommendation->photo))) {
            unlink(public_path($recommendation->photo));
        }

        $recommendation->delete();

        return redirect()->route('recommendations.index')->with('success', 'Recommendation deleted successfully.');
    }
}
