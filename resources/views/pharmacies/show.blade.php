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
                        <ul class="list-unstyled list-inline">
                            <li><a href="/product">View Products</a></li>
                            <li><a href="/product/create">Add Products</li>
                            <li><a href="/product"></a>Update Products</li>
                            <li><a href="/statistics">Statistics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 justify-content-center ">
                <dl class="row border">
                   <dt class="col-sm-3">Business Name</dt>
                   <dd class="col-sm-9">{{ $pharmacy->name }}</dd>
                   <dt class="col-sm-3">Registration Number</dt>
                   <dd class="col-sm-9">{{ $pharmacy->reg_no }}</dd>
                   <dt class="col-sm-3">Email</dt>
                   <dd class="col-sm-9">{{ $pharmacy->email }}</dd>
                   <dt class="col-sm-3">Telephone</dt>
                   <dd class="col-sm-9">{{ $pharmacy->telephone }}</dd>
                   <dt class="col-sm-3">Geo-Tag</dt>
                   <dd class="col-sm-9">{{ $pharmacy->location }}</dd>
                </dl>
            
                <div class="d-flex w-50 py-3 justify-content-between">
                    <a href="/pharmacy/{{ $pharmacy->id }}/edit" class="btn btn-primary mr-3">Edit Pharmacy</a>
                    <form method="post" enctype="multipart/form-data" action="/pharmacy/{{ $pharmacy->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-secondary">Delete Pharmacy</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection