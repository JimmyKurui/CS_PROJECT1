<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show (User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.show', compact('user'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function store()
    {
        $data = request()->validate([
            'age' => ['required', 'integer', 'min:10', 'max:100'],
            'sex' => ['required', 'string', 'max:6'],
            'employed' => ['required', 'boolean'],
            'conditions' => ['required', 'string', 'max:255'],
          ]);

        auth()->user()->profile()->create($data);
        return redirect('/profile/'.auth()->user()->id);
    }

    public function update()
    {
        $data = request()->validate([
            'age' => ['required', 'integer', 'min:10', 'max:100'],
            'sex' => ['required', 'string', 'max:6'],
            'employed' => ['required', 'boolean'],
            'conditions' => ['required', 'string', 'max:255'],
          ]);

        auth()->user()->profile()->update($data);
        return redirect('/profile/'.auth()->user()->id);
    }

    public function destroy(User $user)
    {
        $user->profile()->delete();
        return redirect('/home');
    }

}
