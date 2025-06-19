@extends('layouts.app')

@section('content')
<div class="container-fluid container-lg">
    <div class="wrapper pharmacy other">
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item p-3" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Table</a>
                    </li>
                    <li class="nav-item p-3" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" disabled>Map</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <caption>Total: {{ $products->count() }}</caption>
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product</th>
                                        <th scope="col" colspan="2">Description</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Form</th>
                                        <th scope="col" colspan="3">Pharmacy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $idx => $product)
                                    <tr>
                                        <td scope="row">{{ $idx }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td colspan="2">{{ $product->description }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->dosage_form }}</td>
                                        <td colspan="3">
                                            <div class="pills-cell text-left">
                                            @foreach ($product->pharmacies as $idx => $pharmacy)
                                                <span class="badge rounded-pill bg-secondary d-flex flex-column align-items-stretch">
                                                    <span>
                                                        <a href="tel:+"><i class="material-icons">call</i></a>
                                                        {{ $pharmacy->name }}
                                                    </span>
                                                    <small><i class="material-icons">attach_money</i>{{ $pharmacy->pivot->price_range_id ?? 'N/A' }}</small>
                                                    <small><i class="material-icons">inventory 2</i> {{ $pharmacy->pivot->stock_level_id ?? 'N/A' }}</small>
                                                </span>
                                            @endforeach
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
<script type="text/javascript" defer>
</script>

@endsection