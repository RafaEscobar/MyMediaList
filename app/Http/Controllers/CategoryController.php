<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\CategoryCollection;
use App\Models\Category;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::all();
            return new CategoryCollection($categories);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
