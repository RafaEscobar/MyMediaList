<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\ChapterStoreRequest;
use App\Http\Requests\Update\ChapterUpdateRequest;
use App\Models\Chapter;
use Auth;
use Illuminate\Routing\Controller;

class ChapterController extends Controller
{
    public function store(ChapterStoreRequest $request)
    {
        try {
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function update(ChapterUpdateRequest $request, Chapter $chapter)
    {

    }

    public function destroy(Chapter $chapter)
    {

    }
}
