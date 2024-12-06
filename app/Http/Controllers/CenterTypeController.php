<?php

namespace App\Http\Controllers;

use App\Models\CenterType;
use Illuminate\Http\Request;

class CenterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => CenterType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $statusStatus = CenterType::query()->create($validatedData);

        return response()->json([
            'message' => 'Successfully created statusStatus!',
            'status' => 'success',
            'data' => $statusStatus
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $statusStatus = CenterType::query()->find($id);

        if (!$statusStatus) {
            return response()->json([
                'message' => 'StatusStatus not found!',
                'status' => 'error'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $statusStatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $center_type = CenterType::query()->find($id);

        if (!$center_type) {
            return response()->json([
                'message' => 'CenterType not found!',
                'status' => 'error'
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $center_type->update($validatedData);

        return response()->json([
            'message' => 'Successfully updated CenterType!',
            'status' => 'success',
            'data' => $center_type
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $center_type = CenterType::query()->find($id);

        if (!$center_type) {
            return response()->json([
                'message' => 'CenterType not found!',
                'status' => 'error'
            ], 404);
        }

        $center_type->delete();

        return response()->json([
            'message' => 'Successfully deleted CenterType!',
            'status' => 'success'
        ]);
    }
}
