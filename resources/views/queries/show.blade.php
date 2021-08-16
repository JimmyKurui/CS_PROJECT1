@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper-pharmacy-other">
        <div class="row justify-content-center text-center">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                    <tr>
                        <td scope="row">No.</td>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->category }}</td>
                        <td>{{ $result->form }}</td>
                        <!-- <td>{{ $result->pharmacy->name }}</td> -->
                        <td>{{ $result->price }}</td>
                        <td>Coming Soon</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection