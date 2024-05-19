<?php

namespace App\Http\Controllers\API\Products;

use App\Models\ModelProducts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class Delete
{
    public function index($id = null, Request $request, Response $response)
    {
        // Check id
        $find = ModelProducts::find($id);

        if (!$find)
            return response()->json([
                'message' => 'id tidak ditemukan'
            ], 404);

        // Delete data
        try {
            $find->delete();

            return response()->json([
                'message' => 'delete produk berhasil'
            ]);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'kesalahan pada server. gagal delete data'
            ], 500);
        }
    }
}
