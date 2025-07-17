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
                })
                ->when($request->has('status'), function($q) use ($request) {
                    $q->where('status', $request->input('status'));
                })->paginate($request->input('limit'));
            return new ContentCollection($contents);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function show(Content $content)
    {
        try {
            $content->load('chapters');
            return new ContentResource($content);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function store(ContentStoreRequest $request)
    {
        try {
            $content = Content::create($request->validated());
            $content->addMediaFromRequest('image')->toMediaCollection('cover');
            return new ContentResource($content);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function update(ContentUpdateRequest $request, Content $content)
    {
        try {
            $content->update($request->validated());
            if ($request->has('image')) {
                $content->addMediaFromRequest('image')->toMediaCollection('cover');
            }
            return new ContentResource($content);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy(Content $content)
    {
        try {
            $content->delete();
            return response()->json(['Contenido eliminado'], 200);
        } catch (\Throwable $th) {
            response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
