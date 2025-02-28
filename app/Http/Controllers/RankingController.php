<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\MediumCollection;
use App\Http\Resources\Collections\SagaCollection;
use Auth;

class RankingController extends Controller
{
    public function index()
    {
        try {
            $data = [];
            $data['movies'] = new MediumCollection(Auth::user()->entertainment()->where('category_id', 1)->orderByDesc('score')->limit(10)->get());
            $data['series'] = new SagaCollection(Auth::user()->sagas()->where('category_id', 2)->orderByDesc('score')->limit(10)->get());
            $data['mangas'] = new SagaCollection(Auth::user()->sagas()->where('category_id', 3)->orderByDesc('score')->limit(10)->get());
            $data['games'] = new MediumCollection(Auth::user()->entertainment()->where('category_id', 4)->orderByDesc('score')->limit(10)->get());
            $data['animes'] = new SagaCollection(Auth::user()->sagas()->where('category_id', 5)->orderByDesc('score')->limit(10)->get());
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage(), 500]);
        }
    }
}
