<?php

namespace App\Http\Controllers\API\Categories;

use App\Models\ModelCategories;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class Put
{
    public function index($id = null, Request $request, Response $response)
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
        // Check id
        $find = ModelCategories::find($id);

        if (!$find)
            return response()->json([
                'message' => 'id tidak ditemukan'
            ], 404);

        // Update data
        try {
            $find->update([
                'name' => $data['name'],
            ]);

            return response()->json([
                'message' => 'update kategori berhasil'
            ]);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'kesalahan pada server. gagal update data'
            ], 500);
        }
    }
}
