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
            if (!empty($request['saga_id']) && !empty($request['ascOrder'])) {
                $chapters = Chapter::where('saga_id', $request->saga_id)
                    ->orderBy('created_at', filter_var($request->ascOrder, FILTER_VALIDATE_BOOL) ? 'asc' : 'desc')
                    ->get();
                return new ChapterCollection($chapters);
            } else {
                return response()->json(["message" => "Verifica los datos que se envían con la solicitud"], 400);
            }
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(ChapterStoreRequest $request)
    {
        try {
            $chapter = Chapter::create($request->all());
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
