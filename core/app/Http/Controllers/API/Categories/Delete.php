<?php

namespace App\Http\Controllers\API\Categories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ModelCategories;
use Illuminate\Database\QueryException;

class Delete
{
    public function index($id = null, Request $request, Response $response)
    {
        // Check id
        $find = ModelCategories::find($id);

        if (!$find)
            return response()->json([
                'message' => 'id tidak ditemukan'
            ], 404);

        // Delete data
        try {
            $find->delete();

            return response()->json([
                'message' => 'delete kategori berhasil'
            ]);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'kesalahan pada server. gagal delete data'
            ], 500);
        }
    }
}
