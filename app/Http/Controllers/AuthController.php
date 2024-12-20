<?php

namespace App\Http\Controllers;

use App\Http\Requests\Get\AuthRequest;
use App\Http\Requests\Store\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        try {
            if (Auth::attempt($request->all())) {
                $user = User::findOrFail(Auth::user()->id);
                $token = $user->createToken('auth_token')->plainTextToken;
            }
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create($request->all());
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
