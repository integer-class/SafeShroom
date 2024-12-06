<?php

namespace App\Http\Controllers;

use App\Models\Mushroom;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MushroomControllerAPI extends Controller
{
   
    public function index()
    {
        $mushrooms = Mushroom::all();
        $recommendation = Recommendation::all();
        return response()->json([
            'status' => 'success',
            'mushroom' => $mushrooms,
            'recommendation' => $recommendation,
        ], 200);
    }

    
    public function create()
    {
        return response()->json([
            'status' => 'form_ready',
            'message' => 'Form for creating a new mushroom is ready',
        ], 200);
    }
}
