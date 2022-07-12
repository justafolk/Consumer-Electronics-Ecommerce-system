<?php
    

?>
<?php include 'header.php' ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">

    <br>
    <!-- tab layout for add seller, seller lookup, inventory requests -->

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Add Products</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Update Products</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">View Products</button>
        </li>

        <li class="nav-item" role="presentation">
            <button class="nav-link" id="performanceop-tab" data-bs-toggle="tab" data-bs-target="#performanceop" type="button" role="tab" aria-controls="performanceop" aria-selected="false">Public Reviews</button>
        </li>
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">


                            <h5>Add Products</h5>
                            <p>Add new products to your inventory</p>
                            <form action="addproduct.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="productname">Product Title</label>
                                    <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="Enter Product Name" name="productname">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="productdesc">Product Description</label>
                                    <textarea type="text" class="form-control" id="productdesc" aria-describedby="emailHelp" placeholder="Enter Product Description" name="productdesc">
                                        </textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="productspecs">Product Specifications</label>
                                    <textarea type="text" class="form-control" id="productspecs" aria-describedby="emailHelp" placeholder="Enter Product Specifications" name="productspecs">
                                        </textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="productprice">Product Price</label>
                                    <input type="text" class="form-control" id="productprice" aria-describedby="emailHelp" placeholder="Enter Product Price" name="productprice" value="(₹)">
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="productcategory">Product Category</label>
                                    <input type="text" class="form-control" id="productcategory" aria-describedby="emailHelp" placeholder="Enter Product Category" name="productcategory">
                                </div>
                                <br>
                                <script>

                                </script>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <p>Upload Images</p>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image1" onchange="loadFile1(event)">
                                            <br>

                                            <img id="output1" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image2" onchange="loadFile2(event)">
                                            <br>

                                            <img id="output2" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image3" onchange="loadFile3(event)">
                                            <br>

                                            <img id="output3" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image4" name="image4" id="image4" onchange="loadFile4(event)">
                                            <br>

                                            <img id="output4" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image5" name="image5" id="image5" onchange="loadFile5(event)">
                                            <br>

                                            <img id="output5" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image6" name="image6" id="image6" onchange="loadFile6(event)">
                                            <br>

                                            <img id="output6" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>

                            </form>

                            <script>
                                <?php
                                for ($i = 1; $i <= 6; $i++) {
                                    # code...
                                    echo "var loadFile$i = function (event) {
                                            var output = document.getElementById(\"output$i\");
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function () {
                                                URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };";
                                }
                                ?>
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <!-- search bar -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Product ID or title">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">


                            <h5>Update Product Details</h5>
                            <p>Update Existing products in your inventory</p>
                            <form action="addproduct.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="productname">Product Title</label>
                                    <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="Enter Product Name" name="productname" value="Realme XT">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="productname">Product Description</label>
                                    <textarea type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="Enter Product Description" name="productdesc">
                                        </textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="productname">Product Price</label>
                                    <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="Enter Product Price" name="productprice" value="(₹)">
                                </div>

                                <br>
                                <div class="form-group">
                                    <label for="productname">Product Category</label>
                                    <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="Enter Product Category" name="productcategory">
                                </div>
                                <br>
                                <script>

                                </script>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <p>Upload Images</p>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                            <br>

                                            <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                            <br>

                                            <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                            <br>

                                            <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                            <br>

                                            <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                                            <br>

                                            <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            asdmk
                                            <input type="file" class="form-control" accept="image/*" onchange="loadFile(event, 'output2')">
                                            <br>
                                            asdjis


                                            <img id="output" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Submit</button>

                            </form>

                            <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src) // free memory
                                    }
                                };
                            </script>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Product ID or title">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Title</th>
                                            <th>Product Description</th>
                                            <th>Product Price</th>
                                            <th>Product Category</th>
                                            <th>Product Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Product 1</td>
                                            <td>Product 1 Description</td>
                                            <td>₹100</td>
                                            <td>Category 1</td>
                                            <td>Active</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Product 2</td>
                                            <td>Product 2 Description</td>
                                            <td>₹200</td>
                                            <td>Category 2</td>
                                            <td>Active</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Product 3</td>
                                            <td>Product 3 Description</td>
                                            <td>₹300</td>
                                            <td>Category 3</td>
                                            <td>Active</td>
                                            <td>
                                                <button type="button" class="btn btn-primary">Edit</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="performanceop" role="tabpanel" aria-labelledby="performanceop-tab">
            <div class="card">
                <div class="card-body">
                    <h4>Public Reviews</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Product ID or title">
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

</main>


<script src="../dashboard.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</script>
</body>

</html>