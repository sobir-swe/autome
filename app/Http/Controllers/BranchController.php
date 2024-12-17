<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Branch::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:branches|max:255',
            'center_id' => 'required|exists:centers,id',
            'address' => 'required|unique:branches|max:255',
            'call_number' => 'required|unique:branches|max:255',
        ]);

        $branch = Branch::query()->create([$validated]);

        return response()->json([
            'message' => 'Branch created successfully!',
            'status' => 'success',
            'data' => $branch
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $branch = Branch::query()->findOrFail($id);

        if (!$branch) {
            return response()->json([
                'status' => 'error',
                'message' => 'Branch not found!'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $branch
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $branch = Branch::query()->findOrFail($id);

        if (!$branch) {
            return response()->json([
                'status' => 'error',
                'message' => 'Branch not found!'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|unique:branches|max:255',
            'center_id' => 'required|exists:centers,id',
            'address' => 'required|unique:branches|max:255',
            'call_number' => 'required|unique:branches|max:255',
        ]);

        $branch->update([$validated]);
        return response()->json([
            'message' => 'Branch updated successfully!',
            'status' => 'success',
            'data' => $branch
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $branch = Branch::query()->findOrFail($id);

        if (!$branch) {
            return response()->json([
                'status' => 'error',
                'message' => 'Branch not found!'
            ], 404);
        }

        $branch->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Branch deleted successfully!'
        ]);
    }
}
