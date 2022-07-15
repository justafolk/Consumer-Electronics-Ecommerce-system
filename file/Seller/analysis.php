<?php $file = "analysis.php";
include "header.php" ?>
<?php
function verify_delivery($track_id)
{
  include "../login.dbh.php";
  $status = explode("\n", `python3 ./requests_track.py $track_id`)[0];
  if (strpos($status, 'Successfully Delivered') !== false) {
    $sql = "UPDATE OrderDB SET Order_status = 'delivered' WHERE Tracking_id = '$track_id'";
    $result = mysqli_query($conn, $sql);
    echo mysqli_error($conn);
    return true;
  }
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <button type="button" class="btn shadow-none border dropdown-toggle">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar" aria-hidden="true">
        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
        <line x1="16" y1="2" x2="16" y2="6"></line>
        <line x1="8" y1="2" x2="8" y2="6"></line>
        <line x1="3" y1="10" x2="21" y2="10"></line>
      </svg>
      Sort by / Filter
    </button>
    <h1 class="h2">Data Analysis </h1>
    <div class="btn-toolbar mb-2 mb-md-0 shadow-none ">
      <div class="btn-group me-2 shadow-none ">
        <button type="button" class="btn shadow-none border">Export</button>

      </div>
      <div class="btn-group me-2 shadow-none ">
        <button type="button" class="btn shadow-none border">Date by</button>

      </div>
    </div>

  </div>
  <div class="row mx-0 my-3 ">




    <div class="card border " id="new_orders" style="border-radius: 0px, 0px, 5px,5px; ">
      <div class="card-body" style="justify-content: center; align-items:center;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Product Analysis</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="unshipped-tab" data-bs-toggle="tab" data-bs-target="#unshipped" type="button" role="tab" aria-controls="unshipped" aria-selected="false">Seller Analysis</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="shipped-tab" data-bs-toggle="tab" data-bs-target="#shipped" type="button" role="tab" aria-controls="shipped" aria-selected="false">Marketing Analysis</button>
          </li>
        


        </ul>
        <br>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
            <div class="row">
              <div class="col-3">

                <h4>Product Analysis</h4>
              </div>
              <div class="col-9">
                <!-- search bar -->
                <form action="" method="get">
                <div class="input-group">

                    <input type="text" class="form-control" name="Prod_id" id="Prod_id" placeholder="Search Product ID or title">
                    <span class="input-group-btn">
                      <button class="btn btn-ecomm btn-dark" style="height: 100%;border-radius: 0px 5px 5px 0px;" type="submit">Go!</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <br>
            <?php if (isset($_GET["Prod_id"])) { ?>
              <div class="row">
                <div class="col-md-3">
                  <div class="card border-left-primary shadow-none border h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Product Hits
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            2563
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card border-left-success  h-100 border py-2 shadow-none">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Purchasers Count </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card border-left-success  h-100 py-2 border shadow-none">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Sales</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rs. 13,523/-
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card border-left-success  h-100 py-2 border shadow-none">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Average Customer
                            Rating</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">4.7</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row my-2" style="padding-right: 0px;">

                  <div class="col-md-12" style="padding-right: 0px;">
                    <div class="card  border shadow-none" style="width:100%">
                      <div class="card-body  shadow-none">
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>

                              <?php
                              include "../login.dbh.php";
                              $sql = "select * from productdb where Prod_id={$_GET["Prod_id"]}";
                              $results = mysqli_query($conn, $sql);
                              $row = mysqli_fetch_assoc($results);

                              ?>
                              <tr>

                                <th>Product ID</th>
                                <td><?php echo $row["Prod_id"] ?></td>
                              </tr>
                              <tr>

                                <th>Title</th>
                                <td><?php echo $row["title"] ?></td>
                              </tr>
                              <tr>

                                <th>Launch Date</th>
                                <td><?php echo $row["launch_d"] ?></td>
                              </tr>
                              <tr>

                                <th>Description</th>
                                <td><?php echo $row["description"] ?></td>
                              </tr>
                              <tr>

                                <th>Price</th>
                                <td>Rs. <?php echo number_format($row["price"]) ?>/-</td>
                              </tr>
                              <tr>

                                <th>Hits</th>
                                <td><?php echo $row["hits"] ?></td>
                              </tr>
                              <tr>

                                <th>Category</th>
                                <td><?php echo $row["category"] ?></td>
                              </tr>
                              <tr>

                                <th>Tags</th>
                                <td>
                                  <div class="tags-box ">

                                    <?php
                                    $tags = explode("&", $row["Tags"]);
                                    foreach ($tags as $key => $value) {
                                      echo "<span class=\"badge badge-success\"> {$value} </span> ";
                                    }
                                    ?> </div>
                                </td>
                              </tr>
                              <tr>

                                <th>MRP Price</th>
                                <td>Rs. <?php echo number_format($row["mrp_price"]) ?>/-</td>
                              </tr>
                              <tr>

                                <th>Brand</th>
                                <td><?php echo $row["brand"] ?></td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="card shadow-none border">
                      <div class="card-body">
                        <h5>Buy Count Across Country</h5>
                        <script src="https://www.amcharts.com/lib/4/core.js"></script>
                        <script src="https://www.amcharts.com/lib/4/maps.js"></script>
                        <script src="https://www.amcharts.com/lib/4/geodata/india2019High.js"></script>
                        <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
                        <div id="chartdiv" style=" width: 100%;align-items: center; justify-content: center;height: 500px;"></div>
                      </div>
                    </div>

                  </div>
                  <div class="col-6">

                    <div class="card shadow-none border">
                      <div class="card-body">
                        <h5>Customers Online vs Offline</h5>
                        <div class="chart-area">
                          <canvas id="myChart3"></canvas>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="card shadow-none border">
                      <div class="card-body">
                        <h5>Website Hits</h5>
                        <div class="chart-area">
                          <canvas id="lol"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>

          <div class="tab-pane fade " id="unshipped" role="tabpanel" aria-labelledby="unshipped-tab">
            <div class="row">
              <div class="col-3">

                <h4>Seller Analysis</h4>
              </div>
              <div class="col-9">
                <form action="" method="get">
                <div class="input-group">

                    <input type="text" name="s_id" id="s_id" class="form-control" placeholder="Search Product ID or title">
                    <span class="input-group-btn">
                      <button class="btn btn-ecomm btn-dark" style="height: 100%;border-radius: 0px 5px 5px 0px;" type="submit">Go!</button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <br>
            <?php if (isset($_GET["s_id"])) { ?>

              <div class="row">
                <div class="col-md-3">
                  <div class="card border-left-primary shadow-none border h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Orders Shipped
                          </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            2563
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card border-left-success  h-100 border py-2 shadow-none">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Revenue </div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card border-left-success  h-100 py-2 border shadow-none">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Average Customer Rating</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            Rs. 13,523/-
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card border-left-success  h-100 py-2 border shadow-none">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Partner Since</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">3.5 yrs </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row my-2" style="padding-right: 0px;">

                  <div class="col-md-12" style="padding-right: 0px;">
                    <div class="card  border shadow-none" style="width:100%">
                      <div class="card-body  shadow-none">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row my-3">
                              <div class="col-md-5">

                              </div>
                              <div class="col-md-4">
                                <?php
                                include "../login.dbh.php";
                                $sql = "select * from seller where seller_id={$_GET["s_id"]}";
                                $results = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($results);
                                $array = $row['seller_name'];
                                $split = explode(" ", $array);
                                ?>
                                <img src="https://ui-avatars.com/api/name=<?php echo $split[0]; ?>+<?php echo $split[1]; ?>?rounded=true" alt="Avatar" class="img-fluid">
                              </div>
                            </div>
                            <br>
                            <div class="table-responsive mx-3">
                              <table class="table">
                                <tbody>
                                  <tr>
                                    <th>Seller ID: </th>
                                    <td>SID <?php echo $row['seller_id'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Seller Name: </th>
                                    <td><?php echo $row['seller_name'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Seller Address: </th>
                                    <td><?php echo $row['seller_address'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Seller Phone: </th>
                                    <td>+91 <?php echo $row['seller_phone'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Store Name: </th>
                                    <td><?php echo $row['store_name'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Store Location: </th>
                                    <td><?php echo $row['store_location'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Date: </th>
                                    <td><?php echo $row['date'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Seller Verification Status: </th>
                                    <td style="color: green;"><?php echo $row['seller_verification'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Average Customer Rating: </th>
                                    <td style="color: gold;"><?php echo $row['rating'] ?> <i class="fa-solid fa-star"></i></td>
                                  </tr>
                                  <tr>
                                    <th>Total offline Revenue: </th>
                                    <td>Rs. <?php echo $row['tot_off_rev'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Total Online Revenue: </th>
                                    <td>Rs. <?php echo $row['tot_onli_rev'] ?></td>
                                  </tr>
                                  <tr>
                                    <th>Partnership Timeline: </th>
                                    <td>2 years, 4 months</td>
                                  </tr>
                                  <tr>
                                    <th>Total Customers Served: </th>
                                    <td><?php echo $row['tot_cus_ser'] ?></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>

                          </div>
                          <div class="col-md-6" style="justify-content: center; align-items:center">
                            <div class="col-12">
                              <div class="card shadow-none border">
                                <div class="card-body">
                                  <h5>Orders Dispatched Across Country</h5>
                                  <script src="https://www.amcharts.com/lib/4/core.js"></script>
                                  <script src="https://www.amcharts.com/lib/4/maps.js"></script>
                                  <script src="https://www.amcharts.com/lib/4/geodata/india2019High.js"></script>
                                  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
                                  <div id="chartdiv" style=" width: 100%;align-items: center; justify-content: center;height: 425px;"></div>
                                </div>
                              </div>

                            </div>
                            <div class="row my-5">
                              <div class="col-md-12">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="background-color: black;">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img class="d-block w-100" src="https://thumbs.dreamstime.com/b/electronics-store-inside-best-denki-singapore-featuring-vacuum-cleaners-floor-cleaning-robots-95676677.jpg" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="https://www.researchgate.net/profile/Charles-Overstreet/publication/221274472/figure/fig2/AS:451161766535169@1484576755709/Sample-source-code.png" alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="https://cloudfour.com/examples/img-currentsrc/images/kitten-small.png" alt="Third slide">
                                    </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>
                              </div>

                            </div>


                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="row">

                  <div class="col-6">

                    <div class="card shadow-none border">
                      <div class="card-body">
                        <h5>Customers Online vs Offline</h5>
                        <div class="chart-area">
                          <canvas id="myChart3"></canvas>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="card shadow-none border">
                      <div class="card-body">
                        <h5>Website Hits</h5>
                        <div class="chart-area">
                          <canvas id="lol"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="tab-pane fade " id="shipped" role="tabpanel" aria-labelledby="shipped-tab">
            <div class="row">
              <div class="col-3">

                <h4>Marketing Analysis</h4>
              </div>

            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="card border-left-primary shadow-none border h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Traffic Count
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          2563
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card border-left-success  h-100 border py-2 shadow-none">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Purchase Influenced </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card border-left-success  h-100 py-2 border shadow-none">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Coupons Used</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          Rs. 13,523/-
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card border-left-success  h-100 py-2 border shadow-none">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Discount given</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">3.5 yrs </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row my-2" style="padding-right: 0px;">

                <div class="col-md-12" style="padding-right: 0px;">
                  <div class="row">

                    <div class="col-md-6" style="justify-content: center; align-items:center">
                      <div class="col-12">
                        <div class="card shadow-none border">
                          <div class="card-body">
                            <h5>Orders Dispatched Across Country</h5>
                            <script src="https://www.amcharts.com/lib/4/core.js"></script>
                            <script src="https://www.amcharts.com/lib/4/maps.js"></script>
                            <script src="https://www.amcharts.com/lib/4/geodata/india2019High.js"></script>
                            <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
                            <div id="chartdiv" style=" width: 100%;align-items: center; justify-content: center;height: 500px;"></div>
                          </div>
                        </div>

                      </div>



                    </div>
                    <div class="col-md-6">


                      <div class="card shadow-none border">
                        <div class="card-body">
                          <h5>Customers Online vs Offline</h5>
                          <div class="chart-area">
                            <canvas id="social_media"></canvas>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="card shadow-none border">
                        <div class="card-body">
                          <h5>Website Hits</h5>
                          <div class="chart-area">
                            <canvas id="lol"></canvas>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>

              </div>
              <div class="row">

              </div>
            </div>
          </div>
          <div class="tab-pane fade " id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <div class="row">
              <div class="col-md-5">

                <h4>Customer Analysis</h4>
              </div>


            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card border-left-primary shadow-none border h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Traffic Count
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          2563
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card border-left-success  h-100 border py-2 shadow-none">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Purchase Influenced </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card border-left-success  h-100 py-2 border shadow-none">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Coupons Used</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          Rs. 13,523/-
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="card border-left-success  h-100 py-2 border shadow-none">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Discount given</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">3.5 yrs </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="row my-2" style="padding-right: 0px;">

                <div class="col-md-12" style="padding-right: 0px;">
                  <div class="row">

                    <div class="col-md-6" style="justify-content: center; align-items:center">
                      <div class="col-12">
                        <div class="card shadow-none border">
                          <div class="card-body">
                            <h5>Orders Dispatched Across Country</h5>
                            <script src="https://www.amcharts.com/lib/4/core.js"></script>
                            <script src="https://www.amcharts.com/lib/4/maps.js"></script>
                            <script src="https://www.amcharts.com/lib/4/geodata/india2019High.js"></script>
                            <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
                            <div id="chartdiv" style=" width: 100%;align-items: center; justify-content: center;height: 500px;"></div>
                          </div>
                        </div>

                      </div>



                    </div>
                    <div class="col-md-6">


                      <div class="card shadow-none border">
                        <div class="card-body">
                          <h5>Customers Online vs Offline</h5>
                          <div class="chart-area">
                            <canvas id="social_media"></canvas>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="card shadow-none border">
                        <div class="card-body">
                          <h5>Website Hits</h5>
                          <div class="chart-area">
                            <canvas id="lol"></canvas>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>

                </div>

              </div>
              <div class="row">

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>

</main>
<script>
  // here theme begins
  am4core.useTheme(am4themes_animated);
  // Themes end here

  // creating map instance
  let chart = am4core.create("chartdiv", am4maps.MapChart);

  // setting definition of map
  chart.geodata = am4geodata_india2019High;


  // this is map polygon 
  let polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

  //Set min/max fill color for each area
  polygonSeries.heatRules.push({
    property: "fill",
    target: polygonSeries.mapPolygons.template,
    min: chart.colors.getIndex(1).brighten(-0.3),
    max: chart.colors.getIndex(1).brighten(-0.3)
  });

  // Make map load polygon data (state shapes and names) from GeoJSON
  polygonSeries.useGeodata = true;

  // Set values for each state
  polygonSeries.data = [{
      id: "IN-JK",
      value: 0
    },
    {
      id: "IN-MH",
      value: 4243
    },
    {
      id: "IN-UP",
      value: 0
    },
    {
      id: "US-AR",
      value: 0
    },
    {
      id: "IN-RJ",
      value: 0
    },
    {
      id: "IN-AP",
      value: 0
    },
    {
      id: "IN-MP",
      value: 0
    },
    {
      id: "IN-TN",
      value: 0
    },
    {
      id: "IN-JH",
      value: 0
    },
    {
      id: "IN-WB",
      value: 0
    },
    {
      id: "IN-GJ",
      value: 0
    },
    {
      id: "IN-BR",
      value: 0
    },
    {
      id: "IN-TG",
      value: 0
    },
    {
      id: "IN-GA",
      value: 0
    },
    {
      id: "IN-DN",
      value: 0
    },
    {
      id: "IN-DL",
      value: 0
    },
    {
      id: "IN-DD",
      value: 0
    },
    {
      id: "IN-CH",
      value: 0
    },
    {
      id: "IN-CT",
      value: 0
    },
    {
      id: "IN-AS",
      value: 0
    },
    {
      id: "IN-AR",
      value: 0
    },
    {
      id: "IN-AN",
      value: 0
    },
    {
      id: "IN-KA",
      value: 0
    },
    {
      id: "IN-KL",
      value: 0
    },
    {
      id: "IN-OR",
      value: 0
    },
    {
      id: "IN-SK",
      value: 0
    },
    {
      id: "IN-HP",
      value: 0
    },
    {
      id: "IN-PB",
      value: 0
    },
    {
      id: "IN-HR",
      value: 0
    },
    {
      id: "IN-UT",
      value: 0
    },
    {
      id: "IN-LK",
      value: 0
    },
    {
      id: "IN-MN",
      value: 0
    },
    {
      id: "IN-TR",
      value: 0
    },
    {
      id: "IN-MZ",
      value: 0
    },
    {
      id: "IN-NL",
      value: 0
    },
    {
      id: "IN-ML",
      value: 0
    }
  ];



  // hover and detail tool
  let polygonTemplate = polygonSeries.mapPolygons.template;
  polygonTemplate.tooltipText = "{name}: {value}";
  polygonTemplate.nonScalingStroke = true;

  // Create hover state and set alternative fill color
  let hs = polygonTemplate.states.create("hover");
  hs.properties.fill = am4core.color("#0A285D");
</script>

</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script>
  (function() {
    var ctx = document.getElementById('social_media').getContext('2d');
    // eslint-disable-next-line no-unused-vars
    var social_media = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],

        datasets: [{
            label: 'Instagram',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1,
            backgroundColor: 'rgb(75, 192, 192)',
          },
          {
            label: 'Google AdSense',
            data: [28, 48, 40, 19, 86, 27, 90],
            fill: false,
            borderColor: 'rgb(200, 0,0)',
            tension: 0.1
          },
          {
            label: 'News Paper',
            data: [36, 55, 43, 12, 76, 32, 35],
            fill: false,
            borderColor: 'rgb(0, 255,0)',
            tension: 0.1
          },
          {
            label: 'Email Marketing',
            data: [25, 43, 53, 60, 34, 67, 23],
            fill: false,
            borderColor: 'rgb(0, 255, 255)',
            tension: 0.1
          }
        ]
      },

      options: {

        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
  })();

  (function() {
    'use strict'

    feather.replace({
      'aria-hidden': 'true'
    })

    // Graphs
    var ctx = document.getElementById('myChart3').getContext('2d');
    // eslint-disable-next-line no-unused-vars
    var myChart3 = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],

        datasets: [{
            label: 'Ecommerce',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1,
            backgroundColor: 'rgb(75, 192, 192)',
          },
          {
            label: 'In-Store Purchase',
            data: [28, 48, 40, 19, 86, 27, 90],
            fill: false,
            borderColor: 'rgb(200, 0,0)',
            tension: 0.1
          }
        ]
      },

      options: {

        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
  })();

  (function() {
    'use strict'

    feather.replace({
      'aria-hidden': 'true'
    })

    var ctx2 = document.getElementById('lol').getContext('2d');
    var lol = new Chart(ctx2, {
      // The type of chart we want to create
      type: 'doughnut',

      // The data for our dataset
      data: {
        labels: [
          'Instagram',
          'Facebook',
          'Google Adsense',
        ],
        datasets: [{

          label: 'Website Hit Sources',
          data: [300, 50, 100],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
          ],
          hoverOffset: 4
        }]
      },

      // Configuration options go here
      options: {}
    });
  })();
</script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script>

</script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</body>

</html>