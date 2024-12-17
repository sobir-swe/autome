<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Student::all()
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

        $student = Student::query()->create($validated);

        return response()->json([
            'message' => 'Student created successfully!',
            'status' => 'success',
            'data' => $student
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $student = Student::query()->findOrFail($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found!'
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'data' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $student = Student::query()->findOrFail($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found!'
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

        $student->update($validated);
        return response()->json([
            'message' => 'Student updated successfully!',
            'status' => 'success',
            'data' => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $student = Student::query()->findOrFail($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found!'
            ], 404);
        }
        $student->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Student deleted successfully!'
        ]);
    }
}
