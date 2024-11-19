<?php

namespace App\Http\Controllers;

use App\Models\Mushroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MushroomControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data jamur
        $mushrooms = Mushroom::all();

        // Return data dalam format JSON
        return response()->json([
            'status' => 'success',
            'data' => $mushrooms,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'status' => 'form_ready',
            'message' => 'Form for creating a new mushroom is ready',
        ], 200);
    }
}
