<?php $file = "orders.php";
include "header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order Details </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="card  shadow-none border">
        <button onclick="window.location.href='confirm_order.php?order_id=<?php echo $_GET["order_id"] ?>'" class="btn btn-dark btn-ecomm "><i class="fa-solid fa-print"></i> &nbsp; Print Shipping Slip</button>
      </div> &nbsp;
      <button onclick="window.location.href='confirm_order.php?order_id=<?php echo $_GET["order_id"] ?>'" class="btn btn-light border btn-ecomm"> <i class="fa-solid fa-print"></i> &nbsp; Print Invoice Slip</button>
    </div>
  </div>
  <div class="card" style="width: 100%; height:100%">
      <div class="card-body" style="width: 100%; height:100%">
        
  <div class="row">
    
    <div class="col-md-6">

      <h4>Order ID : #213901223</h4>
    </div>
    <div class="col-md-6" style="text-align:right; ">
      <h5>Order Status <span style="color: green;">: Delivered</span></h5>
      <p style="margin-bottom:0px!important;">Last Update : 28/12/2022</p>
      <!-- text input for tracking id -->

      </div>
    </div>
    </div>
  </div>
  <?php
  include "../login.dbh.php";
  $order_id = $_GET["order_id"];
  $sql = "select * from OrderDB where invoice='$order_id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_error($conn)) {
    echo mysqli_error($conn);
  }
  $row = mysqli_fetch_assoc($result);
  $ad = $row["address"];
  $user_id = $row["c_id"];
  $sql = "SELECT address$ad FROM user WHERE id = '$user_id'";
  $s = mysqli_query($conn, $sql);
  $row2 = mysqli_fetch_array($s);
  $address1 = $row2["address$ad"];
  $jsonData = rtrim($address1, "\0");
  $address_f =  json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonData), true);
  ?>
<br>

  <div class="row ">
    <div class="col-md-6">

      <div class="card">
        <div class="card-body">

          <table class="table-borderless" style="width: 100%; height:100%">
            <tbody>
              <tr>
                <th>Shipping Tracking no.</th>
                <th>:</th>
                <td><?php echo $row["Tracking_id"] ?></td>
              </tr>
              <tr row="1">
                <th>Shipping Date</th>
                <th>:</th>
                <td>24th May, 2022</td>
              </tr>
              <tr row="1">
                <th>Est. Delivery Date</th>
                <th>:</th>
                <td>24th May, 2022</td>
              </tr>
              <tr row="1">
                <th>Shipping Address</th>
                <th>:</th>
                <td>H-19, Prashant Path, Flat no. 2920, MHB, Yerwada, Pune-311005</td>
              </tr>
              <tr row="1">
                <th>Contact Customer</th>
                <th>:</th>
                <td> +91 86056 77177 / avdhut.kamble776@gmail.com</td>
              </tr>

            </tbody>
          </table>

        </div>

      </div>
    </div>
    <div class="col-md-6">

      <div class="card" style="height:100%">
        <div class="card-body" style="height:100%">

          <table class="table-borderless" style="width: 100%; height:100%">
            <tbody>
              <tr row="1">
                <th>Items Subtotal</th>
                <th>:</th>
                <td>12,750/-</td>
              </tr>
              <tr row="1">
                <th>Taxes (CGST+SGST)</th>
                <th>:</th>

                <td>75/-</td>
              </tr>
              <tr row="1">
                <th>Shipping Charges</th>
                <th>:</th>
                <td>47.78/-</td>
              </tr>
              <tr row="1">
                <th>Grand Total</th>
                <th>:</th>
                <td>12873.78/-</td>
              </tr>

            </tbody>
          </table>
          <div class="row">

          </div>
        </div>

      </div>
    </div>

  </div>
  </div>

  <br>
  <div class="row">

    <div class="col-md-4" >
      <div class="card" style="width:100%; height:100%;">
        <div class="card-body">

          <h5 class="">Billing Address:</h5>


          <h5 class=""><?php echo str_replace("_", " ", $address_f["fname"] . " " . $address_f["lname"]) ?></h5>
          <?php
          echo $address_f["address1"] . "<br>";
          echo $address_f["address2"];
          echo $address_f["city"] . " - " . $address_f["zipcode"] . "<br>";
          echo $address_f["state"] . "<br>";
          echo $address_f["phoneno"] . "<br>";
          $json_string = stripslashes(html_entity_decode($address1));
          echo json_decode($json_string, true);

          ?>
        </div>
      </div>
    </div>

    <div class="col-md-4" >
      <div class="card" style="width:100%; height:100%;">
        <div class="card-body">
          <h5>
            Payment Details:
          </h5>
          <table class="table-borderless" style="width:100% ;">
            <tbody>
              <tr>
                <th>Payment Method</th>
                <td><?php echo $_POST["mode"] ?></td>
              </tr>
              <tr>
                <th>Paid Amount</th>
                <td>Rs. <?php echo $row["amount"] ?> /-</td>
              </tr>
              <tr>
                <th>Payment Status</th>
                <td style="color:green"><?php echo "Success" ?></td>
              </tr>
              <tr>
                <th>Order Status</th>
                <td>Confirmed</td>
              </tr>
              <tr>
                <th>Method ID:</th>
                <td><?php echo $_POST["field1"] ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="col-md-4" >
      <div class="card" style="width:100%; height:100%;">
        <div class="card-body">

          <h5>Total Amount :</h5>
          <h4>₹ <?php echo $row["amount"]  ?>/-</h4>

        </div>
      </div>

    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body ">
          <div class="table-responsive">

            <table class="table ">
              <thead>
                <th>#</th>
                <th>Product Details</th>
                <th>Quantity</th>
                <th>Price</th>
                <th colspan=2>Totals</th>
              </thead>
              <tbody>
                <?php

                $sql = "select * from OrderDB where invoice='$order_id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_error($conn)) {
                  echo mysqli_error($conn);
                }
                $row = mysqli_fetch_assoc($result);
                $prods = explode(";", $row["Prod_id"]);
                $total = 0;
                for ($i = 0; $i < count($prods) - 1; $i++) {
                  $sql = "select * from productdb where Prod_id='" . explode("x", $prods[$i])[0] . "'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_error($conn)) {
                    echo mysqli_error($conn);
                  }
                  $row2s = mysqli_fetch_assoc($result);

                  # code...

                ?>
                  <tr>
                    <td><?php echo $i+1 ?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-3">
                          <img src="../<?php echo explode("&", $row2s["image_loc"])[0]  ?>" style="width:60px ;" alt="">

                        </div>
                        <div class="col-md-9">
                          <?php echo $row2s["title"] ?>
                        </div>
                      </div>
                    </td>
                    <td>
                      <?php echo explode("x", $prods[$i])[1]; ?>
                    </td>
                    <td>Rs. 
                      <?php echo number_format($row2s["price"]); ?>
                    </td>
                    <th>Rs. 
                      <?php echo number_format($row2s["price"] * explode("x", $prods[$i])[1]);
                      $total += $row2s["price"] * explode("x", $prods[$i])[1]; ?>
                    </th>
                  </tr>
                <?php } ?>

                <thead>
                  <tr>
                    <td style="border-bottom: 0px;"></td>
                    <td style="border-bottom: 0px;"></td>
                    <td style="border-bottom: 0px;"></td>
                    <td ><strong> 
                    Subtotal :
                    </strong> </td>
                    <th>Rs <?php echo number_format($total); ?> /-</th>

                  </tr>
                  <tr>
                    <td style="border-bottom: 0px;"></td>
                    <td style="border-bottom: 0px;"></td>
                    <td style="border-bottom: 0px;"></td>
                    <td >
                      <strong>

                        Discount <?php ?> :
                      </strong>
                    </td>
                    <th> 6700 /-</th>

                  </tr>
                  <tr>
                    <td style="border-bottom: 0px;"></td>
                    <td style="border-bottom: 0px;"></td>
                    <td style="border-bottom: 0px;"> </td>
                    <td>
                      <strong>

                        Grand Total
                      </strong>
                    </td>
                    <th>Rs. <?php echo number_format($row["amount"]) ?> /-</th>

                  </tr>
                </thead>
              </tbody>
            </table>
          </div>


        </div>
      </div>
    </div>
  </div>

  </div>

  <div class="row" style="align-items: center; justify-content:center;">
    <div class="col-md-5">

    </div>

  </div>
  <br>

  </div>

  </div>

  </div>
</main>
</div>


<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45],
      }]
    },

    // Configuration options go here
    options: {}
  });
</script>

</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</body>

</html>