<?php

namespace App\Http\Controllers;

use App\Models\CenterSocialNetwork;
use Illuminate\Http\Request;

class CenterSocialNetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => CenterSocialNetwork::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'center_id' => 'required|integer|exists:centers,id',
            'social_network_id' => 'required|integer|exists:social_networks,id',
            'username' => 'required|string|max:255',
        ]);

        $centerSocialNetwork = CenterSocialNetwork::query()->create($validatedData);

        return response()->json([
            'message' => 'Center Social Network created successfully!',
            'status' => 'success',
            'data' => $centerSocialNetwork
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): \Illuminate\Http\JsonResponse
    {
        $centerSocialNetwork = CenterSocialNetwork::query()->find($id);

        if (!$centerSocialNetwork) {
            return response()->json([
                'message' => 'Center Social Network not found!',
                'status' => 'error',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $centerSocialNetwork
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $centerSocialNetwork = CenterSocialNetwork::query()->find($id);

        if (!$centerSocialNetwork) {
            return response()->json([
                'message' => 'Center Social Network not found!',
                'status' => 'error',
            ], 404);
        }

        $validatedData = $request->validate([
            'center_id' => 'required|integer|exists:centers,id',
            'social_network_id' => 'required|integer|exists:social_networks,id',
            'username' => 'required|string|max:255',
        ]);

        $centerSocialNetwork->update($validatedData);

        return response()->json([
            'message' => 'Center Social Network updated successfully!',
            'status' => 'success',
            'data' => $centerSocialNetwork
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $centerSocialNetwork = CenterSocialNetwork::query()->find($id);

        if (!$centerSocialNetwork) {
            return response()->json([
                'message' => 'Center Social Network not found!',
                'status' => 'error',
            ], 404);
        }

        $centerSocialNetwork->delete();

        return response()->json([
            'message' => 'Center Social Network deleted successfully!',
            'status' => 'success',
        ]);
    }
}
