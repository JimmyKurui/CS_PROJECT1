@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
    <div class="wrapper">
        <div class="row justify-content-center text-center">
            <div class="col-12 p-5">
                <h1>Type a product below</h1>
            </div>
            <div class="col-6 pb-4">
                <form id="query-form" method="POST" action="{{ route('query') }}" class="form-inline">
                    @csrf

                    <div class="row g-1">
                        <div class="col-auto flex-grow-1">
                            <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" required autocomplete="search" autofocus>
                        </div>

                        @error('search')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button class="col-auto btn primary-btn" >Search</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection