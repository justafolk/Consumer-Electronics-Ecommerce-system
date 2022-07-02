<?php $file = "orders.php";
include "header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
    <h1 class="h2">Order Details </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
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
  <br>

  <div class="tabs nav-tabs border" role="tablist" style="border-bottom: 0px!important; border-radius:5px 5px 0px 0px">

    <input type="radio" id="radio-1" name="nav-item tabs idkop"  />
    <label class="tab" for="radio-1">Pending Confirmation<span class="notification">2</span></label>
    <input type="radio" id="radio-2" name="nav-item tabs idkop" />
    <label class="tab" for="radio-2">Unshipped</label>
    <input type="radio" id="radio-3" name="nav-item tabs idkop" />
    <label class="tab" for="radio-3">Shipped</label>
    <input type="radio" id="radio-4" name="nav-item tabs idkop" />
    <label class="tab" for="radio-4">Completed Past Orders</label>
    <input type="radio" id="radio-5" name="nav-item tabs idkop" />
    <label class="tab" for="radio-5">Create Offline Purchase Order</label>
  <span class="glider"></span>

  </div>

  <div class="row mx-0 my-0">
    <div class="card border " id="new_orders" style="border-radius: 0px, 0px, 5px,5px; border-top:0px solid black!important">
      <div class="card-body">
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
              if (!$result){
                echo mysqli_error($conn);
              }
              while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['invoice'];
                $order_date = $row['Order_date'];
                $sql = "SELECT * FROM user WHERE id='" . $row['c_id'] . "'";
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                $addressh = $row2['address'.$row["address"]];
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
                for($i = 0; $i < count($prods)-1; $i++){
                  $value = $prods[$i];
                  $sql = "SELECT image_loc FROM productdb WHERE Prod_id='" . $value . "'";
                  $result3 = mysqli_query($conn, $sql);
                  $row3 = mysqli_fetch_assoc($result3);
                  $img = explode("&", $row3["image_loc"])[0];
                  echo "<img src='../".$img."' style='width: 133px; class='border-bottom' height: 100px;'><br>";
                }
                
                echo "</td>";
                echo "<td>";

                $prods = explode(";", $row["Prod_id"]);

                for($i = 0; $i < count($prods)-1; $i++){
                  $value = $prods[$i];
                  $sql = "SELECT title FROM productdb WHERE Prod_id='" . $value . "'";
                  $result3 = mysqli_query($conn, $sql);
                  $row3 = mysqli_fetch_assoc($result3);
                  echo $row3["title"]."<br>";
                }
                
                echo "</td>";
                echo "<td>".$row["Order_status"]."</td>";
                echo "<td>Rs. ".number_format($row["amount"])."/-</td>";?>
                <td><a href='#' class='btn btn-sm mb-1 btn-outline-secondary' style="width: 100%">View</a> <br>
                <a href='confirm_order.php?order_id=<?php echo $row["order_id"] ?>' class='btn btn-sm mb-1 btn-outline-secondary' style="width: 100%">Confirm Order</a><br>
                
                <a href='#' class='btn btn-sm mb-1 btn-outline-secondary'style="width: 100%">Pass Order</a></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card border " id="Unshipped" style="display:none;border-radius: 0px, 0px, 5px,5px; border-top:0px solid black!important">
      <div class="card-body">
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
              $sql = "SELECT * FROM OrderDB WHERE order_status = 'Placed'";
              $result = mysqli_query($conn, $sql);
              if (!$result){
                echo mysqli_error($conn);
              }
              while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['invoice'];
                $order_date = $row['Order_date'];
                $sql = "SELECT * FROM user WHERE id='" . $row['c_id'] . "'";
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                $addressh = $row2['address'.$row["address"]];
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
                for($i = 0; $i < count($prods)-1; $i++){
                  $value = $prods[$i];
                  $sql = "SELECT image_loc FROM productdb WHERE Prod_id='" . $value . "'";
                  $result3 = mysqli_query($conn, $sql);
                  $row3 = mysqli_fetch_assoc($result3);
                  $img = explode("&", $row3["image_loc"])[0];
                  echo "<img src='../".$img."' style='width: 133px; class='border-bottom' height: 100px;'><br>";
                }
                
                echo "</td>";
                echo "<td>";

                $prods = explode(";", $row["Prod_id"]);

                for($i = 0; $i < count($prods)-1; $i++){
                  $value = $prods[$i];
                  $sql = "SELECT title FROM productdb WHERE Prod_id='" . $value . "'";
                  $result3 = mysqli_query($conn, $sql);
                  $row3 = mysqli_fetch_assoc($result3);
                  echo $row3["title"]."<br>";
                }
                
                echo "</td>";
                echo "<td>".$row["Order_status"]."</td>";
                echo "<td>Rs. ".number_format($row["amount"])."/-</td>";?>
                <td><a href='#' class='btn btn-sm mb-1 btn-outline-secondary' style="width: 100%">View</a> <br>
                <a href='#' class='btn btn-sm mb-1 btn-outline-secondary' style="width: 100%">Confirm Order</a><br>
                
                <a href='#' class='btn btn-sm mb-1 btn-outline-secondary'style="width: 100%">Pass Order</a></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card border " id="Shipped" style="display:none;border-radius: 0px, 0px, 5px,5px; border-top:0px solid black!important">
      <div class="card-body">
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
              $sql = "SELECT * FROM OrderDB WHERE order_status = 'Placed'";
              $result = mysqli_query($conn, $sql);
              if (!$result){
                echo mysqli_error($conn);
              }
              while ($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['invoice'];
                $order_date = $row['Order_date'];
                $sql = "SELECT * FROM user WHERE id='" . $row['c_id'] . "'";
                $result2 = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                $addressh = $row2['address'.$row["address"]];
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
                for($i = 0; $i < count($prods)-1; $i++){
                  $value = $prods[$i];
                  $sql = "SELECT image_loc FROM productdb WHERE Prod_id='" . $value . "'";
                  $result3 = mysqli_query($conn, $sql);
                  $row3 = mysqli_fetch_assoc($result3);
                  $img = explode("&", $row3["image_loc"])[0];
                  echo "<img src='../".$img."' style='width: 133px; class='border-bottom' height: 100px;'><br>";
                }
                
                echo "</td>";
                echo "<td>";

                $prods = explode(";", $row["Prod_id"]);

                for($i = 0; $i < count($prods)-1; $i++){
                  $value = $prods[$i];
                  $sql = "SELECT title FROM productdb WHERE Prod_id='" . $value . "'";
                  $result3 = mysqli_query($conn, $sql);
                  $row3 = mysqli_fetch_assoc($result3);
                  echo $row3["title"]."<br>";
                }
                
                echo "</td>";
                echo "<td>".$row["Order_status"]."</td>";
                echo "<td>Rs. ".number_format($row["amount"])."/-</td>";?>
                <td><a href='#' class='btn btn-sm mb-1 btn-outline-secondary' style="width: 100%">View</a> <br>
                <a href='#' class='btn btn-sm mb-1 btn-outline-secondary' style="width: 100%">Confirm Order</a><br>
                
                <a href='#' class='btn btn-sm mb-1 btn-outline-secondary'style="width: 100%">Pass Order</a></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</main>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script>
  neworders=document.getElementById("new_orders");

  // if checkbox checked
  radioop1 = document.getElementById("radio-1");
  radioop2 = document.getElementById("radio-2");
  radioop3 = document.getElementById("radio-3");
  radioop4 = document.getElementById("radio-4");
  radioop1.addEventListener("click", function(){
  if (new_orders.style.display == "none") {
    new_orders.style.display = "block";
  }
  else {
    new_orders.style.display = "none";
  }});


  radioop2.addEventListener("click", function(){
  if (Unshipped.style.display == "none") {
    Unshipped.style.display = "block";
  }
  else {
    Unshipped.style.display = "none";
  }});


  radioop3.addEventListener("click", function(){
  if (Shipped.style.display == "none") {
    Shipped.style.display = "block";
  }
  else {
    Shipped.style.display = "none";
  }});


  radioop4.addEventListener("click", function(){
  if (new_orders.style.display == "none") {
    new_orders.style.display = "block";
  }
  else {
    new_orders.style.display = "none";
  }});
</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</body>

</html>
