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
                        <th scope="col">Unit Price</th>
                        <th scope="col">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pharmacy->products as $product)
                    <tr>
                        <td scope="row">No.</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->form }}</td>
                        <td>{{ $product->price }}</td>
                        <td>Coming Soon</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection