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
                        <button type="submit" class="col-auto btn primary-btn" >Search</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#query-form').on('submit', function(e) {
        e.preventDefault();
        let search = $('#search').val().trim();
        if (search.length < 1) {
            alert('Please enter a product name.');
            return;
        }
        navigator.geolocation.getCurrentPosition(function(position) {
            let lat = position.coords.latitude;
            let lng = position.coords.longitude;

            $('<input>').attr({
                type: 'hidden',
                name: 'latitude',
                value: lat
            }).appendTo('#query-form');

            $('<input>').attr({
                type: 'hidden',
                name: 'longitude',
                value: lng
            }).appendTo('#query-form');

            $('#query-form')[0].submit();
        }, function() {
            alert('Unable to retrieve your location. Please allow location access and try again.');
        });
    });
</script>
@endpush