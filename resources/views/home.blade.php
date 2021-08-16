@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper">
        <div class="row justify-content-center text-center">
            <div class="col-12 p-5"><h1>Type a product below</h1></div>
            <div class="col-10 offset-2 pb-4">
                <form method="POST" action="/query">
                     @csrf
    
                    <div class="form-group row">
                            <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" required autocomplete="search" autofocus>
    
                            @error('search')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div>
                                <button class="btn btn-primary">Search</button> 
                            </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

