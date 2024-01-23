<?php

namespace App\Http\Controllers;

use App\Models\FarmResponsibility;
use Illuminate\Http\Request;

class FarmResponsibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsibilities = FarmResponsibility::all();
        return response()->json($responsibilities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    public function show(string $id)
    {
        $responsibility = FarmResponsibility::findOrFail($id);
        return response()->json($responsibility);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $responsibility = FarmResponsibility::findOrFail($id);

        $validatedData = $request->validate([
            'type' => 'string|max:255',
            'description' => 'string',
            'personnel_id' => 'exists:personnels,id',
        ]);

        $responsibility->update($validatedData);
        return response()->json($responsibility);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FarmResponsibility::destroy($id);
        return response()->json(null, 204);
    }
}
