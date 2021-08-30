@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper">
        <div class="row justify-content-center text-center">
            <div class="col-12 p-5">
                <h1>Type a product below</h1>
            </div>
            <div class="col-10 offset-2 pb-4">
                <form id="query-form" method="POST" action="/query">
                    @csrf

                    <div class="form-group row">
                        <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" required autocomplete="search" autofocus>

                        @error('search')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div>
                            <button class="btn btn-primary"  onsubmit="/*function yourFunction(){ -->
                                     var action_src = $('search').val(); 
                                    var your_form= $('query-form').val(); 
                                    var urlLink='/query/'; 
                                    urlLink=urlLink + action_src; 
                                    your_form.action=urlLink; } */ ">
                            Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection