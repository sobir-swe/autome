<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Instructor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'branch_id' => 'required|integer|exists:branches,id',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructors,email',
        ]);

        $instructor = Instructor::query()->create($validated);

        return response()->json([
            'message' => 'Instructor created successfully!',
            'status' => 'success',
            'data' => $instructor
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $instructor = Instructor::query()->findOrFail($id);

        if (!$instructor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found!'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $instructor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $instructor = Instructor::query()->findOrFail($id);

        if (!$instructor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found!'
            ], 404);
        }
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'branch_id' => 'required|integer|exists:branches,id',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructors,email',
        ]);

        $instructor->update($validated);
        return response()->json([
            'message' => 'Instructor updated successfully!',
            'status' => 'success',
            'data' => $instructor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $instructor = Instructor::query()->findOrFail($id);

        if (!$instructor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructor not found!'
            ], 404);
        }
        $instructor->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Instructor deleted successfully!'
        ]);
    }
}
