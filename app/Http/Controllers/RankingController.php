<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\ContentCollection;
use App\Models\Content;
use Illuminate\Http\Request;

class RankingController
{
    public function index(Request $request)
    {
        try {
            $contents = Content::orderBy('score', 'desc')->limit(20)->get();
            return new ContentCollection($contents, false);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
