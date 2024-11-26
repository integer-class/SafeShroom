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



        // Simpan file gambar jika ada
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public'); // Simpan ke storage/public/recommendations
        }

        Recommendation::create([
            'title' => $request->title,
            'description' => $request->description,
            'mushroom_id' => $request->mushroom_id,
            'photo' => $photoPath ?? null,
        ]);

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
    public function update(Request $request, Recommendation $recommendation)
    {
        // Validasi input, termasuk foto jika ada
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'mushroom_id' => 'required|exists:mushrooms,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi foto
        ]);

        // Menyimpan foto baru jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($recommendation->photo) {
                Storage::disk('public')->delete($recommendation->photo);
            }

            // Simpan foto baru
            $photoPath = $request->file('photo')->store('photos', 'public');
            $recommendation->photo = $photoPath;
        }

        // Update data Recommendation
        $recommendation->update([
            'title' => $request->title,
            'description' => $request->description,
            'mushroom_id' => $request->mushroom_id,
        ]);

        // Simpan perubahan foto jika ada
        $recommendation->save();

        return redirect()->route('recommendations.index')->with('success', 'Recommendation updated successfully.');
    }


    // Menghapus recommendation
    public function destroy($id)
    {
        $recommendation = Recommendation::findOrFail($id);

        // Hapus foto jika ada
        if ($recommendation->photo) {
            Storage::disk('public')->delete($recommendation->photo);
        }
        $recommendation->delete();

        return redirect()->route('recommendations.index')->with('success', 'Recommendation deleted successfully.');
    }
}
