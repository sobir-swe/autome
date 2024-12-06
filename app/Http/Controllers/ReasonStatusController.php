<?php

namespace App\Http\Controllers;

use App\Models\ReasonStatus;
use Illuminate\Http\Request;

class ReasonStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => ReasonStatus::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $statusStatus = ReasonStatus::query()->create($validatedData);

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
        $statusStatus = ReasonStatus::query()->find($id);

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
        $reasonStatus = ReasonStatus::query()->find($id);

        if (!$reasonStatus) {
            return response()->json([
                'message' => 'ReasonStatus not found!',
                'status' => 'error'
            ], 404);
        }

        $validatedData = $request->validate([
            'status' => 'required|string|max:255',
        ]);

        $reasonStatus->update($validatedData);

        return response()->json([
            'message' => 'Successfully updated reasonStatus!',
            'status' => 'success',
            'data' => $reasonStatus
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $reasonStatus = ReasonStatus::query()->find($id);

        if (!$reasonStatus) {
            return response()->json([
                'message' => 'ReasonStatus not found!',
                'status' => 'error'
            ], 404);
        }

        $reasonStatus->delete();

        return response()->json([
            'message' => 'Successfully deleted reasonStatus!',
            'status' => 'success'
        ]);
    }
}
