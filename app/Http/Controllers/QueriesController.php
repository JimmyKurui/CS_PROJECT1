<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Product;
use GrahamCampbell\ResultType\Result;
use Hamcrest\Arrays\IsArray;
use Hamcrest\Core\IsTypeOf;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class QueriesController extends Controller
{
    public function show($search)
    {
        $post = request('search');
        $pharmacies = Pharmacy::all();
        $results = array();
        $resultPharmacy = array();
        // $count= count($productArray);
        foreach ($pharmacies as $pharmacy) {
            foreach($pharmacy->products as $product) {
                if ($post or $search == $product->name) {
                    //Count rows where product->name = search
                    $count ++;
                    $resultPharmacy[] = Pharmacy::find($product->pharmacy_id);
                    $results[] = $product;
                }
            }
        }
        
        if ($search) {
            $userData['data'] = $resultPharmacy;
            $userData= json_encode($userData);
            exit;
        }
         
        return view('queries.show', ['results' => $results, 'resultPharmacy' => $resultPharmacy,]);
    } 
    
    public function getUsers($search = 'Panadol'){

        
        
        if ($search) {
            $userData['data'] = $resultPharmacy;
            $userData= json_encode($userData);
            exit;
     }
}
