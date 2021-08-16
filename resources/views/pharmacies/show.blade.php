@extends('layouts.app')

@section('content')
<div class="pharmacy">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="w-100 py-5">
                <h1>Pharmacy Dashboard</h1>
            </div>

            <div class="d-flex w-50">
                <div class="col-md-8">
                        <div class="pb-3"><strong>{{ $pharmacy->name }}</strong></div>
                        <ul>
                            <li><a href="/product">View Products</a></li>
                            <li><a href="/product/create">Add Products</li>
                            <li><a href="/product"></a></li>
                            <li><a href="/statistics">Statistics</< /li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <a href="/pharmacy/{{ $pharmacy->user->id }}/edit">Edit Profile</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection