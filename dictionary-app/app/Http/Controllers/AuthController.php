<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function signin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($validated)) {
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 400);
    }

    public function profile()
    {
        return response()->json(Auth::user());
    }

    public function history()
    {
        return response()->json(Auth::user()->history);
    }

    public function favorites()
    {
        return response()->json(Auth::user()->favorites);
    }
}