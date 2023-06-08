<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class indexPropertyController extends Controller
{
    //
    public function index(SearchPropertiesRequest $request)
    {
        $query = Property::query();
        if ($request->has('price')) {
            $query = $query->where('price', '<=', $request->input('price'));
        }
        if ($request->has('surface')) {
            $query = $query->where('surface', '>=', $request->input('surface'));
        }
        if ($request->has('rooms')) {
            $query = $query->where('rooms', '>=', $request->input('rooms'));
        }
        if ($request->has('title')) {
            $query = $query->where('title', 'like', "%{$request->input('title')}%");
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {
    }
}
