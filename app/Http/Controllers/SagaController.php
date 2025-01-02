<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\SagaStoreRequest;
use App\Http\Requests\Update\SagaUpdateRequest;
use App\Http\Resources\Collections\SagaCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    }

    public function update(SagaUpdateRequest $request, $id)
    {

    }

    public function show($id)
    {

    }

    public function destroy($id)
    {

    }
}
