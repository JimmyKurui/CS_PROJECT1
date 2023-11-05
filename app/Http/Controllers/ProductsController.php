<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pharmacy = auth()->user()->pharmacy;
        // $countArray = array($products->count() % )
        return view('products.index', ['pharmacy'=> $pharmacy]);
    }

    public function create() 
    {
        return view('products.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'form' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'max:255'],
          ]);

        auth()->user()->pharmacy->products()->create($data);
        return redirect('/product');

    }

    public function destroy (Product $product) {
        $product->delete();
        return redirect('/product');
    }
    
}
