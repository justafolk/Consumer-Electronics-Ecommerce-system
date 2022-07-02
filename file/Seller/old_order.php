<?php $file = "orders.php";
include "header.php" ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Order Details </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="card  shadow-none border">
        <button class="btn btn-dark btn-ecomm">Confirm Order</button>
      </div>
    </div>
  </div>

  <h5>Order ID : #213901223</h5>

  <br>
  <div class="card">
    <div class="card-body">
        <div class="row">

        <div class="col-md-4">
          <h5 class="">Billing Address:</h5>

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
        <div class="col-md-4">
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
        <div class="col-md-1"></div>
        <div class="col-md-3">
         
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
                <tr>
                  <td>1</td>
                  <td>
                    <div class="row">
                      <div class="col-md-2">
                        <img src="./ex.jpg" style="width:60px ;" alt="">

                      </div>
                      <div class="col-md-10">
                        Sony WF-1000XM4 Noise-Canceling True Wireless In-Ear Headphones (Black)
                        BH #SOWF1000XM4B • MFR #WF1000XM4/B
                      </div>
                    </div>
                  </td>
                  <td>
                    3
                  </td>
                  <td>
                    6700/-
                  </td>
                  <th>
                    6700
                  </th>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <div class="row">
                      <div class="col-md-2">
                        <img src="./ex.jpg" style="width:60px ;" alt="">

                      </div>
                      <div class="col-md-10">
                        Sony WF-1000XM4 Noise-Canceling True Wireless In-Ear Headphones (Black)
                        BH #SOWF1000XM4B • MFR #WF1000XM4/B
                      </div>
                    </div>
                  </td>
                  <td>
                    3
                  </td>
                  <td>
                    6700/-
                  </td>
                  <th>
                    6700
                  </th>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <div class="row">
                      <div class="col-md-2">
                        <img src="./ex.jpg" style="width:60px ;" alt="">

                      </div>
                      <div class="col-md-10">
                        Sony WF-1000XM4 Noise-Canceling True Wireless In-Ear Headphones (Black)
                        BH #SOWF1000XM4B • MFR #WF1000XM4/B
                      </div>
                    </div>
                  </td>
                  <td>
                    3
                  </td>
                  <td>
                    6700/-
                  </td>
                  <th>
                    6700
                  </th>
                </tr>
                <thead>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th> 6700 /-</th>

                  </tr>
                </thead>
              </tbody>
            </table>
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
  <div class="row ">
    <div class="col-md-6">

      <div class="card">
        <div class="card-body">

          <table class="table">
            <tbody>
              <tr row="1">
                <th>Shipping Tracking no.</th>
                <td>DTDC-03298523395</td>
              </tr>
              <tr row="1">
                <th>Shipping Date</th>
                <td>24th May, 2022</td>
              </tr>
              <tr row="1">
                <th>Est. Delivery Date</th>
                <td>24th May, 2022</td>
              </tr>
              <tr row="1">
                <th>Shipping Address</th>
                <td>H-19, Prashant Path, Flat no. 2920, MHB, Yerwada, Pune-311005</td>
              </tr>
              <tr row="1">
                <th>Contact Customer</th>
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

          <table class="table" style="height:100%">
            <tbody>
              <tr row="1">
                <th>Items Subtotal</th>
                <td>12,750/-</td>
              </tr>
              <tr row="1">
                <th>Taxes (CGST+SGST)</th>
                <td>75/-</td>
              </tr>
              <tr row="1">
                <th>Shipping Charges</th>
                <td>47.78/-</td>
              </tr>
              <tr row="1">
                <th>Grand Total</th>
                <td>12873.78/-</td>
              </tr>

            </tbody>
          </table>
          <div class="row">
            <div class="col-md-12"><button class="btn " style="width: 49% ; background-color:grey; color:white">Print
                Invoice</button>

              <button class="btn " style="width:49%;           background-color:grey; color:white;">Print
                Invoice</button>

            </div>
          </div>

        </div>
      </div>

    </div>
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