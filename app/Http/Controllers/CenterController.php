<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Center::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|',
            'type_id' => 'required|integer|exists:center_types,id',
            'address' => 'required|string|max:255|',
            'phone_number' => 'required|string|max:255|',
        ]);

        $center = Center::query()->create($validatedData);

        return response()->json([
            'message' => 'Center created successfully!',
            'status' => 'success',
            'data' => $center
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $center = Center::query()->find($id);

        if (!$center) {
            return response()->json([
                'message' => 'Center not found!',
                'status' => 'error',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $center
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $center = Center::query()->find($id);

        if (!$center) {
            return response()->json([
                'message' => 'Center not found!',
                'status' => 'error',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|',
            'type_id' => 'required|integer|exists:center_types,id',
            'address' => 'required|string|max:255|',
            'phone_number' => 'required|string|max:255|',
        ]);

        $center->update($validatedData);

        return response()->json([
            'message' => 'Center updated successfully!',
            'status' => 'success',
            'data' => $center
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $center = Center::query()->find($id);
        if (!$center) {
            return response()->json([
                'message' => 'Center not found!',
                'status' => 'error',
            ], 404);
        }

        $center->delete();

        return response()->json([
            'message' => 'Center deleted successfully!',
            'status' => 'success',
        ]);
    }
}
