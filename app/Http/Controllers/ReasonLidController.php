<?php

namespace App\Http\Controllers;

use App\Models\ReasonLid;
use Illuminate\Http\Request;

class ReasonLidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => ReasonLid::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        $reasonLid = ReasonLid::query()->create($validatedData);

        return response()->json([
            'message' => 'Successfully created reasonLid!',
            'status' => 'success',
            'data' => $reasonLid
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $reasonLid = ReasonLid::query()->find($id);

        if (!$reasonLid) {
            return response()->json([
                'message' => 'ReasonLid not found!',
                'status' => 'error'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $reasonLid
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $reasonLid = ReasonLid::query()->find($id);

        if (!$reasonLid) {
            return response()->json([
                'message' => 'ReasonLid not found!',
                'status' => 'error'
            ], 404);
        }

        $validatedData = $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        $reasonLid->update($validatedData);

        return response()->json([
            'message' => 'Successfully updated reasonLid!',
            'status' => 'success',
            'data' => $reasonLid
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $reasonLid = ReasonLid::query()->find($id);

        if (!$reasonLid) {
            return response()->json([
                'message' => 'ReasonLid not found!',
                'status' => 'error'
            ], 404);
        }

        $reasonLid->delete();

        return response()->json([
            'message' => 'Successfully deleted reasonLid!',
            'status' => 'success'
        ]);
    }
}
