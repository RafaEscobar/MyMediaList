<?php

namespace App\Http\Controllers;

use App\Http\Requests\Get\AuthRequest;
use App\Http\Requests\Store\RegisterRequest;
use App\Http\Resources\Resources\UserResource;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        try {
            if (Auth::attempt($request->all())) {
                $user = User::findOrFail(Auth::user()->id);
                $topCategory = $user->contents()
                    ->select('category_id', DB::raw('COUNT(*) as total'))
                    ->groupBy('category_id')
                    ->orderByDesc('total')
                    ->with('category')
                    ->first();
                $pendings = $user->contents()->where('status', 0)->count();
                $favorites = $user->contents()->where('isFavorite', 1)->count();
                $declined = $user->contents()->where('status', 2)->count();
                $day = $user->contents()
                    ->select(DB::raw('DAYNAME(created_at) as day'), DB::raw('COUNT(*) as total'))
                    ->groupBy('day')
                    ->orderByDesc('total')
                    ->first();
                $token = $user->createToken('auth_token')->plainTextToken;
                return new UserResource($user, $token);
            } else {
                return response()->json(["message" => "Credenciales incorrectas"], 401);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create($request->all());
            $token = $user->createToken('auth_token')->plainTextToken;
            return new UserResource($user, $token);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return response()->json(["message" => "Sesión cerrada"], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
