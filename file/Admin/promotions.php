<?php include "./header.php"; ?>
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

    <br>
    <div class="row mx-0 my-2">

        <div class="card border">
            <div class="card-body ">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Add Promotion</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Update Promotion</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">View Promotions</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="performanceop-tab" data-bs-toggle="tab" data-bs-target="#performanceop" type="button" role="tab" aria-controls="performanceop" aria-selected="false">Public
                            Response</button>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-12">


                                <h4>Add Promotions</h4>
                                <p>Add promotions to home page.</p>
                                <form action="addproduct.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Name" name="productname">
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <p>Upload Main Promotional Cover.</p>
                                        <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                        <br>

                                        <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <!-- add a select tag for primary, secondary and categorical options -->
                                        <label for="exampleFormControlSelect1">Promotion Type</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="producttype">
                                            <option value="primary">Primary</option>
                                            <option value="secondary">Secondary</option>
                                            <option value="categorical">Categorical</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Description</label>
                                        <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Description" name="productdesc">
                                        </textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion target Categories (separate by
                                            commas)</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Price" name="productprice" value="(₹)">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Link </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Price" name="productprice" value="">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion T&C document.</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Discount percentage.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Discount percentage" name="productcategory">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Maximum Discount.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Max Applicable Discount" name="productcategory">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Active Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Expiration Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory">
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <script>

                                    </script>
                                    <input type="button" class="btn btn-primary" value=" Submit">
                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- search bar -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Promotion ID or title">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">


                                <h5>Update Promotions</h5>
                                <p>Update Existing Promotions.</p>
                                <form action="addproduct.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Name" name="productname">
                                    </div>
                                    <br>
                                    <p>Upload Main Promotional Cover.</p>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                                <br>

                                                <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Description</label>
                                        <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Description" name="productdesc">
                                    </textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion target Categories (separate by
                                            commas)</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Price" name="productprice" value="">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion T&C document.</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Discount percentage.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Discount percentage" name="productcategory">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Maximum Discount.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Max Applicable Discount" name="productcategory">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Active Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Expiration Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory">
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <script>

                                    </script>
                                    <input type="button" class="btn btn-primary" value=" Submit">
                                </form>
                            </div>


                        </div>

                    </div>

                    <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Promotion ID or title">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Promotion ID</th>
                                                <th>Promotion Title</th>
                                                <th>Promotion Description</th>
                                                <th>Promotion Category</th>
                                                <th>Promotion Price</th>
                                                <th>Promotion Discount</th>
                                                <th>Promotion Discount Max</th>
                                                <th>Promotion Active Date</th>
                                                <th>Promotion Expiration Date</th>
                                                <th>Promotion Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>PROMO-001</td>
                                                <td>Promotion Title</td>
                                                <td>Promotion Description</td>
                                                <td>Promotion Category</td>
                                                <td>Promotion Price</td>
                                                <td>Promotion Discount</td>
                                                <td>Promotion Discount Max</td>
                                                <td>Promotion Active Date</td>
                                                <td>Promotion Expiration Date</td>
                                                <td>Promotion Status</td>
                                                <td>
                                                    <button class="btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>PROMO-001</td>
                                                <td>Promotion Title</td>
                                                <td>Promotion Description</td>
                                                <td>Promotion Category</td>
                                                <td>Promotion Price</td>
                                                <td>Promotion Discount</td>
                                                <td>Promotion Discount Max</td>
                                                <td>Promotion Active Date</td>
                                                <td>Promotion Expiration Date</td>
                                                <td>Promotion Status</td>
                                                <td>
                                                    <button class="btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>PROMO-001</td>
                                                <td>Promotion Title</td>
                                                <td>Promotion Description</td>
                                                <td>Promotion Category</td>
                                                <td>Promotion Price</td>
                                                <td>Promotion Discount</td>
                                                <td>Promotion Discount Max</td>
                                                <td>Promotion Active Date</td>
                                                <td>Promotion Expiration Date</td>
                                                <td>Promotion Status</td>
                                                <td>
                                                    <button class="btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="performanceop" role="tabpanel" aria-labelledby="performanceop-tab">
                        <h4>Public Reviews</h4>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter Promotion ID or title">
                                            <span class="input-group-btn">
                                                <button class="btn btn-secondary" type="button">Go!</button>
                                            </span>
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