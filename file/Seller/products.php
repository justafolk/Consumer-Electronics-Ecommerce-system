<?php $file="products.php";  include "header.php";?>
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
    <br>
    
    <!-- tab layout for add seller, seller lookup, inventory requests -->

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
          role="tab" aria-controls="home" aria-selected="true">View Inventory</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
          role="tab" aria-controls="profile" aria-selected="false">Request Inventory</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button"
          role="tab" aria-controls="requestop" aria-selected="false">Product Sales</button>
      </li>

    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">


                <h5>Current Inventory</h5>
                <p>Orders in the given time.</p>
                <!-- from date to date -->



                <div class="d-flex form-inputs">
                  <h6>Search Products
                  </h6>
                  <input class="form-control" type="text" placeholder="Search any product...">
                  <i class="bx bx-search"></i>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body ">
                        <div class="table-responsive">

                          <table class="table ">
                            <thead>
                              <th>Product Details</th>
                              <th>Category</th>
                              <th>Available Stock</th>
                              <th>Price</th>
                              <th>Action</th>

                            </thead>
                            <tbody>
                              <tr>
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
                                  Earpones / Audio
                                </td>
                                <td>
                                  234
                                </td>
                                <td>6700</td>
                                <th>
                                  <button class="btn btn-sm" style="background-color: grey; color: white;">View More
                                  </button>
                                </th>
                              </tr>
                              <tr>
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
                                  Earpones / Audio
                                </td>
                                <td>
                                  234
                                </td>
                                <td>6700</td>
                                <th>
                                  <button class="btn btn-sm" style="background-color: grey; color: white;">View More
                                  </button>
                                </th>
                              </tr>
                              <tr>
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
                                  Earpones / Audio
                                </td>
                                <td>
                                  234
                                </td>
                                <td>6700</td>
                                <th>
                                  <button class="btn btn-sm" style="background-color: grey; color: white;">View More
                                  </button>
                                </th>
                              </tr>
                              <tr>
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
                                  Earpones / Audio
                                </td>
                                <td>
                                  234
                                </td>
                                <td>6700</td>
                                <th>
                                  <button class="btn btn-sm" style="background-color: grey; color: white;">View More
                                  </button>
                                </th>
                              </tr>
                              <tr>
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
                                  Earpones / Audio
                                </td>
                                <td>
                                  234
                                </td>
                                <td>6700</td>
                                <th>
                                  <button class="btn btn-sm" style="background-color: grey; color: white;">View More
                                  </button>
                                </th>
                              </tr>







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
        </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <!-- search bar -->
        <div class="card">
          <div class="card-body">
            <h5>Request Inventory</h5>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>
                          Product Name
                        </th>
                        <th>
                          Cost Price
                        </th>
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
                      <tr>
                        <th>
                          1
                        </th>
                        <td>
                          <input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter Product Name">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="product_price" name="product_price"
                            placeholder=" Price">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                            placeholder=" Quantity">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="total" name="total" placeholder=" Total">
                        </td>
                        <td>
                          <button type="button" class="btn"
                            style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                            Add
                          </button>
                          <button type="button" class="btn"
                            style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                            Remove
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          2
                        </th>
                        <td>
                          <input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter Product Name">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="product_price" name="product_price"
                            placeholder=" Price">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                            placeholder=" Quantity">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="total" name="total" placeholder=" Total">
                        </td>
                        <td>
                          <button type="button" class="btn"
                            style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                            Add
                          </button>
                          <button type="button" class="btn"
                            style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                            Remove
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          3
                        </th>
                        <td>
                          <input type="text" class="form-control" id="product_name" name="product_name"
                            placeholder="Enter Product Name">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="product_price" name="product_price"
                            placeholder=" Price">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="product_quantity" name="product_quantity"
                            placeholder=" Quantity">
                        </td>
                        <td>
                          <input type="text" class="form-control" id="total" name="total" placeholder=" Total">
                        </td>
                        <td>
                          <button type="button" class="btn"
                            style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                            Add
                          </button>
                          <button type="button" class="btn"
                            style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                            Remove
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>
                          Subtotal
                        </th>
                        <td>193081</td>
                      </tr>


                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <th>
                          Grand total
                        </th>
                        <td>
                          Rs 242,252/-
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- add row button -->
                  <button type="button" class="btn"
                    style="color: #e9e9fe; background-color: #312e65; border-color: #e9e9fe; height: 20%;">
                    +
                  </button>

                </div>
              </div>
            </div>

          </div>
        </div>


      </div>
      <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
        <div class="card">
          <div class="card-body">
            <!-- Sales with respect to category -->
            <h4>Product Sales Analysis</h4>

            <!-- from date to date -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="from_date">From Date</label>
                  <input type="date" class="form-control" id="from_date" name="from_date">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="to_date">To Date</label>
                  <input type="date" class="form-control" id="to_date" name="to_date">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                    <h5>Revenue Collected Offline VS Online</h5>
                    <div class="chart-area">
                      <canvas id="myChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
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

  </main>







  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
  <script src="../dashboard.js"></script>
</body>

</html>