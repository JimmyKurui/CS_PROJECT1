<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show (User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'age' => ['required', 'integer', 'min:10', 'max:100'],
            'sex' => ['required', 'string', 'max:6'],
            'employed' => 'required',
            'conditions' => ['required', 'string', 'max:255'],
          ]);
        // $imagePath = request('image')->store('licenses', 'public'); 

        auth()->user()->profile()->create($data);
        return redirect('/profile/'.auth()->user()->id);

    }
}
