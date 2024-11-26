<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendationsControllerAPI extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Recommendations fetched successfully',
            'data' => [] 
        ], 200);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
