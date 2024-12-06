<?php

namespace App\Http\Controllers;

use App\Models\Mushroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MushroomControllerAPI extends Controller
{
   
    public function index()
    {
        $mushrooms = Mushroom::all();
       
        return response()->json([
            'status' => 'success',
            'data' => $mushrooms,
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
