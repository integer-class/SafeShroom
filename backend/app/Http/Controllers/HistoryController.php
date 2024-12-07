<?php

namespace App\Http\Controllers;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
