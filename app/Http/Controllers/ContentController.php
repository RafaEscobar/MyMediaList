<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\ContentStoreRequest;
use App\Http\Requests\Update\ContentUpdateRequest;
use App\Http\Resources\Collections\ContentCollection;
use App\Http\Resources\Resources\ContentResource;
use App\Models\Content;
use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $contents = Auth::user()->contents()
                ->when($request->has('category_id'), function($q) use ($request) {
                    $q->where('category_id', $request->input('category_id'));
                })->paginate($request->input('limit'));
            return new ContentCollection($contents);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function show(Content $content)
    {
        try {
            return new ContentResource($content);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function store(ContentStoreRequest $request)
    {
        try {
            $content = Content::create($request->validated());
            $content->addMediaFromRequest('image')->toMediaCollection('contents');
            return new ContentResource($content);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function update(ContentUpdateRequest $request, Content $content)
    {

    }

    public function destroy(Content $content)
    {

    }
}
