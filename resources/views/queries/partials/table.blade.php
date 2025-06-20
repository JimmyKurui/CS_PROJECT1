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