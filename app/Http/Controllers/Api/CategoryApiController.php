<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class CategoryApiController extends Controller
{
    /**
     * GET ALL CATEGORY
     */
    public function index()
    {
        try {

            $categories = Category::all();

            return response()->json([
                'message' => 'Data category berhasil diambil',
                'data' => $categories
            ], 200);

        } catch (\Throwable $e) {

            Log::error('Gagal mengambil category', [
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }

    /**
     * STORE CATEGORY
     */
    public function store(StoreCategoryRequest $request)
    {
        try {

            $validated = $request->validated();

            $category = Category::create($validated);

            return response()->json([
                'message' => 'Category berhasil ditambahkan',
                'data' => $category
            ], 201);

        } catch (\Throwable $e) {

            Log::error('Gagal menambah category', [
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }

    /**
     * SHOW CATEGORY
     */
    public function show(string $id)
    {
        try {

            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Category tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'message' => 'Detail category',
                'data' => $category
            ], 200);

        } catch (\Throwable $e) {

            Log::error('Gagal mengambil detail category', [
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }

    /**
     * UPDATE CATEGORY
     */
    public function update(StoreCategoryRequest $request, string $id)
    {
        try {

            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Category tidak ditemukan'
                ], 404);
            }

            $validated = $request->validated();

            $category->update($validated);

            return response()->json([
                'message' => 'Category berhasil diupdate',
                'data' => $category
            ], 200);

        } catch (\Throwable $e) {

            Log::error('Gagal update category', [
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }

    /**
     * DELETE CATEGORY
     */
    public function destroy(string $id)
    {
        try {

            $category = Category::find($id);

            if (!$category) {
                return response()->json([
                    'message' => 'Category tidak ditemukan'
                ], 404);
            }

            $category->delete();

            return response()->json([
                'message' => 'Category berhasil dihapus'
            ], 200);

        } catch (\Throwable $e) {

            Log::error('Gagal hapus category', [
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }
}