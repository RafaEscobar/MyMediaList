<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\MediumStoreRequest;
use App\Http\Requests\Update\MediumUpdateRequest;
use App\Http\Resources\Collections\MediumCollection;
use Illuminate\Support\Facades\Auth;

class MediumController extends Controller
{
    public function index()
    {
        try {
            $medias = Auth::user()->entertainment;
            return new MediumCollection($medias);
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

    public function store(MediumStoreRequest $request)
    {
        try {

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

    public function destroy($id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
