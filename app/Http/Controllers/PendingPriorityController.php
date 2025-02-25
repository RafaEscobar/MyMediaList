<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\PendingPriorityCollection;
use App\Models\PendingPriority;

class PendingPriorityController extends Controller
{
    public function index()
    {
        try {
            $priorities = PendingPriority::all();
            return new PendingPriorityCollection($priorities);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
