<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Lesson::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:lessons',
            'group_id' => 'required|integer|exists:groups,id',
            'date' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'type' => 'required|enum|theory, practical',
        ]);

        $lesson = Lesson::query()->create($validated);

        return response()->json([
            'message' => 'Lesson created successfully!',
            'status' => 'success',
            'data' => $lesson
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $lesson = Lesson::query()->findOrFail($id);

        if (!$lesson) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lesson not found!'
            ], 404);
        }

        return response()->json([
            'message' => 'Lesson retrieved successfully!',
            'status' => 'success',
            'data' => $lesson
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $lesson = Lesson::query()->findOrFail($id);

        if (!$lesson) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lesson not found!'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'group_id' => 'required|integer|exists:groups,id',
            'date' => 'required|date|date_format:Y-m-d|before_or_equal:today',
            'type' => 'required|enum|theory, practical',
        ]);

        $lesson->update($validated);
        return response()->json([
            'message' => 'Lesson updated successfully!',
            'status' => 'success',
            'data' => $lesson
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $lesson = Lesson::query()->findOrFail($id);
        if (!$lesson) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lesson not found!'
            ], 404);
        }

        $lesson->delete();
        return response()->json([
            'message' => 'Lesson deleted successfully!',
            'status' => 'success',
            'data' => $lesson
        ]);
    }
}
