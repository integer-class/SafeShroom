<?php

namespace App\Http\Controllers;

use App\Models\SummaryResult;
use App\Models\Mushroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MushroomSummaryController extends Controller
{
    public function index()
    {
        $summaryResults = SummaryResult::with('mushroom')->get();
        return view('summary-results.index', compact('summaryResults'));
    }

    public function create()
    {
        $mushrooms = Mushroom::all();
        return view('summary-results.create', compact('mushrooms'));
    }

        public function store(Request $request)
    {
        $request->validate([
            'mushroom_id' => 'required|exists:mushrooms,id',
            'summary' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validasi foto
        ]);

        // Ambil data description dari Mushroom yang dipilih
        $mushroomDescription = Mushroom::find($request->mushroom_id)->description;

        // Gabungkan summary dengan description dari mushroom
        $fullSummary = $request->summary . "\n\n" . $mushroomDescription;

        // Simpan foto jika ada
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        // Simpan data SummaryResult dengan summary yang sudah digabungkan
        SummaryResult::create([
            'mushroom_id' => $request->mushroom_id,
            'summary' => $fullSummary, // summary yang digabungkan dengan deskripsi mushroom
            'photo' => $photoPath ?? null, // Menyimpan path foto
        ]);

        return redirect()->route('summary-results.index')->with('success', 'Summary added successfully!');
    }

    public function edit(SummaryResult $summaryResult)
    {
        $mushrooms = Mushroom::all();
        return view('summary-results.edit', compact('summaryResult', 'mushrooms'));
    }

    public function update(Request $request, SummaryResult $summaryResult)
    {
        // Validasi input, termasuk foto jika ada
        $request->validate([
            'mushroom_id' => 'required|exists:mushrooms,id',
            'summary' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        // Menyimpan foto baru jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($summaryResult->photo) {
                Storage::disk('public')->delete($summaryResult->photo);
            }

            // Simpan foto baru
            $photoPath = $request->file('photo')->store('photos', 'public');
            $summaryResult->photo = $photoPath;
        }

        // Update data SummaryResult
        $summaryResult->update([
            'mushroom_id' => $request->mushroom_id,
            'summary' => $request->summary,
        ]);

        // Simpan perubahan foto jika ada
        $summaryResult->save();

        return redirect()->route('summary-results.index')->with('success', 'Summary updated successfully!');
    }

    public function destroy(SummaryResult $summaryResult)
    {
        // Hapus foto jika ada
        if ($summaryResult->photo) {
            Storage::disk('public')->delete($summaryResult->photo);
        }

        // Hapus data
        $summaryResult->delete();
        return redirect()->route('summary-results.index')->with('success', 'Summary deleted successfully!');
    }

    public function show(SummaryResult $summaryResult)
    {
        return view('summary-results.show', compact('summaryResult'));
    }
}
