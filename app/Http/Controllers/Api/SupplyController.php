<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supply;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $supplies = Supply::all();
        return response()->json($supplies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'description' => 'string',
        ]);

        $supply = Supply::create($validatedData);
        return response()->json($supply, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supply $supply): JsonResponse
    {
        return response()->json($supply);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supply $supply): JsonResponse
    {

        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'quantity' => 'integer',
            'description' => 'string',
        ]);

        $supply->update($validatedData);
        return response()->json($supply);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supply $supply): JsonResponse
    {
        $supply->delete();
        return response()->json(null, 204);
    }
}
