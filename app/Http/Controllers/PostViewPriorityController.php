<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\PostViewPriorityCollection;
use App\Http\Resources\Resources\PostViewPriorityResource;
use App\Models\PostViewPriority;
use Illuminate\Http\Request;

class PostViewPriorityController extends Controller
{
    public function index()
    {
        try {
            $priorities = PostViewPriority::all();
            return new PostViewPriorityCollection($priorities);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
