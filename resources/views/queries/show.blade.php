@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper-pharmacy-other">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item p-3" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Table</a>
                    </li>
                    <li class="nav-item p-3" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Map</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-striped table-hover" id="results-tabl">
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
                                    <td></td>
                                    <td>Coming Soon</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <table id="results-table">
                            <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Product</th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div id="map1">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9Yid3pH1XBDlieAoYyzy3-PT2l-ZAt00&callback=initMap">
</script>
<script type="text/javascript">
    
</script>

@endsection