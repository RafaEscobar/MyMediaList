<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\SagaStoreRequest;
use App\Http\Requests\Update\SagaUpdateRequest;
use App\Http\Resources\Collections\SagaCollection;
use App\Http\Resources\Resources\SagaResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Saga;
use Illuminate\Http\Request;

class SagaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $sagas = Auth::user()->sagas()
            ->when($request->has('category_id'), function($q) use ($request) {
                $q->where('category_id', $request->category_id);
            })->paginate($request->limit);
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
            $this->getDataSaga($saga);
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
            $saga = Saga::where('id', $id)->where('user_id', Auth::user()->id)->first();
            if ($saga) {
                return $this->getDataSaga($saga);
            } else {
                return response()->json(["message" => "Recurso no encontrado"], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {

    }

    private function getDataSaga(Saga $saga)
    {
        $raking = Auth::user()->sagas()->orderByDesc('score')->limit(10)->pluck('id');
        $position = $raking->search($saga->id);
        return new SagaResource($saga, $position ? $position+1 : null);
    }
}
