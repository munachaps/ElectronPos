<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <!-- First Column: Product Table -->
        <div class="col-md-6">
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

            <!-- Cancel and Submit Buttons -->
            <div class="text-center">
                <button class="btn btn-secondary">Cancel</button>
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- Second Column: Search -->
        <div class="col-md-6">
            <h3>Search</h3>
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search Products">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <!-- The search results can be displayed here -->
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
