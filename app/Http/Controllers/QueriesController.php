<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;

class QueriesController extends Controller
{
    public function show()
    {
        $search = request('search');
        $productArray = Product::all();
        $results = array();
        dd($productArray[0]->pharmacy->name);
        // $count= count($productArray);
        foreach ($productArray as $product)  
        {
            if ($search == $product->name)
            {
                $results[] = $product;
            }
        }
        return view('queries.show', [
            'results' => $results
        ]);
    }  
}
