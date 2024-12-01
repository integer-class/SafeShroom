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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan file gambar jika ada
        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('photos', 'public')
            : null;

        // Buat data Recommendation baru
        Recommendation::create([
            'title' => $request->title,
            'description' => $request->description,
            'mushroom_id' => $request->mushroom_id,
            'photo' => $photoPath,
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
        $recommendation = Recommendation::findOrFail($id); // Ambil satu rekomendasi
        $mushroom = Mushroom::findOrFail($recommendation->mushroom_id); // Ambil satu jamur terkait

        return view('recommendations.edit', compact('recommendation', 'mushroom'));
        // return view('recommendations.edit', compact('recommendation'));

    }


    // Memperbarui recommendation
    public function update(Request $request, Recommendation $recommendation)
    {
        // Jika ada file baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus file foto lama jika ada
            if ($recommendation->photo && Storage::disk('public')->exists($recommendation->photo)) {
                Storage::disk('public')->delete($recommendation->photo);
            }
            // Simpan file baru
            $photoPath = $request->file('photo')->store('photos', 'public');
            $request->merge(['photo' => $photoPath]); // Tambahkan path foto ke dalam request
        }

        // Update data rekomendasi
        $recommendation->update($request->only(['title', 'description', 'mushroom_id', 'photo']));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('recommendations.index')->with('success', 'Recommendation updated successfully.');


        // dd($request,$recommendation);
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
