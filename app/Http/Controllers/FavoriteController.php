<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\MediumCollection;
use App\Http\Resources\Collections\SagaCollection;
use App\Models\Medium;
use App\Models\Saga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public $types = ['saga', 'media'];
    public function index(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            if ($request['type'] == $this->types[1]) {
                $favorites = $user->favorites(Medium::class)->get();
                return new MediumCollection($favorites);
            } else if ($request['type'] == $this->types[0]) {
                $favorites = $user->favorites(Saga::class)->get();
                return new SagaCollection($favorites);
            } else {
                return response()->json(["message" => "No has filtrado por tipo."]);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            if (empty($request->type) && !in_array($request->type, $this->types)) return response()->json(["message" => 'El tipo debe ser obligatorio y válido.'], 400);
            ($request->type == $this->types[0]) ? Auth::user()->favoriteSaga()->attach($request->id) : Auth::user()->favoriteMedia()->attach($request->id);
            return response()->json(["message" => 'Agregado a favoritos'], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
