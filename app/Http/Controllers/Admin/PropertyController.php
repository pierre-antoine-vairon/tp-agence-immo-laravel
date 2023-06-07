<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //va cherche la vu correspondante
        return view('admin.properties.index', [
            // classé par ordre décroissant
            'properties' => Property::orderBy('create_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retour de la Blade : /admin/property/create
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'price' => 100000,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Paris',
            'postal_code' => 75001,
            'sold' => false,
        ]);
        return view('admin.properties.form', [
            'property' => $property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        //
        $property = Property::create($request->validated());
        return to_route('admin.property.index')->with('success', 'Votre bien a été enregistré !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
        return view('admin.properties.form', [
            'property' => $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        //
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'Votre bien a été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Votre bien a été supprimé !');
    }
}
