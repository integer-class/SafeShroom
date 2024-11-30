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
    }


    // Memperbarui recommendation
        public function update(Request $request, Recommendation $recommendation)
        {

            // Validasi input
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'mushroom_id' => 'required|exists:mushrooms,id',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            try {
                // Jika ada foto baru, hapus foto lama dan simpan yang baru
                if ($request->hasFile('photo')) {
                    if ($recommendation->photo) {
                        Storage::disk('public')->delete($recommendation->photo);
                    }
                    $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
                }

                // Update data recommendation
                $recommendation->update($validatedData);

                return redirect()->route('recommendations.index')->with('success', 'Recommendation updated successfully.');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return redirect()->back()->withErrors(['error' => 'Failed to update recommendation.']);
            }
            return view('recommendations.index', compact('recommendation', 'mushroom'));
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
