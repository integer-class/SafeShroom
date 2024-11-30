<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recommendation;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\Mushroom;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
class AuthController extends Controller
{


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only("email", "password"))) {
            return response()->json(
                [
                    "user" => Null,
                    "message" => "Invalid login details",
                    "stus" => "failed",
                ],
                200
            );
        }
        $user = User::where("email", $request["email"])->firstOrFail();
        $token = $user->createToken("auth_token")->plainTextToken;

        $user_loggedin=[

            'email' => $user->email,
            'user_token' => $token,
            'token_type' => 'Bearer',
            'verified' => true,
            'status'=>'loggedin'
        ];
        return response()->json(
            $user_loggedin,
            200
        );
    }
    public function daftar(Request $request)
    {

        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 

        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201); 
    }
    public function recommendations(Request $request)
    {
        $name = $request->name;
    
        
        $mushroom = Mushroom::where('name', $name)->first();
    

    
        $id = $mushroom->id;

        $mushroom = Recommendation::where('mushroom_id', $id)->first();

    
        return response()->json([
            'success' => true,
            'message' => 'Recommendations fetched successfully.',
            'data' => $mushroom,
        ], 200);
    }
    
 
        public function mushrooms()
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