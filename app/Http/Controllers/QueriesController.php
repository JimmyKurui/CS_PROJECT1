<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\InputSanitizer;
use App\Models\Pharmacy;

class QueriesController extends Controller
{
    public function show(Request $request)
    {
        $validatedData = $request->validate([
            'search' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);
        $search = InputSanitizer::sanitizeSearchQuery($validatedData['search']);
        $longitude = InputSanitizer::sanitizeLongitude($validatedData['longitude']);
        $latitude = InputSanitizer::sanitizeLatitude($validatedData['latitude']);

        $radiusMeters = config('constants.PHARMACY_RADIUS_METERS');
        $radiusExtMeters = config('constants.PHARMACY_RADIUS_EXT_METERS');
        $radiusMaxMeters = config('constants.PHARMACY_RADIUS_MAX_METERS');
        $products = collect();

        for($radius = $radiusMeters; $radius < $radiusMaxMeters; $radius += $radiusExtMeters) {
            $pharmacies = Pharmacy::distanceMeters($latitude, $longitude, $radius)->get();
            if ($pharmacies->isEmpty()) {
                continue;
            }
            $pharmacyIds = $pharmacies->pluck('id')->toArray();
            $products = Product::whereHas('pharmacies', function($query) use ($pharmacyIds) {
                $query->whereIn('pharmacy_id', $pharmacyIds);
            })
            ->with('pharmacies', function($query) use ($pharmacyIds) {
                $query->whereIn('pharmacy_id', $pharmacyIds);
            })
            ->where('name', 'LIKE', '%' . $search . '%')
            ->get();
            if ($products->isEmpty()) {
                continue;
            }
            break;
        }
        return view('queries.show', compact('products', 'radius'));
    }
}