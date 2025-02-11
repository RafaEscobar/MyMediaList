<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\SagaStoreRequest;
use App\Http\Requests\Update\SagaUpdateRequest;
use App\Http\Resources\Collections\SagaCollection;
use App\Http\Resources\Resources\SagaResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Saga;

class SagaController extends Controller
{
    public function index()
    {
        try {
            $sagas = Auth::user()->sagas;
            return new SagaCollection($sagas);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(SagaStoreRequest $request)
    {
        try {
            $saga = Saga::create($request->all());
            $saga->addMediaFromRequest('image')->toMediaCollection('sagas');
            return new SagaResource($saga);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function update(SagaUpdateRequest $request, $id)
    {

    }

    public function show($id)
    {
        try {
            $saga = Saga::findOrFail($id);

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {

    }
}
