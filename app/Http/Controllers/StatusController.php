<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\StatusCollection;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        try {
            $statuses = Status::all();
            return new StatusCollection($statuses);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
