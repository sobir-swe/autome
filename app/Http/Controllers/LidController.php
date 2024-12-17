<?php

namespace App\Http\Controllers;

use App\Models\Lid;
use Illuminate\Http\Request;

class LidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Lid::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'lid_stage' => 'required|string|max:100',
            'test_date' => 'nullable|date',
            'lid_status_id' => 'required|integer|exists:lid_statuses,id',
            'cancel_reason_id' => 'nullable|integer|exists:reason_lids,id',
        ]);

        $lid = Lid::query()->create($validatedData);

        return response()->json([
            'message' => 'Successfully created Lid!',
            'status' => 'success',
            'data' => $lid
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $lid = Lid::query()->find($id);

        if (!$lid) {
            return response()->json([
                'message' => 'Lid not found!',
                'status' => 'error'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $lid
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $lid = Lid::query()->find($id);

        if (!$lid) {
            return response()->json([
                'message' => 'Lid not found!',
                'status' => 'error'
            ], 404);
        }

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'lid_stage' => 'required|string|max:100',
            'test_date' => 'nullable|date',
            'lid_status_id' => 'required|integer|exists:lid_statuses,id',
            'cancel_reason_id' => 'nullable|integer|exists:reason_lids,id',
        ]);

        $lid->update($validatedData);

        return response()->json([
            'message' => 'Successfully updated Lid!',
            'status' => 'success',
            'data' => $lid
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $lid = Lid::query()->find($id);

        if (!$lid) {
            return response()->json([
                'message' => 'Lid not found!',
                'status' => 'error'
            ], 404);
        }

        $lid->delete();

        return response()->json([
            'message' => 'Successfully deleted Lid!',
            'status' => 'success'
        ]);
    }
}
