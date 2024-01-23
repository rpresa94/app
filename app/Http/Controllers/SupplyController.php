<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = Supply::all();
        return response()->json($supplies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    public function show(string $id)
    {
        $supply = Supply::findOrFail($id);
        return response()->json($supply);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supply = Supply::findOrFail($id);

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
    public function destroy(string $id)
    {
        Supply::destroy($id);
        return response()->json(null, 204);
    }
}
