<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\PriorityCollection;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index(Request $request)
    {
        try {
            $priorities = Priority::paginate($request->per_page ?? 10);
            return new PriorityCollection($priorities);
        } catch (\Throwable $th) {
            return  response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
