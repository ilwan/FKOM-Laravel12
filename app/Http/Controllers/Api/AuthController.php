<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
     public function login(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        // cek user
        $user = User::where('email', $validated['email'])->first();

        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        // hapus token lama (opsional best practice)
        $user->tokens()->delete();

        // buat token baru
        $token = $user->createToken('android')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => $user
        ]);
    }
}
