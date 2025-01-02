<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\PriorityCollection;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        try {
            $priorities = Priority::all();
            return new PriorityCollection($priorities);
        } catch (\Throwable $th) {
            return  response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
