<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        // Cek apakah pengguna sudah terautentikasi
        if (!auth()->check()) {
            Log::info('User not authenticated.');
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        // Cek apakah role sesuai
        if ($role && auth()->user()->role !== $role) {
            Log::info('Role mismatch. User role: ' . auth()->user()->role . ' | Expected role: ' . $role);
            return response()->json(['message' => 'Forbidden'], 403);
        }
    
        return $next($request);
    }
    
}

