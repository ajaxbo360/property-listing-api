<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Resources\PropertiesResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PropertiesResource::collection(Property::all());
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $request->validated();


        $property = Property::create([
            'broker_id' => $request->broker_id,
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'listing_type' => $request->listing_type,
            'build_year' => $request->build_year
        ]);

        $property->characteristic()->create([
            'propert_id' => $property->id,
            'price' => $request->price,
            'sqft' => $request->sqft,
            'price_sqft' => $request->price_sqft,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'property_type' => $request->property_type,
            'status' => $request->status
        ]);

        return new PropertiesResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return new PropertiesResource($property);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $property->update($request->only([
            'broker_id',
            'description',
            'address',
            'city',
            'zip_code',
            'listing_type',
            'build_year'
        ]));

        $property->characteristic()->where('property_id', $property->id)->update($request->only([
            'price',
            'property_id',
            'sqft',
            'price_sqft',
            'bedrooms',
            'bathrooms',
            'property_type',
            'status'
        ]));
        return new PropertiesResource($property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response()->json([
            'success' => true,
            'message' => 'Property deleted successfully'
        ]);
    }
}
