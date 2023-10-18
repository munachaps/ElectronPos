<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#searchProduct').keypress(function(e) {
        if (e.key === 'Enter') {
            // Prevent the default form submission behavior
            e.preventDefault();
            // Trigger the form submission
            $('form').submit();
        }
    });
});
$('form').on('submit', function(e) {
    e.preventDefault();
    let productName = $('#searchProduct').val();

    $.ajax({
        url: '/search-product', // Replace with your actual endpoint
        method: 'POST',
        data: { product_name: productName },
        success: function(response) {
            // Clear the table
            $('#searchResultsTable').empty();
            // Populate the table with search results
            $.each(response, function(index, product) {
                let row = $('<tr>');
                row.append($('<td>').text(product.name));
                row.append($('<td>').text(product.quantity));
                row.append($('<td>').text(product.price));
                row.append($('<td>').text(product.name));
                row.append($('<td>').html('<input type="number" class="form-control" value="1" min="1">'));
                $('#searchResultsTable').append(row);
            });
        }
    });
});
</script>
</script>
<div class="container" style="margin-top: 30px;">
    <form action="{{ route('search-products') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Search Product Section -->
            <div class="col-md-12">
                <h3>Search Product</h3>
                <input type="text" class="form-control" name="product_name" placeholder="Search product">
            </div>
        </div>
    </form>    
    <div class="row">
        <!-- Product Table -->
        <div class="col-md-9">
            <h3>Products</h3>
            <table class="table table-bordered" id="searchResultsTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <input type="number" class="form-control" value="1" min="1">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
        <!-- Payment Section -->
        <div class="col-md-3">
            <div class="text-right">
                <h3>Payment</h3>
                <!-- Payment form or buttons go here -->
                <button class="btn btn-success">Pay</button>
            </div>
            <!-- Subtotal and Tax Section -->
            <div class="text-right mt-3">
                <p><strong>Subtotal: $99.99</strong></p>
                <p><strong>Tax (7%): $7.00</strong></p>
                <p><strong>Total: $106.99</strong></p>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
