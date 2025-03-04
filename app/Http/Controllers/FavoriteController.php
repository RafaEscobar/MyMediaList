<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\FavStoreRequest;
use App\Http\Resources\Collections\MediumCollection;
use App\Http\Resources\Collections\SagaCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (empty($request['type'])) return response()->json(["message" => "No has filtrado por tipo."]);
            if ($request['type'] == 'media') {
                return new MediumCollection(Auth::user()->favoriteMedia);
            } else if ($request['type'] == 'saga') {
                return new SagaCollection(Auth::user()->favoriteSaga);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(FavStoreRequest $request)
    {
        try {
            ($request->type == 'saga') ? Auth::user()->favoriteSaga()->syncWithoutDetaching($request->id) : Auth::user()->favoriteMedia()->syncWithoutDetaching($request->id);
            return response()->json(["message" => 'Agregado a favoritos'], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
