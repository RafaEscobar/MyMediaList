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
    public function index(Request $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            if ($request['type'] == 'media') {
                $favorites = $user->favorites(Medium::class)->get();
                return new MediumCollection($favorites);
            } else if ($request['type'] == 'saga') {
                $favorites = $user->favorites(Saga::class)->get();
                return new SagaCollection($favorites);
            } else {
                return response()->json(["message" => "No has filtrado por tipo."]);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
