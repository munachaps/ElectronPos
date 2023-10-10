<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap POS System</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <!-- Search Product Input -->
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search for a product" aria-label="Search for a product" aria-describedby="search-button">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="search-button">Search</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Buttons -->
            <div class="float-right">
                <button class="btn btn-success mr-2">Add to Cart</button>
                <button class="btn btn-danger">Checkout</button>
            </div>
        </div>
    </div>
    <!-- Product Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <!-- Add product rows dynamically here -->
            <tr>
                <td>Product 1</td>
                <td>$10.00</td>
                <td><input type="number" value="1" min="1"></td>
            </tr>
            <tr>
                <td>Product 2</td>
                <td>$15.00</td>
                <td><input type="number" value="1" min="1"></td>
            </tr>
            <!-- Add more product rows as needed -->
        </tbody>
    </table>
</div>

<!-- Add Bootstrap JS and jQuery scripts here -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
