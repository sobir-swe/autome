<?php

namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => SocialNetwork::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|in:facebook,twitter,linkedin,google,youtube,instagram,telegram',
        ]);

        $social_network = SocialNetwork::query()->create($validatedData);

        return response()->json([
            'message' => 'Social network created successfully!',
            'status' => 'success',
            'data' => $social_network
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $socialNetwork = SocialNetwork::query()->find($id);

        if (!$socialNetwork) {
            return response()->json([
                'status' => 'error',
                'message' => 'Social network not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Social network retrieved successfully!',
            'status' => 'success',
            'data' => $socialNetwork
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $socialNetwork = SocialNetwork::query()->find($id);

        if (!$socialNetwork) {
            return response()->json([
                'message' => 'Social network not found',
                'status' => 'error',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|in:facebook,twitter,linkedin,google,youtube,instagram',
        ]);

        $socialNetwork->update($validatedData);
        return response()->json([
            'message' => 'Social network updated successfully!',
            'status' => 'success',
            'data' => $socialNetwork
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $socialNetwork = SocialNetwork::query()->find($id);

        if (!$socialNetwork) {
            return response()->json([
                'message' => 'Social network not found',
                'status' => 'error',
            ], 404);
        }

        $socialNetwork->delete();
        return response()->json([
            'message' => 'Social network deleted successfully!',
            'status' => 'success',
        ]);
    }
}
