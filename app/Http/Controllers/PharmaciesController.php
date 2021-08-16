<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmaciesController extends Controller
{
    public function index()
    {
        return view('pharmacy-home');
    }

    public function create()
    {
        return view('pharmacies.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'reg_no' => ['required', 'string', 'max:255', 'unique:pharmacies'],
            'telephone' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'location' => ['required', 'string'],
            // 'image' => ['required', 'image'],  // 'required | image' 
          ]);
        // $imagePath = request('image')->store('licenses', 'public'); 

        auth()->user()->pharmacy()->create($data);
        return redirect('/pharmacy/'.auth()->user()->pharmacy->id);

    }

    public function show (Pharmacy $pharmacy)
    {
        $this->authorize('update', auth()->user()->pharmacy);

        return view('pharmacies.show', compact('pharmacy'));
    }

    public function edit(Pharmacy $pharmacy)
    {
        $this->authorize('update', auth()->user()->pharmacy);

        return view('pharmacies.edit', compact('pharmacy'));
    }

    public function update(Pharmacy $pharmacy)
    {
        $this->authorize('update', auth()->user()->pharmacy);

        $data = request()->validate([
            'telephone' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'location' => ['required', 'string'],
          ]);
          
        auth()->user()->$pharmacy->update($data);
        return redirect('/pharmacy/'.$pharmacy->id);   
    }

    public function destroy(Pharmacy $pharmacy)
    {
        $pharmacy->delete();
        return redirect('/home');
    }
}
