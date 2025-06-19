<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\Product;
use GrahamCampbell\ResultType\Result;
use Hamcrest\Arrays\IsArray;
use Hamcrest\Core\IsTypeOf;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Symfony\Component\Console\Input\Input;

class QueriesController extends Controller
{
    public function show(Request $request)
    {
        $validatedData = $request->validate([
            'search' => 'required|string|max:255',
        ]);
        $search = str_replace('_', '', strip_tags(trim($validatedData['search'])));
        $escapedSearch = addcslashes($search, '%');

        $products = Product::with(['pharmacies:name,telephone'])
            ->where('name', 'LIKE', '%' . $escapedSearch . '%')
            ->get();

        return view('queries.show', compact('products'));
    }
}
