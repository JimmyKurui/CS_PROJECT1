@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="w-100 py-5 heading">
            <h1>Profile Dashboard</h1>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Profile') }}</div>

                <div class="card-body">
                    <dl class="row border">
                        <dt class="col-sm-3">Full Name</dt>
                        <dd class="col-sm-9">{{ $user->name }}</dd>
                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">{{ $user->email }}</dd>
                        <dt class="col-sm-3">Telephone</dt>
                        <dd class="col-sm-9">{{ $user->telephone }}</dd>
                        <dt class="col-sm-3">Age</dt>
                        <dd class="col-sm-9">{{ $user->profile->age }}</dd>
                        <dt class="col-sm-3">Sex</dt>
                        <dd class="col-sm-9">{{ $user->profile->sex }}</dd>
                        <dt class="col-sm-3">Health Conditions</dt>
                        <dd class="col-sm-9">{{ $user->profile->conditions }}</dd>
                        <dt class="col-sm-3">Employed</dt>
                        <dd class="col-sm-9">{{ $user->profile->employed }}</dd>
                    </dl>
                </div>
                <div class="d-flex">
                    <a href="/profile/{{ auth()->user()->id }}/edit" class="btn btn-primary mr-4">Edit Profile</a>
                    <form method="POST" action="/profile/{{ $user->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="confirm('This will remove you as a Medical user, are you sure?')" name="delete-profile">Delete Profile</button>
                        <!-- <button class="btn bg-dark" onclick="confirm('Do you want to delete your profile?')">Delete Profile</button> -->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection