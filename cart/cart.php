<?php
$cart = 1;
include_once '../head.php' ?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include_once '../header.php';
  include '../database.php';
  ?>
  <script>
    $(document).ready(function() {
      // Listen for changes in quantity input fields
      $("input[name='quantity']").on("change", function() {
        var productId = $(this).attr("id").replace("quantity_", ""); // Extract the product ID
        var newQuantity = $(this).val(); // Get the new quantity value
        var productPrice = $(this).data("price"); // Get the product price from data attribute
        var totalElement = $(this).closest("tr").find(
          ".total"); // Get the total element in the same row

        // Send an AJAX request to update the quantity in the database
        $.ajax({
          url: "update_quantity.php", // Replace with the URL of your PHP script for updating quantity
          method: "POST",
          data: {
            productId: productId,
            newQuantity: newQuantity
          },
          success: function(response) {
            // Handle the response, e.g., display a success message
            console.log(response);
          },
          error: function(xhr, status, error) {
            // Handle errors, e.g., display an error message
            console.error(error);
          }
        });

        // Calculate and update the total
        var total = productPrice * newQuantity;
        totalElement.text("$" + total.toFixed(2)); // Update the total with 2 decimal places
      });
    });
  </script>

  <!-- Page Header Start -->
  <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 90px">
      <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
      <div class="d-inline-flex">
        <p class="m-0"><a href="../index.php">Home</a></p>
        <p class="m-0 px-2">-</p>
        <p class="m-0">Shopping Cart</p>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <?php
  if (isset($_SESSION["SellerUserID"])) {
    @$customer_id = $_SESSION["SellerUserID"];
  } else {
    @$customer_id = $_SESSION["CustomerUserID"];
  }

  $conn = connection();

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $sql = "SELECT c.id, c.quantity, c.price, p.name AS product_name, p.image_path
    FROM cart c
    JOIN products p ON c.product_id = p.id WHERE c.user_id = $customer_id";

  $result = $conn->query($sql);
  ?>

  <!-- Cart Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5">
      <div class="col-lg-8 table-responsive mb-5">
        <table class="table table-bordered text-center mb-0">
          <thead class="bg-secondary text-dark">
            <tr>
              <th>Products</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody class="align-middle">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='align-middle'><img src='../seller/" . $row['image_path'] . "' alt='' style='width: 50px;'>" . $row['product_name'] . "</td>";
                echo "<td class='align-middle'>" . $row['price'] . "</td>";
                echo "<td class='align-middle'>";
                echo "<div class='input-group quantity mx-auto' style='width: 100px;'>";
                echo "<input type='number' min='1' class='form-control form-control-sm bg-secondary text-center' name='quantity' value='" . $row['quantity'] . "' id='quantity_" . $row['id'] . "' data-price='" . $row['price'] . "'>";
                echo "</div>";
                echo "</td>";
                echo "<td class='align-middle total'>" . number_format(($row['price'] * $row['quantity']), 2) . "</td>";
                echo "<td class='align-middle'><a class='btn btn-sm btn-primary' href='delete_product.php?productId=" . $row['id'] . "'><i class='fa fa-times'></i></a></td>";
                echo "</tr>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="col-lg-4">
        <form class="mb-5" action="">
          <div class="input-group">
            <input type="text" class="form-control p-4" placeholder="Coupon Code">
            <div class="input-group-append">
              <button class="btn btn-primary">Apply Coupon</button>
            </div>
          </div>
        </form>
        <?php
        $sql = "SELECT c.id, c.quantity, p.price, p.name AS product_name, p.image_path
        FROM cart c
        JOIN products p ON c.product_id = p.id
        WHERE c.user_id = $customer_id";

        $result = $conn->query($sql);

        $subTotal = 0;
        $shippingCost = 10; // You mentioned a shipping cost of $10

        // Loop through the cart items and calculate subtotal
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $quantity = $row['quantity'];
            $price = $row['price'];
            $total = $quantity * $price;
            $subTotal += $total;
          }
        }

        // Calculate the total by adding the shipping cost to the subtotal
        $total = $subTotal + $shippingCost;
        ?>

        <!-- Cart Summary HTML -->
        <div class="card border-secondary mb-5">
          <div class="card-header bg-secondary border-0">
            <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-3 pt-1">
              <h6 class="font-weight-medium">Subtotal</h6>
              <h6 class="font-weight-medium" id="subtotal"><?php echo number_format($subTotal, 2); ?></h6>
            </div>
            <div class="d-flex justify-content-between">
              <h6 class="font-weight-medium">Shipping</h6>
              <h6 class="font-weight-medium"><?php echo number_format($shippingCost, 2); ?></h6>
            </div>
          </div>
          <div class="card-footer border-secondary bg-transparent">
            <div class="d-flex justify-content-between mt-2">
              <h5 class="font-weight-bold">Total</h5>
              <h5 class="font-weight-bold" id="total"><?php echo number_format($total, 2); ?></h5>
            </div>
            <button id="rzp-button1" class="btn btn-block btn-primary my-3 py-3 rzp-button1">Proceed To
              Checkout</button>
          </div>
        </div>
      </div>


      <!-- Back to Top -->
      <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

</body>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var options = {
    "key": "rzp_test_vFRDfGH8p3AW5n", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $total * 100; ?>",
    "currency": "INR",
    "description": "Acme Corp",
    "image": "https://s3.amazonaws.com/rzp-mobile/images/rzp.jpg",
    "prefill": {
      "email": "mustakshaikh217@gmail.com",
      "contact": "+919574252029", // Corrected the format to a string
    },
    config: {
      display: {
        blocks: {
          utib: {
            name: "Pay using Axis Bank",
            instruments: [{
                method: "card",
                issuers: ["UTIB"]
              },
              {
                method: "netbanking",
                banks: ["UTIB"]
              },
            ]
          },
          other: {
            name: "Other Payment modes",
            instruments: [{
                method: "card",
                issuers: ["ICIC"]
              },
              {
                method: 'netbanking',
              }
            ]
          }
        },
        hide: [{
          method: "upi"
        }],
        sequence: ["block.utib", "block.other"],
        preferences: {
          show_default_blocks: false
        }
      }
    },
    "handler": function(response) {
      window.location.href = "uploadorder.php";
    },
    "modal": {
      "ondismiss": function() {
        if (confirm("Are you sure you want to close the form?")) {
          console.log("Checkout form closed by the user");
        } else {
          console.log("Complete the Payment");
        }
      }
    }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
  }
</script>
<?php
include '../footer.php';
?>

</html>

<!--5267 3181 8797 5449-->