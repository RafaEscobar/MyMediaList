<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\ChapterStoreRequest;
use App\Http\Requests\Update\ChapterUpdateRequest;
use App\Http\Resources\Resources\ChapterResource;
use App\Models\Chapter;
use Illuminate\Routing\Controller;

class ChapterController extends Controller
{
    public function store(ChapterStoreRequest $request)
    {
        try {
            $chapter = Chapter::create($request->validated());
            $chapter->addMediaFromRequest('image')->toMediaCollection('chapters');
            return new ChapterResource($chapter);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function update(ChapterUpdateRequest $request, Chapter $chapter)
    {
        try {
            $chapter->update($request->validated());
            return new ChapterResource($chapter);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy(Chapter $chapter)
    {

    }
}
