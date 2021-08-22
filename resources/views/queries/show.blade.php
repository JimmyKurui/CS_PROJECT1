@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper-pharmacy-other">
        <div class="row justify-content-center text-center">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false">Home</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="true">Contact</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Category</th>
                                <th scope="col">Form</th>
                                <th scope="col">Pharmacy</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $result)
                            <tr>
                                <td scope="row">No.</td>
                                <td>{{ $result->name }}</td>
                                <td>{{ $result->category }}</td>
                                <td>{{ $result->form }}</td>
                                <td>{{ $result->pharmacy_id }}</td>
                                <td>{{ $result->price }}</td>
                                <td>Coming Soon</td>
                                <td><a href="#">{{ $resultPharmacy->telephone }}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="map1"><p>Mapdsds details</p></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script async  
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Yid3pH1XBDlieAoYyzy3-PT2l-ZAt00&callback=initMap">
</script>
@endsection