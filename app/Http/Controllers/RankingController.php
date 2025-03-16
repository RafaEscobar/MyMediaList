<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\MediumCollection;
use App\Http\Resources\Collections\SagaCollection;
use App\Models\Category;
use Auth;

class RankingController extends Controller
{
    public function index()
    {
        try {
            $data = [];
            $data['movies'] = new MediumCollection(Auth::user()->entertainment()->where('category_id', 1)->where('score', '!=', 0)->orderByDesc('score')->limit(10)->get());
            $data['series'] = new SagaCollection(Auth::user()->sagas()->where('category_id', 2)->where('score', '!=', 0)->orderByDesc('score')->limit(10)->get());
            $data['mangas'] = new SagaCollection(Auth::user()->sagas()->where('category_id', 3)->where('score', '!=', 0)->orderByDesc('score')->limit(10)->get());
            $data['games'] = new MediumCollection(Auth::user()->entertainment()->where('category_id', 4)->where('score', '!=', 0)->orderByDesc('score')->limit(10)->get());
            $data['animes'] = new SagaCollection(Auth::user()->sagas()->where('category_id', 5)->where('score', '!=', 0)->orderByDesc('score')->limit(10)->get());
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage(), 500]);
        }
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        switch ($category->subtype->subtype) {
            case 'Media':
                return new MediumCollection(Auth::user()->entertainment()->where('category_id', $id)->orderByDesc('score')->limit(10)->get());
            break;
            case 'Saga':
                return new SagaCollection(Auth::user()->sagas()->where('category_id', $id)->orderByDesc('score')->limit(10)->get());
            break;
            default:
                return response()->json(["message" => "El identificador proporcionado no es coincidente"], 404);
            break;
        }
    }
}
