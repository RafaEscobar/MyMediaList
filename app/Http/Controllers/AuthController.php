<?php

namespace App\Http\Controllers;

use App\Http\Requests\Get\AuthRequest;
use App\Http\Requests\Store\RegisterRequest;
use App\Http\Resources\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        try {
            if (Auth::attempt($request->all())) {
                $user = User::findOrFail(Auth::user()->id);
                $token = $user->createToken('auth_token')->plainTextToken;
                return new UserResource($user, $token);
            } else {
                return response()->json(['message' => 'Credenciales incorrectas'], 401);
            }

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create($request->all());
            $token = $user->createToken('auth_token')->plainTextToken;
            return new UserResource($user, $token);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return response()->json(["message" => "Sesión terminada"], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
