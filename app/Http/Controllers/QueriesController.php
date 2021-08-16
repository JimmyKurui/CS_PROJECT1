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
        $productArray = Pharmacy::all();
        $key= 'name';
        $results = array();
        // $count= count($productArray);
        foreach ($productArray as $product) {
            $res = $product->products;
            foreach($product as $item)
            {
                dd($item);
            }
            # code..
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
