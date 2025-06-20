@extends('layouts.app')

@section('title', 'Search')
@section('content')
<div class="container-fluid container-lg">
    <div class="wrapper pharmacy other">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="query-table-tab" data-bs-toggle="tab" data-bs-target="#query-table" type="button" role="tab" aria-controls="query-table" aria-selected="true">Table</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="query-map-tab" data-bs-toggle="tab" data-bs-target="#query-map" type="button" role="tab" aria-controls="query-map" aria-selected="false">Map</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="query-table" role="tabpanel" aria-labelledby="query-table-tab">
                        @include('queries.partials.table')
                    </div>
                    <div class="tab-pane fade show active" id="query-map" role="tabpanel" aria-labelledby="query-map-tab">
                        @include('queries.partials.map')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection