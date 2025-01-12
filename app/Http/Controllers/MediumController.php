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
            $medias = Auth::user()->entertainment()->paginate($request->limit);
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
