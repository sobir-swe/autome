<?php

namespace App\Http\Controllers;

use App\Models\StudentResponsible;
use Illuminate\Http\Request;

class StudentResponsibleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => StudentResponsible::all()
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
            'student_id' => 'required|integer|exists:students,id',
            'relation_type' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'first_number' => 'required|string|max:255',
            'second_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructors,email',
        ]);

        $responsible = StudentResponsible::query()->create($validated);

        return response()->json([
            'message' => 'StudentResponsible created successfully!',
            'status' => 'success',
            'data' => $responsible
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $responsible = StudentResponsible::query()->findOrFail($id);

        if (!$responsible) {
            return response()->json([
                'status' => 'error',
                'message' => 'StudentResponsible not found!'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $responsible
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $responsible = StudentResponsible::query()->findOrFail($id);

        if (!$responsible) {
            return response()->json([
                'status' => 'error',
                'message' => 'StudentResponsible not found!'
            ], 404);
        }
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'student_id' => 'required|integer|exists:students,id',
            'relation_type' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
            'first_number' => 'required|string|max:255',
            'second_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructors,email',
        ]);

        $responsible->update($validated);
        return response()->json([
            'message' => 'StudentResponsible updated successfully!',
            'status' => 'success',
            'data' => $responsible
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $responsible = StudentResponsible::query()->findOrFail($id);

        if (!$responsible) {
            return response()->json([
                'status' => 'error',
                'message' => 'StudentResponsible not found!'
            ], 404);
        }
        $responsible->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'StudentResponsible deleted successfully!'
        ]);
    }
}
