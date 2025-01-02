<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\ChapterStoreRequest;
use App\Http\Requests\Update\ChapterUpdateRequest;
use App\Http\Resources\Collections\ChapterCollection;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        try {
            $chapters = Chapter::all();
            return new ChapterCollection($chapters);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(ChapterStoreRequest $request)
    {

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
