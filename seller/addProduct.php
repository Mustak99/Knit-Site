<!DOCTYPE html>
<html>

<head>
  <title>Page with Form and Sidebar</title>
  <!-- Add Bootstrap CSS CDN link -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    /* Custom CSS for sidebar */
    .sidebar {
      background-color: #f8f9fa;
      padding: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <div class="sidebar">
          <h2>Sidebar</h2>
          <ul class="list-group">
            <li class="list-group-item">Item 1</li>
            <li class="list-group-item">Item 2</li>
            <li class="list-group-item">Item 3</li>
          </ul>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-9">
        <h1>Add Product</h1>
        <form>
          <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name">
          </div>
          <div class="form-group">
            <label for="productDescription">Product Description</label>
            <textarea class="form-control" id="productDescription" rows="3"
              placeholder="Enter product description"></textarea>
          </div>
          <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="text" class="form-control" id="productPrice" placeholder="Enter product price">
          </div>
          <div class="form-group">
            <label for="productQuantity">Product Quantity</label>
            <input type="number" class="form-control" id="productQuantity" placeholder="Enter product quantity">
          </div>
          <div class="form-group">
            <label for="productCategory">Product Category</label>
            <div class="custom-control custom-radio">
              <input type="radio" id="menCategory" name="productCategory" class="custom-control-input" value="men">
              <label class="custom-control-label" for="menCategory">Men</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="womenCategory" name="productCategory" class="custom-control-input" value="women">
              <label class="custom-control-label" for="womenCategory">Women</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="childrenCategory" name="productCategory" class="custom-control-input"
                value="children">
              <label class="custom-control-label" for="childrenCategory">Children</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Add Bootstrap JS CDN links -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>

</html>
