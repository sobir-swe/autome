<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Group::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|unique:groups|max:255|string',
            'branch_id' => 'required|exists:branches,id',
            'stage' => 'required|max:255|string|unique:groups|max:255|string',
            'lesson_continuous' => 'required|max:255|string|unique:groups|max:255|string',
            'weekday' => 'required|max:255|string|unique:groups|max:255|string',
        ]);

        $group = Group::query()->create([$validated]);

        return response()->json([
            'message' => 'Group created successfully!',
            'status' => 'success',
            'data' => $group
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $group = Group::query()->findOrFail($id);
        if (!$group) {
            return response()->json([
                'status' => 'error',
                'message' => 'Group not found!'
            ], 404);
        }

        return response()->json([
            'message' => 'Group retrieved successfully!',
            'status' => 'success',
            'data' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $group = Group::query()->findOrFail($id);
        if (!$group) {
            return response()->json([
                'status' => 'error',
                'message' => 'Group not found!'
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|unique:groups|max:255|string',
            'branch_id' => 'required|exists:branches,id',
            'stage' => 'required|max:255|string|unique:groups|max:255|string',
            'lesson_continuous' => 'required|max:255|string|unique:groups|max:255|string',
            'weekday' => 'required|max:255|string|unique:groups|max:255|string',
        ]);

        $group->update([$validated]);
        return response()->json([
            'message' => 'Group updated successfully!',
            'status' => 'success',
            'data' => $group
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $group = Group::query()->findOrFail($id);
        if (!$group) {
            return response()->json([
                'status' => 'error',
                'message' => 'Group not found!'
            ], 404);
        }

        $group->delete();
        return response()->json([
            'message' => 'Group deleted successfully!',
            'status' => 'success',
            'data' => $group
        ]);
    }
}
