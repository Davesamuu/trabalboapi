<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainerModel;
use Illuminate\Http\JsonResponse;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = TrainerModel::all();
        return response()->json($trainers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'CPF' => 'required|string|max:11|unique:trainer,CPF',
            'RG' => 'required|string|max:9|unique:trainer,RG',
        ]);

        $trainer = TrainerModel::create($validatedData);
        return response()->json($trainer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trainer = TrainerModel::find($id);
        if (!$trainer) {
            return response()->json(['message' => 'Trainer not found'], 404);
        }
        return response()->json($trainer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trainer = TrainerModel::find($id);
        if (!$trainer) {
            return response()->json(['message' => 'Trainer not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'CPF' => 'required|string|max:11|unique:trainer,CPF,' . $id,
            'RG' => 'required|string|max:9|unique:trainer,RG,' . $id,
        ]);

        $trainer->update($validatedData);
        return response()->json($trainer, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trainer = TrainerModel::find($id);
        if (!$trainer) {
            return response()->json(['message' => 'Trainer not found'], 404);
        }

        $trainer->delete();

        return response()->json(['message' => 'Trainer deleted successfully'], 200);
    }
}
