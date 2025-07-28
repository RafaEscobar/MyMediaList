<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\MediumStoreRequest;
use App\Http\Requests\Update\MediumUpdateRequest;
use App\Http\Resources\Collections\MediumCollection;
use App\Http\Resources\Resources\MediumResoruce;
use App\Models\Medium;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MediumController extends Controller
{
    public function index(Request $request)
    {
        try {
            $medias = Auth::user()->entertainment()
            ->when($request->has('category_id'), function($q) use ($request){
                $q->where('category_id', $request->category_id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($request->limit);
            return new MediumCollection($medias);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(MediumStoreRequest $request)
    {
        try {
            $medium = Medium::create($request->all());
            $medium->addMediaFromRequest('image')->toMediaCollection('medias');
            return new MediumResoruce($medium);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function update(MediumUpdateRequest $request, $id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $media = Medium::where('id', $id)->where('user_id', Auth::user()->id)->first();
            if ($media) {
                return new MediumResoruce($media);
            } else {
                return response()->json(["message" => "Recurso no encontrado"], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
