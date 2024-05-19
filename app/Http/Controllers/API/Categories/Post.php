<?php

namespace App\Http\Controllers\API\Categories;

use App\Models\ModelCategories;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class Post
{
    public function index(Request $request, Response $response)
    {
        $data = $request->all();

        // Validasi data
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
        ]);

        // Kalau validasi gagal
        if ($validator->fails()) {
            return response()->json(
                [
                    'message' => 'payload tidak valid',
                    'error' => $validator->errors(),
                ],
                400
            );
        }

        // Kalau validasi berhasil
        // Mencoba meng-insert data
        try {
            ModelCategories::insert([
                'name' => $data['name']
            ]);

            return response()->json([
                'message' => 'insert kategori berhasil'
            ]);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'kesalahan pada server. gagal insert data'
            ], 500);
        }
    }
}
