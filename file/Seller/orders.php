<?php $file = "orders.php";
include "header.php" ?>
<?php
  function verify_delivery($track_id){
    include "../login.dbh.php"; 
    $status = explode("\n",`python3 ./requests_track.py $track_id`)[0];
    if (strpos($status, 'Successfully Delivered')!== false){
      $sql = "UPDATE OrderDB SET Order_status = 'delivered' WHERE Tracking_id = '$track_id'";
      $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
      return true;
    }
  }
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
    <h1 class="h2">Manage Orders </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <button type="button" class="btn btn-sm btn-outline-dark">Export</button>
      &nbsp;
      &nbsp;

      <button type="button" class="btn btn-sm btn-outline-dark dropdown-toggle">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true">
          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
          <line x1="16" y1="2" x2="16" y2="6"></line>
          <line x1="8" y1="2" x2="8" y2="6"></line>
          <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg>
        This week
      </button>
    </div>
  </div>

  <div class="row mx-0 my-3 ">




    <div class="card border " id="new_orders" style="border-radius: 0px, 0px, 5px,5px; ">
      <div class="card-body" style="justify-content: center; align-items:center;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending Orders</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="unshipped-tab" data-bs-toggle="tab" data-bs-target="#unshipped" type="button" role="tab" aria-controls="unshipped" aria-selected="false">Unshipped Orders</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped" type="button" role="tab" aria-controls="shipped" aria-selected="false">Shipped Orders</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">Completed Past Orders</button>
          </li>
         

        </ul>
        <br>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
            <div class="row">
              <div class="col-md-2">

                <h4>New Orders</h4>
              </div>
              <div class="col-md-10">
                <!-- search bar -->
                <div class="input-group mb-3">
                  <input type="text" name="searchbar" id="searchbar" class="form-control" style="border-radius: 15px" placeholder="Search">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Invoice ID</th>
                  <th>Order Date</th>
                  <th>Customer Info</th>
                  <th>Product Image</th>
                  <th>Product Desc</th>
                  <th>Order Status</th>
                  <th>Order Total</th>
                  <th>Order Actions</th>
                </thead>
                <tbody>
                  <?php
                  include "../login.dbh.php";
                  $sql = "SELECT * FROM OrderDB WHERE order_status = 'Placed'";
                  $result = mysqli_query($conn, $sql);
                  if (!$result) {
                    echo mysqli_error($conn);
                  }
                  while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['invoice'];
                    $order_date = $row['Order_date'];
                    $sql = "SELECT * FROM user WHERE id='" . $row['c_id'] . "'";
                    $result2 = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    $addressh = $row2['address' . $row["address"]];
                    echo "<tr>";
                    echo "<td>$order_id</td>";
                    echo "<td>$order_date</td>";
                    echo "<td>";
                    $jsonData = rtrim($addressh, "\0");
                    $address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
                    echo $address_f["fname"] . " " . $address_f["lname"] . "<br>";
                    echo $address_f["address1"] . "<br>";
                    echo $address_f["address2"];
                    echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
                    echo $address_f["state"] . "<br>";
                    echo $address_f["phoneno"] . "<br>";


                    echo "</td>";
                    echo "<td>";
                    $prods = explode(";", $row["Prod_id"]);
                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT image_loc FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      $img = explode("&", $row3["image_loc"])[0];
                      echo "<img src='../" . $img . "' style='width: 133px; class='border-bottom' height: 100px;'><hr>";
                    }

                    echo "</td>";
                    echo "<td>";

                    $prods = explode(";", $row["Prod_id"]);

                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT title FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      echo $row3["title"] . "<br>";
                    }

                    echo "</td>";
                    echo "<td>" . $row["Order_status"] . "</td>";
                    echo "<td>Rs. " . number_format($row["amount"]) . "/-</td>"; ?>
                    <td><a href='old_order.php?order_id=<?php echo $row["invoice"]; ?>' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">View</a> <br>
                      <a href='confirm_order.php?order_id=<?php echo $row["invoice"] ?>' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 ' style="width: 100%">Confirm Order</a><br>

                      <a href='#' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">Pass Order</a>
                    </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade " id="unshipped" role="tabpanel" aria-labelledby="unshipped-tab">
            <div class="row">
              <div class="col-md-2">

                <h4>Unshipped Orders</h4>
              </div>
              <div class="col-md-10">
                <!-- search bar -->
                <div class="input-group mb-3">
                  <input type="text" name="searchbar" id="searchbar" class="form-control" style="border-radius: 15px" placeholder="Search">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Invoice ID</th>
                  <th>Order Date</th>
                  <th>Customer Info</th>
                  <th>Product Image</th>
                  <th>Product Desc</th>
                  <th>Order Status</th>
                  <th>Order Total</th>
                  <th>Order Actions</th>
                </thead>
                <tbody>
                  <?php
                  include "../login.dbh.php";
                  $sql = "SELECT * FROM OrderDB WHERE order_status = 'Confirmed'";
                  $result = mysqli_query($conn, $sql);
                  if (!$result) {
                    echo mysqli_error($conn);
                  }
                  while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['invoice'];
                    $order_date = $row['Order_date'];
                    $sql = "SELECT * FROM user WHERE id='" . $row['c_id'] . "'";
                    $result2 = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    $addressh = $row2['address' . $row["address"]];
                    echo "<tr>";
                    echo "<td>$order_id</td>";
                    echo "<td>$order_date</td>";
                    echo "<td>";
                    $jsonData = rtrim($addressh, "\0");
                    $address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
                    echo $address_f["fname"] . " " . $address_f["lname"] . "<br>";
                    echo $address_f["address1"] . "<br>";
                    echo $address_f["address2"];
                    echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
                    echo $address_f["state"] . "<br>";
                    echo $address_f["phoneno"] . "<br>";


                    echo "</td>";
                    echo "<td>";
                    $prods = explode(";", $row["Prod_id"]);
                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT image_loc FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      $img = explode("&", $row3["image_loc"])[0];
                      echo "<img src='../" . $img . "' style='width: 133px; class='border-bottom' height: 100px;'><br> <hr> ";
                    }

                    echo "</td>";
                    echo "<td>";

                    $prods = explode(";", $row["Prod_id"]);

                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT title FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      echo $row3["title"] . "<br>";
                    }

                    echo "</td>";
                    echo "<td>" . $row["Order_status"] . "</td>";
                    echo "<td>Rs. " . number_format($row["amount"]) . "/-</td>"; ?>
                    <td><a href='old_order.php?order_id=<?php echo $row["invoice"]; ?>' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">View</a> <br>
                      <a href='track_order.php?order_id=<?php echo $row["invoice"] ?>' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">Add Tracking ID</a><br>

                      <a href='#' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">Print Packing Slip</a>
                    </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade " id="shipped" role="tabpanel" aria-labelledby="shipped-tab">
            <div class="row">
              <div class="col-md-2">

                <h4>Shipped Orders</h4>
              </div>
              <div class="col-md-10">
                <!-- search bar -->
                <div class="input-group mb-3">
                  <input type="text" name="searchbar" id="searchbar" class="form-control" style="border-radius: 15px" placeholder="Search">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Invoice ID</th>
                  <th>Order Date</th>
                  <th>Customer Info</th>
                  <th>Product Image</th>
                  <th>Product Desc</th>
                  <th>Order Status</th>
                  <th>Order Total</th>
                  <th>Order Actions</th>
                </thead>
                <tbody>
                  <?php
                  include "../login.dbh.php";
                  $sql = "SELECT * FROM OrderDB WHERE order_status = 'Shipped'";
                  $result = mysqli_query($conn, $sql);
                  if (!$result) {
                    echo mysqli_error($conn);
                  }
                  while ($row = mysqli_fetch_assoc($result)) {
                    $a = verify_delivery($row["Tracking_id"]);
                    if ($a == true){
                      continue;
                    }
                    $order_id = $row['invoice'];
                    $order_date = $row['Order_date'];
                    $sql = "SELECT * FROM user WHERE id='" . $row['c_id'] . "'";
                    $result2 = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    $addressh = $row2['address' . $row["address"]];
                    echo "<tr>";
                    echo "<td>$order_id</td>";
                    echo "<td>$order_date</td>";
                    echo "<td>";
                    $jsonData = rtrim($addressh, "\0");
                    $address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
                    echo $address_f["fname"] . " " . $address_f["lname"] . "<br>";
                    echo $address_f["address1"] . "<br>";
                    echo $address_f["address2"];
                    echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
                    echo $address_f["state"] . "<br>";
                    echo $address_f["phoneno"] . "<br>";


                    echo "</td>";
                    echo "<td>";
                    $prods = explode(";", $row["Prod_id"]);
                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT image_loc FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      $img = explode("&", $row3["image_loc"])[0];
                      echo "<img src='../" . $img . "' style='width: 133px; class='border-bottom' height: 100px;'><br>";
                    }

                    echo "</td>";
                    echo "<td>";

                    $prods = explode(";", $row["Prod_id"]);

                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT title FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      echo $row3["title"] . "<br>";
                    }

                    echo "</td>";
                    echo "<td>" . $row["Order_status"] . "</td>";
                    echo "<td>Rs. " . number_format($row["amount"]) . "/-</td>"; ?>
                    <td><a href='trackfr.php?order_id=<?php echo $row["invoice"]; ?>' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">View</a> <br>
                      <a href='#' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">Print Invoice</a><br>

                      </tr>
                    <?php
                  }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade " id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <div class="row">
              <div class="col-md-2">

                <h4>Completed Orders</h4>
              </div>
              <div class="col-md-10">
                <!-- search bar -->
                <div class="input-group mb-3">
                  <input type="text" name="searchbar" id="searchbar" class="form-control" style="border-radius: 15px" placeholder="Search">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <th>Invoice ID</th>
                  <th>Order Date</th>
                  <th>Customer Info</th>
                  <th>Product Image</th>
                  <th>Product Desc</th>
                  <th>Order Status</th>
                  <th>Order Total</th>
                  <th>Order Actions</th>
                </thead>
                <tbody>
                  <?php
                  include "../login.dbh.php";
                  $sql = "SELECT * FROM OrderDB WHERE order_status = 'Delivered'";
                  $result = mysqli_query($conn, $sql);
                  if (!$result) {
                    echo mysqli_error($conn);
                  }
                  while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['invoice'];
                    $order_date = $row['Order_date'];
                    $sql = "SELECT * FROM user WHERE id='" . $row['c_id'] . "'";
                    $result2 = mysqli_query($conn, $sql);
                    $row2 = mysqli_fetch_assoc($result2);
                    $addressh = $row2['address' . $row["address"]];
                    echo "<tr>";
                    echo "<td>$order_id</td>";
                    echo "<td>$order_date</td>";
                    echo "<td>";
                    $jsonData = rtrim($addressh, "\0");
                    $address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
                    echo $address_f["fname"] . " " . $address_f["lname"] . "<br>";
                    echo $address_f["address1"] . "<br>";
                    echo $address_f["address2"];
                    echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
                    echo $address_f["state"] . "<br>";
                    echo $address_f["phoneno"] . "<br>";


                    echo "</td>";
                    echo "<td>";
                    $prods = explode(";", $row["Prod_id"]);
                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT image_loc FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      $img = explode("&", $row3["image_loc"])[0];
                      echo "<img src='../" . $img . "' style='width: 133px; class='border-bottom' height: 100px;'><br>";
                    }

                    echo "</td>";
                    echo "<td>";

                    $prods = explode(";", $row["Prod_id"]);

                    for ($i = 0; $i < count($prods) - 1; $i++) {
                      $value = $prods[$i];
                      $sql = "SELECT title FROM productdb WHERE Prod_id='" . $value . "'";
                      $result3 = mysqli_query($conn, $sql);
                      $row3 = mysqli_fetch_assoc($result3);
                      echo $row3["title"] . "<br>";
                    }

                    echo "</td>";
                    echo "<td>" . $row["Order_status"] . "</td>";
                    echo "<td>Rs. " . number_format($row["amount"]) . "/-</td>"; ?>
                    <td><a href='trackfr.php?order_id=<?php echo $row["invoice"]; ?>' href='trackfr.php?order_id=<?php echo $row["invoice"]; ?>' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">View</a> <br>
                      <a href='#' class='btn btn-outline-dark ripple-surface-dark mb-1 mb-1 mb-1' style="width: 100%">Print Invoice</a><br>

                      </tr>
                    <?php
                  }
                    ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tab-pane fade " id="purchase_offline" role="tabpanel" aria-labelledby="purchase_offline-tab">
            <div class="row">
              <div class="col-md-2">

                <h4>Purchase Order </h4>
              </div>

            </div>
            <div class="row">
              <div class="col-md-9">
                <!-- search bar -->
                <form action="" method="get">

                <div class="input-group mb-3">
                  <input type="text" name="term" id="term" class="form-control" style="" placeholder="Search Products..">
                  <input type="submit" value="Add Product" style="" class="btn btn-ecomm btn-dark">
                </div>
                </form>
                <script type="text/javascript">
                  $(function() {
                    $("#term").autocomplete({
                      source: 'searchs.php',
                    });
                  });
                </script>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</main>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script>

</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</body>

</html>