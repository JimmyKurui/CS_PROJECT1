<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Product;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class QueriesController extends Controller
{
    public function show()
    {
        $search = request('search');
        $productArray = Product::all();
        $items = Pharmacy::all();
        $key= 'name';
        $results = array();
        // $count= count($productArray);
        foreach ($items as $item) {
            foreach ($productArray as $product) {
                if ($search == $product->name) {
                    ($results[] = $product->products);
                }
                # code..
            }
        }
       
            
            // if ($search == $product->products->name)
            // {
            //     dd($results[] = $product->products);
            // }
        
    

        return view('queries.show', [
            'results' => $results
        ]);
    }  
}
