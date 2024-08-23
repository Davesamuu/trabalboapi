<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocaleModel;
use Illuminate\Http\JsonResponse;

class LocaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locales = LocaleModel::all();
        return response()->json($locales);
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
            'street' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'number' => 'required|integer',
            'CEP' => 'required|string|max:8',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $locale = LocaleModel::create($validatedData);
        return response()->json($locale, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $locale = LocaleModel::find($id);
        if (!$locale) {
            return response()->json(['message' => 'Locale not found'], 404);
        }
        return response()->json($locale);
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
        $locale = LocaleModel::find($id);
        if (!$locale) {
            return response()->json(['message' => 'Locale not found'], 404);
        }

        $validatedData = $request->validate([
            'street' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'number' => 'required|integer',
            'CEP' => 'required|string|max:8',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $locale->update($validatedData);
        return response()->json($locale, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $locale = LocaleModel::find($id);
        if (!$locale) {
            return response()->json(['message' => 'Locale not found'], 404);
        }

        $locale->delete();

        return response()->json(['message' => 'Locale deleted successfully'], 200);
    }
}
