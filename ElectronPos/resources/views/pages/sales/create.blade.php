<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electron Point Of Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <!-- Product Search Form -->
            <div class="col-md-4">
                <form action="{{ route('product-search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search for products">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>

            <!-- Search Results -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Search Results</h3>
                        <ul>
                            @foreach ($products as $product)
                                <li>
                                    {{ $product->name }}
                                    <span class="badge bg-primary">Price: ${{ $product->price }}</span>
                                    <form action="{{ route('product.addToCart', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart Section -->
        </div>
    </div>
</body>
</html>
