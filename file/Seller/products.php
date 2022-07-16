<?php $file = "products.php";
include "header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
    <h1 class="h2">Manage Products and Inventory </h1>
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

  <!-- tab layout for add seller, seller lookup, inventory requests -->


  <div class="row mx-0 my-3">

    <div class="card border ">
      <div class="card-body ">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">View Inventory</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Request Inventory</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">Product Sales</button>
          </li>

        </ul>
        <br>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
              <div class="col-md-12">

                <div class="row">
                  <div class="col-md-2">

                    <h4>Current Inventory</h4>
                  </div>
                  <div class="col-md-10">
                    <!-- search bar -->
                    <div class="input-group mb-3">
                      <input type="text" name="searchbar" id="searchbar" class="form-control" style="border-radius: 15px" placeholder="Search">
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-12">
                    <div class="card shadow-none">
                      <div class=" shadow-none">
                        <div class="table-responsive">

                          <table class="table display" id="idk">
                            <thead>
                              <th>Product Details</th>
                              <th>Category</th>
                              <th>In Stock</th>
                              <th>Price</th>
                              <th>Action</th>

                            </thead>
                            <tbody>
                              
                              <?php
                              include "../login.dbh.php";
                              $sql = "select product_quantity from sellerDB where id={$_SESSION['s_id']}";
                              $result = mysqli_query($conn, $sql);
                              if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                $row = mysqli_fetch_assoc($result);

                                echo "<tr>";
                                $prods = explode(";", $row["product_quantity"]);
                                for ($i = 0; $i < count($prods) - 1; $i++) {

                                  $product = explode("x", $prods[$i]);
                                  $sql2 = "select * from productdb where Prod_id={$product[0]}";
                                  $result2 = mysqli_query($conn, $sql2);
                                  $row2 = mysqli_fetch_assoc($result2);

                              ?>
                                  <tr>
                                    <td>
                                      <div class="row">
                                        <div class="col-md-2">
                                          <?php $img = explode("&", $row2["image_loc"])[0];
                                          echo "<img src='../" . $img . "' style='width: 133%; class='border-bottom' height: 100%;'>"; ?>

                                        </div>
                                        <div class="col-md-10">
                                          <?php echo $row2["title"] ?>
                                        </div>
                                      </div>
                                    </td>
                                    <td>
                                      <?php echo $row2["category"] ?>
                                    </td>
                                    <td>
                                      <?php echo $product[1] ?>
                                    </td>
                                    <td>Rs. <?php echo number_format($row2["price"]) ?></td>
                                    <th>
                                      <button class="btn btn-sm" onclick="window.location.href='/product-details.php?id=<?php echo $row2["Prod_id"] ?>'" style="background-color: grey; color: white;">View More
                                      </button>
                                    </th>
                                  </tr>


                              <?php }
                              } ?>


                            </tbody>
                          </table>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
          <!-- search bar -->
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <h4>Request Inventory</h4>
            <div class="row">
              <div class="col-md-12">

                <form action="">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="sellername">Seller Name</label>
                        <input type="text" name="sellername" id="sellername" class="form-control">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="sellerphone">Seller Phone</label>
                        <input type="text" name="sellerphone" id="sellerphone" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="selleraddress">Address</label>
                        <input type="text" name="selleraddress" id="selleraddress" class="form-control">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="sellermail">Seller Mail</label>
                        <input type="text" name="sellermail" id="sellermail" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="sellerzipcode">Seller Zipcode</label>
                        <input type="text" name="sellerzipcode" id="sellerzipcode" class="form-control">
                      </div>
                    </div>
                  </div>
                </form>
                <br>
                <!-- add a searchbar for searching products and adding them in the list -->
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search Product ID or title">
                  <span class="input-group-btn">
                    <button class="btn btn-ecomm btn-dark" style="height: 100%;
border-radius: 0px 5px 5px 0px;
" type="button">Go!</button>
                  </span>
                </div>
                <br>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>
                          Product Details
                        </th>
                        <th>Product ID</th>
                        <th>
                          Quantity
                        </th>
                        <th>
                          Total
                        </th>
                        <th>
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                  <!-- add row button -->
                  <button type="button" class="btn" style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                    +
                  </button>

                </div>
              </div>
            </div>



          </div>
          <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
            <!-- Sales with respect to category -->
            <h4>Product Sales Analysis</h4>

            <!-- from date to date -->
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="from_date">From Date</label>
                  <input type="date" class="form-control" id="from_date" name="from_date">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="to_date">To Date</label>
                  <input type="date" class="form-control" id="to_date" name="to_date">
                </div>
              </div>
              <div class="col-md-2">
                <button type="button" class="btn btn-ecomm btn-dark" style="margin-top:20px ;width:100%">
              Submit</button>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="card border shadow-none">
                  <div class="card-body  ">
                    <h5>Revenue Collected Offline VS Online</h5>
                    <div class="chart-area">
                      <canvas id="myChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card border shadow-none">
                  <div class="card-body ">
                    <h5>Revenue W.R. Categories</h5>
                    <div class="chart-area">
                      <canvas id="lol"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>



  </div>

</main>







<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</body>

</html>