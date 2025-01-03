<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\ChapterStoreRequest;
use App\Http\Requests\Update\ChapterUpdateRequest;
use App\Http\Resources\Collections\ChapterCollection;
use App\Http\Resources\Resources\ChapterResource;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (!empty($request['saga_id'])) {
                $chapters = Chapter::where('saga_id', $request->saga_id)->get();
                return new ChapterCollection($chapters);
            } else {
                return response()->json(["message" => "Falta el identificador de la serie."], 400);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(ChapterStoreRequest $request)
    {
        try {
            $chapter = Chapter::create($request->all());
            $chapter->addMediaFromRequest('image')->toMediaCollection('chapters');
            return new ChapterResource($chapter);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function update(ChapterUpdateRequest $request, $id)
    {

    }

    public function show($id)
    {

    }

    public function destroy($id)
    {

    }
}
