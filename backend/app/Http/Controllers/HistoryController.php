<?php

namespace App\Http\Controllers;
use App\Models\History;
use App\Models\Mushroom;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // Validate the request
    $validated = $request->validate([
        'id_user' => 'required|exists:users,id',
    ]);

    // Get all histories for the user
    $history = History::where('id_user', $validated['id_user'])->get();
    
    // Check if history is empty
    if ($history->isEmpty()) {
        return response()->json([
            'status' => 'success',
            'message' => 'No history found for this user.',
            'mushrooms' => null,
            'recommendations' => null,
        ], 200);
    }

    // Extract unique mushroom and recommendation IDs from history
    $mushroomIds = $history->pluck('id_mushroom')->unique();
    $recommendationIds = $history->pluck('id_recommendation')->unique();

    // Get mushrooms based on extracted IDs
    $mushrooms = Mushroom::whereIn('id_mushroom', $mushroomIds)->get();

    // Get recommendations based on extracted IDs (if IDs exist)
    $recommendations = $recommendationIds->isNotEmpty()
        ? Recommendation::whereIn('id_recommendation', $recommendationIds)->get()
        : null;

    // Return the response as JSON
    return response()->json([
        'status' => 'success',
        'mushrooms' => $mushrooms,
        'recommendations' => $recommendations,
    ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id', // id_user harus ada di tabel users
            'id_mushroom' => 'required|exists:mushrooms,id', // id_mushroom harus ada di tabel mushrooms
            'id_recommendation' => 'nullable|exists:recommendations,id', // Opsional, harus ada di tabel recommendations jika ada
        ]);

        // Simpan data ke tabel history
        $history = History::create([
            'id_user' => $validated['id_user'],
            'id_mushroom' => $validated['id_mushroom'],
            'id_recommendation' => $validated['id_recommendation'] ?? null, // Nilai default null jika tidak diisi
        ]);

        // Kembalikan respons sukses
        return response()->json([
            'message' => 'History successfully created.',
            'data' => $history,
        ], 201);
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
