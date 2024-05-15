<?php

namespace App\Http\Controllers\API\Products;

use App\Models\ModelCategories;
use App\Models\ModelProducts;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Put
{
    public function index($id = null, Request $request, Response $response)
    {
        $data = $request->all();

        // Validasi data
        $validator = Validator::make($data, [
            'name' => 'string|max:255',
            'price' => 'integer|max:99999999999',
            'expired_at' => 'date|date_format:Y-m-d',
            'image' => 'file|mimes:jpg,png,jpeg,webp',
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
        // Cek id
        $find = ModelProducts::find($id);

        if (!$find) {
            return response()->json([
                'message' => 'id tidak ditemukan'
            ], 404);
        }

        // Ambil email dari JWT
        $client = JWTAuth::parseToken()->authenticate();

        // Collect
        $updateData = $this->collectData($request);
        $updateData['modified_by'] = $client->email;

        // Mencoba meng-update data
        try {
            $find->update($updateData);

            return response()->json([
                'message' => 'update produk berhasil'
            ]);
        } catch (QueryException $e) {

            return response()->json([
                'message' => 'kesalahan pada server. gagal update data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    protected function collectData(Request $request)
    {
        $data = $request->all();

        $collectedData = [];

        if (isset($data['name'])) {
            $collectedData['name'] = $data['name'];
        }

        if (isset($data['description'])) {
            $collectedData['description'] = $data['description'];
        }

        if (isset($data['price'])) {
            $collectedData['price'] = $data['price'];
        }

        if (isset($data['image'])) {
            // Simpan upload image
            $pathFile = $request->file('image')->store('public');
            $collectedData['image'] = $pathFile;
        }

        if (isset($data['category_id'])) {
            // Check category_id
            $checkCategoryId = ModelCategories::find($data['category_id']);

            if (!$checkCategoryId) {
                return response()->json([
                    'message' => '"category_id" tidak tersedia'
                ], 404);
            }

            $collectedData['category_id'] = $data['category_id'];
        }

        if (isset($data['expired_at'])) {
            $collectedData['expired_at'] = $data['expired_at'];
        }

        return $collectedData;
    }
}
