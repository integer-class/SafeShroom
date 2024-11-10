<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
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

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password), // Meng-hash password

        ]);

        // Mengembalikan respons dengan data pengguna yang terdaftar
        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user,
        ], 201); // Status code 201 untuk created
    }
}