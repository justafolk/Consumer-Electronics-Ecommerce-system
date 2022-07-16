<head>
    <link href="../assets/css/icons.css" rel="stylesheet">
</head>
<?php
include 'db.php';
function upload($conn, $image1s, $name, $description, $specs, $price, $category)
{
    require_once "db.php";
    $error = "";
    $sql = " INSERT INTO productdb(image_loc, title, description, specification, price, category) VALUES (?,?,?,?,?,?)";
    $smt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($smt, $sql)) {
        $error .= "Error in STMT";
        exit();
    }
    mysqli_stmt_bind_param($smt, "ssssis", $image1s, $name, $description, $specs, $price, $category,);
    mysqli_stmt_execute($smt);
    mysqli_stmt_close($smt);
    $error .= "Product Added Successfully";
    return $error;
}

function change($conn, $name, $description, $specs, $price, $category, $prod_id)
{
    require_once "db.php";
    $error = "";
    $sql = "update productdb set title = ?, description = ?, specification = ?, price = ?, category = ? where Prod_id = ?;";
    $smt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($smt, $sql)) {
        $error .= "Error in STMT";
        exit();
    }
    mysqli_stmt_bind_param($smt, "sssisi", $name, $description, $specs, $price, $category, $prod_id);
    mysqli_stmt_execute($smt);
    mysqli_stmt_close($smt);
    $error .= "Product Updated Successfully";
    return $error;
}

function Randomnumber($length = 1)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function RandomString($length = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function remove($conn, $prod_id)
{
    require_once "db.php";
    $error = "";
    $sql = "delete from productdb where Prod_id = $prod_id";
    $smt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($smt, $sql)) {
        $error .= "Error in STMT";
        exit();
    }
    mysqli_stmt_execute($smt);
    mysqli_stmt_close($smt);
    $error .= "Product Deleted Successfully";
    return $error;
}
if (isset($_POST['submit1'])) {
    $id = $_POST['prod_id'];
    $name = $_POST['productname'];
    $description = $_POST['productdesc'];
    $specs = $_POST['productspecs'];
    $price = $_POST['productprice'];
    $category = $_POST['productcategory'];
    // $image = $_POST["image"];
    // $image1s = "";

    // $img = explode('&', $image);
    // $temp = explode("/", $img[0]);
    // $count = count($temp);
    // for($i=0;$i<$count-1;$i++){
    //     $location .= "$temp[$i]/";
    // }
    // $image1 = $_FILES["image1"]["name"];

    // try{
    //     $location = "";
    //     $img = explode("&", $image);
    //     $temp = explode("/", $img[0]);
    //     $count = count($temp);
    //     for($i=0;$i<$count-1;$i++){
    //         $location .= "$temp[$i]/";
    //     }
    //     echo $location;
    //     for ($i=1; $i <= 6 ; $i++) { 
    //         if(isset($_FILES["image$i"])){
    //             $image1 = $_FILES["image$i"]["name"];
    //             $tmp1 = $_FILES["image$i"]['tmp_name'];

    //             echo $image1;

    //             $fileExt = explode(".", $image1);
    //             $fileActualExt = strtolower(end($fileExt));
    //             // echo $fileActualExt."\n";

    //             echo $image1;
    //             $fileNameNew = RandomString(6).".".$fileActualExt;
    //             // echo $fileNameNew."\n";

    //             $target1 = "../$location/".$fileNameNew;
    //             // echo $target1."\n";
    //             // echo $target1;

    //             move_uploaded_file($tmp1, $target1);
    //             if($image1 != NULL){
    //                 $image1s .= "&"."$location".$fileNameNew;
    //             }
    //         }
    //     }
    // $image .= $image1s;
    $sql = change($conn, $name, $description, $specs, $price, $category, $id);
    // $result = mysqli_query($conn, $sql);
}
if (isset($_POST['submit'])) {
    $name = $_POST['productname'];
    $description = $_POST['productdesc'];
    $specs = $_POST['productspecs'];
    $price = $_POST['productprice'];
    $category = $_POST['productcategory'];
    $image1s = "";
    // $image1 = $_FILES["image1"]["name"];
    try {
        $random_file = RandomString();
        mkdir("../assets/images/Upload/$category/" . $random_file);
        for ($i = 1; $i <= 6; $i++) {
            if (isset($_FILES["image$i"])) {
                $image1 = $_FILES["image$i"]["name"];
                $tmp1 = $_FILES["image$i"]['tmp_name'];
                $target1 = "../assets/images/Upload/$category/$random_file/" . basename($image1);
                move_uploaded_file($tmp1, $target1);
                if ($i == 1) {
                    $image1s = "assets/images/Upload/$category/$random_file/" . $image1;
                } elseif ($image1 != NULL) {
                    $image1s .= "&assets/images/Upload/$category/$random_file/" . $image1;
                }
            }
        }
        $sql = upload($conn, $image1s, $name, $description, $specs, $price, $category);
        // $result = mysqli_query($conn, $sql);
    } catch (Exception $e) {
        echo $e;
    }
}
$row = "";
$num_rows = 0;
$products = "";
$sql = "SELECT * FROM productdb";
$smt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($smt, $sql)) {
    echo "Output not show";
    exit();
}
mysqli_stmt_execute($smt);
$c = 0;
$resultData = mysqli_stmt_get_result($smt);
$num_rows = mysqli_num_rows($resultData);
while ($row = mysqli_fetch_assoc($resultData)) {
    $product[$c] = $row;
    $products = $product;
    $c++;
}
?>
<?php include 'header.php' ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
        <h1 class="h2">Manage Products and Inventory </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2 shadow-none border">
                <button type="button" class="btn shadow-none border">Export</button>
            </div>
            <button type="button" class="btn shadow-none border dropdown-toggle">
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
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Add Products</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">View Products</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Update Products</button>
                </li>
             

             
            </ul>
            <br>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-12">


                            <h5>Add Products</h5>
                            <p>Add new products to your inventory</p>
                            <form action="" method="post" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="productprice" aria-describedby="emailHelp" placeholder="Enter Product Price" name="productprice" value="">
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
                                            <input type="file" class="form-control" accept="image/*" class="image1" name="image1" onchange="loadFile1(event)">
                                            <br>

                                            <img id="output1" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image2" name="image2" onchange="loadFile2(event)">
                                            <br>

                                            <img id="output2" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" class="form-control" accept="image/*" class="image3" name="image3" onchange="loadFile3(event)">
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- search bar -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Product ID or title">
                                        <span class="input-group-btn">
                                            <button class="btn btn-ecomm btn-dark" style="height: 100%;border-radius: 0px 5px 5px 0px;" type="button">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <h5>Update Product Details</h5>
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>P_ID</th>
                                                <th>Product Title</th>
                                                <th>Product Price</th>
                                                <th>Buy Count</th>
                                                <th>Product Category</th>
                                                <th>Product Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < $num_rows; $i++) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $products[$i]['Prod_id']; ?></td>
                                                    <td><?php echo $products[$i]['title']; ?></td>
                                                    <td>Rs. <?php echo number_format($products[$i]['price']); ?></td>
                                                    <td><?php echo $products[$i]['buy_count']; ?> units</td>
                                                    <td><?php echo $products[$i]['category']; ?></td>
                                                    <td>Active</td>
                                                    <td>
                                                        <!-- <button class="nav-link" id="profile-tab1" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile1" aria-selected="false">Edit</button> -->
                                                        <button type="button" class="btn btn-primary" id="id<?php echo $i; ?>">Edit</button>
                                                        <button type="button" class="btn btn-danger" onclick="window.location.href='remove_product.php?Prod_id=<?php echo $products[$i]['Prod_id']; ?>'">Delete</button>
                                                    </td>
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

                </div>
                <?php
                for ($i = 0; $i < $num_rows; $i++) {
                ?>
                    <div class="tab-pane fade show" id="profile<?php echo $i; ?>">
                        <!-- search bar -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <button class="btn btn-secondary" onclick="back()"><i class='bx bx-arrow-back'></i></button>
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
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="prod_id" value="<?php echo $product[$i]['Prod_id']; ?>">
                                            <input type="hidden" name="image" value="<?php echo $product[$i]['image_loc']; ?>">
                                            <div class="form-group">
                                                <label for="productname">Product Title</label>
                                                <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="" name="productname" value="<?php echo $product[$i]['title']; ?>">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="productname">Product Description</label>
                                                <textarea type="text" class="form-control" id="productname" name="productdesc" value=""><?php echo $product[$i]['description']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="productname">Product Specification</label>
                                                <textarea type="text" class="form-control" id="productname" name="productspecs" value=""><?php echo $product[$i]['specification']; ?></textarea>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="productname">Product Price</label>
                                                <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="Enter Product Price" name="productprice" value="<?php echo $product[$i]['price']; ?>">
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <label for="productname">Product Category</label>
                                                <input type="text" class="form-control" id="productname" aria-describedby="emailHelp" placeholder="" name="productcategory" value="<?php echo $product[$i]['category']; ?>">
                                            </div>
                                            <br>
                                    </div>
                                </div>
                                <?php
                                $temp = $product[$i]['image_loc'];
                                $img = explode('&', $temp);
                                $count = count($img);
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <p>Upload Images</p>
                                            <?php
                                            for ($j = 0; $j < $count; $j++) {
                                                if ($img[$j] != "&") {
                                            ?>
                                                    <div class="col-md-2">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <input type="file" class="form-control" accept="image/*" name="image<?php echo $j; ?>" id="<?php echo $j; ?>" onchange="loadFile<?php echo $j; ?>(event)">
                                                                <br>

                                                                <img id="output" src="../<?php echo $img[$j]; ?>" class="storeop" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                            }
                                            for ($j = $count; $j < 6; $j++) {
                                                ?>
                                                <div class="col-md-2">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <input type="file" class="form-control" accept="image/*" class="image5" name="image<?php echo $j; ?>" id="image5<?php echo $j; ?>" onchange="loadFile6(event)">
                                                            <br>

                                                            <img id="output5" src="https://getstamped.co.uk/wp-content/uploads/WebsiteAssets/Placeholder.jpg" class="storeop" />
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-primary" name="submit1">Submit</button>

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
                <?php
                }
                ?>
                <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>P_ID</th>
                                            <th>Product Title</th>
                                            <th>Product Price</th>
                                            <th>Product Category</th>
                                            <th>Buy Count</th>
                                            <th>Product Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        for ($i = 0; $i < $num_rows; $i++) {
                                        ?>
                                            <tr>
                                                <td><?php echo $products[$i]['Prod_id']; ?></td>
                                                <td><?php echo $products[$i]['title']; ?></td>
                                                <td><?php echo number_format($products[$i]['price']); ?></td>
                                                <td><?php echo $products[$i]['buy_count']; ?></td>
                                                <td><?php echo $products[$i]['category']; ?></td>
                                                <td>Active</td>
                                                <td>
                                                    <!-- <button class="nav-link" id="profile-tab1" data-bs-toggle="tab" data-bs-target="#profile1" type="button" role="tab" aria-controls="profile1" aria-selected="false">Edit</button> -->
                                                    <a href="../product-details.php?id=<?php echo $products[$i]['Prod_id']; ?>" class="btn btn-primary">View</a>
                                                </td>
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


                <div class="tab-pane fade" id="performanceop" role="tabpanel" aria-labelledby="performanceop-tab">
                    <h4>Public Reviews</h4>
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

</main>


<script src="../dashboard.js"></script>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</script>
<script>
    var profile = document.getElementById("profile");
    <?php
    for ($i = 0; $i < $num_rows; $i++) {
    ?>
        var id<?php echo $i; ?> = document.getElementById("id<?php echo $i; ?>");
        var profile<?php echo $i; ?> = document.getElementById("profile<?php echo $i; ?>")
        id<?php echo $i; ?>.onclick = function() {
            // b1.classList.add('btn-dark');
            document.getElementById("profile<?php echo $i; ?>").style.display = "block";
            document.getElementById("profile").style.display = "none";
        }
    <?php
    }
    ?>

    function back() {
        <?php
        for ($i = 0; $i < $num_rows; $i++) {
        ?>
            document.getElementById("profile<?php echo $i; ?>").style.display = "none";
        <?php
        }
        ?>
        document.getElementById("profile").style.display = "block";
    }
    // function remove(p_id){
    //     <?php
            //         require_once "dh.php";
            //         $prod_id ="<script>document.writeln(p_id);</script>";
            //         echo $prod_id;
            //         echo remove($conn, $prod_id);
            //     
            ?>
    // }
</script>
</body>

</html>
