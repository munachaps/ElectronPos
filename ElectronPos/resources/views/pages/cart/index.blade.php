<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <!-- Search Product Section -->
        <div class="col-md-12">
            <h3>Search Product</h3>
            <input type="text" class="form-control" id="searchProduct" placeholder="Search product">
        </div>
    </div>
    <div class="row">
        <!-- Product Table -->
        <div class="col-md-9">
            <h3>Products</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Your product data here -->
                    <tr>
                        <td>Product 1</td>
                        <td>$19.99</td>
                        <td>
                            <div class="input-group">
                                <input type="number" class="form-control" value="1" min="1">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">+</button>
                                    <button class="btn btn-danger" type="button">-</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!-- Add more product rows as needed -->
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
