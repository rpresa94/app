<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FarmResponsibility;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class FarmResponsibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $responsibilities = FarmResponsibility::all();
        return response()->json($responsibilities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'personnel_id' => 'required|exists:personnels,id',
        ]);

        $responsibility = FarmResponsibility::create($validatedData);
        return response()->json($responsibility, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmResponsibility $farmResponsibility): JsonResponse
    {
        return response()->json($farmResponsibility);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmResponsibility $farmResponsibility): JsonResponse
    {

        $validatedData = $request->validate([
            'type' => 'string|max:255',
            'description' => 'string',
            'personnel_id' => 'exists:personnels,id',
        ]);

        $farmResponsibility->update($validatedData);
        return response()->json($farmResponsibility);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmResponsibility $farmResponsibility): JsonResponse
    {
        $farmResponsibility->delete();
        return response()->json(null, 204);
    }
}
