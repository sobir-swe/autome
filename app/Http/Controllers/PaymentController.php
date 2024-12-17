<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => Payment::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'payment_date' => 'required|date|date_format:Y-m-d|after_or_equal:today|before_or_equal:now',
            'price' => 'required|integer|between:1,1000000',
        ]);

        $payment = Payment::query()->create([$validated]);

        return response()->json([
            'message' => 'Successfully created payment!',
            'status' => 'success',
            'data' => $payment
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $payment = Payment::query()->findOrFail($id);

        if (!$payment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment not found!'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $payment
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $payment = Payment::query()->findOrFail($id);

        if (!$payment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment not found!'
            ], 404);
        }

        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'payment_date' => 'required|date|date_format:Y-m-d|after_or_equal:today|before_or_equal:now',
            'price' => 'required|integer|between:1,1000000',
        ]);

        $payment->update($validated);

        return response()->json([
            'message' => 'Successfully updated payment!',
            'status' => 'success',
            'data' => $payment
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $payment = Payment::query()->findOrFail($id);
        if (!$payment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment not found!'
            ], 404);
        }

        $payment->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully deleted payment!'
        ]);
    }
}
