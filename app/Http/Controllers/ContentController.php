<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\ContentStoreRequest;
use App\Http\Requests\Update\ContentUpdateRequest;
use App\Models\Content;
use Illuminate\Routing\Controller;
use Request;

class ContentController extends Controller
{
    public function index()
    {
        try {
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function show(Content $content)
    {

    }

    public function store(ContentStoreRequest $request)
    {

    }

    public function update(ContentUpdateRequest $request, Content $content)
    {

    }

    public function destroy(Content $content)
    {

    }
}
