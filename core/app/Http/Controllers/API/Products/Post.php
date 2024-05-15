<?php

namespace App\Http\Controllers\API\Products;

use App\Models\ModelCategories;
use App\Models\ModelProducts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Post
{
    public function index(Request $request, Response $response)
    {
        $data = $request->all();

        // Validasi data
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'price' => 'required|integer|max:99999999999',
            'category_id' => 'required',
            'expired_at' => 'required|date|date_format:Y-m-d',
            'image' => 'required|file|mimes:jpg,png,jpeg,webp',
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
        // Ambil email dari JWT
        $client = JWTAuth::parseToken()->authenticate();

        // Simpan upload image
        $pathFile = $request->file('image')->store('public');

        // Check category_id
        $checkCategoryId = ModelCategories::find($data['category_id']);

        if (!$checkCategoryId)
            return response()->json([
                'message' => '"category_id" tidak tersedia'
            ], 404);

        // Mencoba meng-insert data
        try {
            ModelProducts::insert([
                'name' => $data['name'],
                'description' => $data['description'] ?? '',
                'price' => $data['price'],
                'image' => $pathFile,
                'category_id' => $data['category_id'],
                'expired_at' => $data['expired_at'],
                'modified_by' => $client->email
            ]);

            return response()->json([
                'message' => 'insert produk berhasil'
            ]);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'kesalahan pada server. gagal insert data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
