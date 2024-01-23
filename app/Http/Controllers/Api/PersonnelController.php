<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $personnel = Personnel::all();
        return response()->json($personnel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        // Create the personnel
        $personnel = Personnel::create($validatedData);
        return response()->json($personnel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel): JsonResponse
    {
        return response()->json($personnel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnel $personnel): JsonResponse
    {

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'role' => 'string|max:255',
        ]);

        // Update the personnel
        $personnel->update($validatedData);
        return response()->json($personnel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel): JsonResponse
    {
        $personnel->delete();
        return response()->json(null, 204);
    }
}
