<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sale</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Your custom CSS file -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>


    <div class="container">


        <div class="row">


          <div class="col-md-6">

            <h1>Electron Point Of Sale</h1>
            <input type="text" id="search-box" placeholder="Search for products" class="form-control">
            <hr>
            <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Amount</th>
                  </tr>
              </thead>
              <tbody id="cart-items">
                  <!-- Cart items will be populated here -->
              </tbody>
          </table>
            
          </div>

          <div class="col-md-6">

            
            
          </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <!-- Your custom JavaScript file -->
    <script src="script.js"></script>
</body>
</html>
