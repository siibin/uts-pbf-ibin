<?php

namespace App\Http\Controllers\API\Products;

use App\Models\ModelProducts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Get
{
    public function index(Request $request, Response $response)
    {
        $data = ModelProducts::all();

        return response()->json([
            'message' => 'get data berhasil',
            'data' => $data
        ]);
    }
}
