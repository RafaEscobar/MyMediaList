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
            $contents = Content::when($request->has('category_id'), function($q) use ($request) {
                $q->where('category_id', $request->input('category_id'));
            })
            ->orderBy('score', 'desc')
            ->limit(20)
            ->get();
            return new ContentCollection($contents, false);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
