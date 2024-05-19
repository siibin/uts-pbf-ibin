<?php

namespace App\Http\Controllers\API\Categories;

use App\Models\ModelCategories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Get
{
    public function index(Request $request, Response $response)
    {
        $data = ModelCategories::all();

        return response()->json([
            'message' => 'get data berhasil',
            'data' => $data
        ]);
    }
}
