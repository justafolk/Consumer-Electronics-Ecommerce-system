<head>
    <link href="../assets/css/icons.css" rel="stylesheet">
</head>
<?php
require_once "db.php";
function upload($conn, $title, $type, $product, $target, $description, $value, $target1, $discount, $max_discount, $date, $exp_date, $link){
  require_once "db.php";
  $error = "";
  $sql = " INSERT INTO promotions(title, type, product, image_loc, description, price, T_and_c, discount, maxdiscount, active_date, expiry_date, link) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
  $smt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($smt, $sql)){
    $error .= "Error in STMT";
    exit();
  }
  mysqli_stmt_bind_param($smt, "ssssssssssss", $title, $type, $product, $target, $description, $value, $target1, $discount, $max_discount, $date, $exp_date, $link);
  mysqli_stmt_execute($smt);
  mysqli_stmt_close($smt);
    echo mysqli_error($conn);
  $error .= "Product Added Successfully";
  return $error;
}

function change($conn, $id, $title, $type, $product, $target, $description, $value, $target1, $discount, $max_discount, $date, $exp_date, $link){
  require_once "db.php";
  $error = "";
  $sql = "update promotions set title = ?, type = ?, product = ?, image_loc = ?, description = ?, price = ?, T_and_c = ?, discount = ?, maxdiscount = ?, active_date = ?, expiry_date = ?, link = ? where promoid = ?;";
  $smt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($smt, $sql)){
    $error .= "Error in STMT";
    exit();
  }
  mysqli_stmt_bind_param($smt, "ssssssssssssi", $title, $type, $product, $target, $description, $value, $target1, $discount, $max_discount, $date, $exp_date, $link, $id);
  mysqli_stmt_execute($smt);
  mysqli_stmt_close($smt);
  $error .= "Product Updated Successfully";
  return $error;
}

if(isset($_POST['submit'])){
  $title = $_POST['productname'];
  $type = $_POST['producttype'];
  $description = $_POST['productdesc'];
  $value = $_POST['productprice'];
  $link = $_POST['productlink'];
  $discount = $_POST['productdiscount'];
  $max_discount = $_POST['productmaxdiscount'];
  $date = $_POST['productdate'];
  $exp_date = $_POST['productenddate'];
  str_replace("(₹)","",$value);
  str_replace("%","",$discount);
  str_replace("%","",$max_discount);
  if(isset($_FILES["image"])){
    $image = $_FILES["image"]["name"];
    $tmp = $_FILES["image"]['tmp_name'];
    $fileExt = explode(".", $image);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    if(!(file_exists("../assets/images/promotions/".$type))){
      mkdir("../assets/images/promotions/".$type);
    }
    $target = "../assets/images/promotions/$type/".$fileNameNew;
    move_uploaded_file($tmp, $target);
    // echo "Image Moved Successfully";
  }
  if(isset($_FILES["productcategory"])){
    $image1 = $_FILES["productcategory"]["name"];
    $tmp1 = $_FILES["productcategory"]['tmp_name'];
    $fileExt = explode(".", $image1);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    if(!(file_exists("../assets/images/promotions/".$type))){
      mkdir("../assets/images/promotions/".$type);
    }
    $target1 = "../assets/images/promotions/$type/".$fileNameNew;
    move_uploaded_file($tmp1, $target1);
    $product = 3;
    // echo "Category Moved Successfully";
  }
  upload($conn, $title, $type, $product, $target, $description, $value, $target1, $discount, $max_discount, $date, $exp_date, $link);
}

if(isset($_POST['submit1'])){
  $title = $_POST['productname'];
  $id = $_POST['prod_id'];
  $type = $_POST['producttype'];
  $description = $_POST['productdesc'];
  $value = $_POST['productprice'];
  $link = $_POST['productlink'];
  $discount = $_POST['productdiscount'];
  $max_discount = $_POST['productmaxdiscount'];
  $date = $_POST['productdate'];
  $exp_date = $_POST['productenddate'];
  str_replace("(₹)","",$value);
  str_replace("%","",$discount);
  str_replace("%","",$max_discount);
  if(isset($_FILES["image"])){
    $image = $_FILES["image"]["name"];
    $tmp = $_FILES["image"]['tmp_name'];
    $fileExt = explode(".", $image);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    if(!(file_exists("../assets/images/promotions/".$type))){
      mkdir("../assets/images/promotions/".$type);
    }
    $target = "../assets/images/promotions/$type/".$fileNameNew;
    move_uploaded_file($tmp, $target);
    // echo "Image Moved Successfully";
  }
  if(isset($_FILES["productcategory"])){
    $image1 = $_FILES["productcategory"]["name"];
    $tmp1 = $_FILES["productcategory"]['tmp_name'];
    $fileExt = explode(".", $image1);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    if(!(file_exists("../assets/images/promotions/".$type))){
      mkdir("../assets/images/promotions/".$type);
    }
    $target1 = "../assets/images/promotions/$type/".$fileNameNew;
    move_uploaded_file($tmp1, $target1);
    $product = 3;
    // echo "Category Moved Successfully";
  }
  // echo $title;
  // echo $type;
  // echo $description;
  // echo $value;
  // echo $link;
  // echo $discount;
  // echo $max_discount;
  // echo $date;
  // echo $exp_date;
  // echo $target;
  // echo $target1;
  echo change($conn, $id, $title, $type, $product, $target, $description, $value, $target1, $discount, $max_discount, $date, $exp_date, $link);
}

$row = "";
$num_rows = 0;
$promotions = "";
$sql = "SELECT * FROM promotions";
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
  $promotion[$c] = $row;
  $promotions = $promotion;
  $c++;
}

?>
<?php include "./header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
        <h1 class="h2">Manage Promotions </h1>
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

                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-12">


                                <h4>Add Promotions</h4>
                                <p>Add promotions to home page.</p>
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Name" name="productname">
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <p>Upload Main Promotional Cover.</p>
                                                <input type="file" class="form-control" accept="image/*" name="image" class="image" onchange="loadFile1(event)">
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
                                            <option value="Categorical - Phone">Categorical - Phone</option>
                                            <option value="Categorical - Laptop">Categorical - Laptop</option>
                                            <option value="Categorical - Headphone">Categorical - Headphone</option>
                                            <option value="Categorical - Tablet">Categorical - Tablet</option>
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
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Price" name="productprice" value="">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Link </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Price" name="productlink" value="">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion T&C document.</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Discount percentage.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Discount percentage" name="productdiscount">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Maximum Discount.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Max Applicable Discount" name="productmaxdiscount">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Active Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productdate">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Expiration Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productenddate">
                                            </div>
                                        </div>
                                    </div>


                                    <br>
                                    <input type="submit" class="btn btn-primary" name="submit" value="submit">
                                </form>
                            </div>


                        </div>
                    </div>
<?php
for($i=0;$i<$num_rows;$i++){
?>
                    <div class="tab-pane fade show" id="profile<?php echo $i; ?>">
                        <!-- search bar -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <button class="btn btn-secondary" onclick="back()"><i class='bx bx-arrow-back'></i></button>
                                    <input type="text" class="form-control" placeholder="Search Promotion ID or title">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button" name="submit">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <h5>Update Promotions</h5>
                                <p>Update Existing Promotions.</p>
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Description</label>
                                        <input type="hidden" name="prod_id" value="<?php echo $promotions[$i]['promoid']; ?>">
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Name" name="productname" Value = "<?php echo $promotions[$i]['title']; ?>">
                                    </div>
                                    <br>
                                    <p>Upload Main Promotional Cover.</p>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <input type="file" class="form-control" accept="image/*" id="image" name="image" onchange="loadFile(event)">
                                                <br>

                                                <img id="output" src="<?php echo $promotions[$i]['image_loc']; ?>" class="storeop" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <!-- add a select tag for primary, secondary and categorical options -->
                                        <label for="exampleFormControlSelect1">Promotion Type</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="producttype">
                                            <option value="<?php echo $promotions[$i]['type']; ?>"><?php echo $promotions[$i]['type']; ?></option>
                                            <option value="Primary">Primary</option>
                                            <option value="secondary">Secondary</option>
                                            <option value="Categorical - Phone">Categorical - Phone</option>
                                            <option value="Categorical - Laptop">Categorical - Laptop</option>
                                            <option value="Categorical - Headphone">Categorical - Headphone</option>
                                            <option value="Categorical - Tablet">Categorical - Tablet</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Description</label>
                                        <textarea type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Description" name="productdesc" value=""><?php echo $promotions[$i]['description']; ?></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion target Categories (separate by commas)</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Price" name="productprice" value="<?php echo $promotions[$i]['price']; ?>">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Link </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Price" name="productlink" value="<?php echo $promotions[$i]['link']; ?>">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion T&C document.</label>
                                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productcategory" value="<?php echo $promotions[$i]['T_and_c']; ?>">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Promotion Discount percentage.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Discount percentage" name="productdiscount" value="<?php echo $promotions[$i]['maxdiscount']."%"; ?>">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Maximum Discount.</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Max Applicable Discount" name="productmaxdiscount" value="<?php echo $promotions[$i]['discount']."%"; ?>">
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Active Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productdate" value="<?php echo $promotions[$i]['active_date']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Promotion Expiration Date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Promotion Category" name="productenddate" value="<?php echo $promotions[$i]['expiry_date']; ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <br>
  <script>

  </script>
                                    <input type="submit" class="btn btn-primary" name="submit1" value="submit1">
                                </form>
                            </div>
                        </div>
                    </div>
<?php
}
?>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- search bar -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Promotion ID or title">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button" name="submit">Go!</button>
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
                                                <th>Promotion ID</th>
                                                <th>Promotion Title</th>
                                                <th>Promotion Category</th>
                                                <th>Promotion Price</th>
                                                <th>Promotion Active Date</th>
                                                <th>Promotion Expiration Date</th>
                                                <th>Promotion Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
for($i=0;$i<$num_rows;$i++){
?>
                                            <tr>
                                                <td>PRO_ID<?php echo $promotion[$i]['promoid']; ?></td>
                                                <td><?php echo $promotion[$i]['title']; ?></td>
                                                <td><?php echo $promotion[$i]['type']; ?></td>
                                                <td><?php echo "Rs. ".number_format($promotion[$i]['price']); ?></td>
                                                <!-- <td><?php //echo $promotion[$i]['discount']; ?></td> -->
                                                <!-- <td><?php //echo $promotion[$i]['maxdiscount']; ?></td>  -->
                                                <td><?php echo $promotion[$i]['active_date']; ?></td>
                                                <td><?php echo $promotion[$i]['expiry_date']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="update<?php echo $i; ?>">
                                                    <i class='fa fa-edit'></i>
                                                    </button>
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
<?php
}
?>
                                            <!-- <tr>
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
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
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
                                                <th>Promotion ID</th>
                                                <th>Promotion Title</th>
                                                <th>Promotion Category</th>
                                                <th>Promotion Price</th>
                                                <th>Promotion Active Date</th>
                                                <th>Promotion Expiration Date</th>
                                                <th>Promotion Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
for($i=0;$i<$num_rows;$i++){
?>
                                            <tr>
                                                <td>PRO_ID<?php echo $promotion[$i]['promoid']; ?></td>
                                                <td><?php echo $promotion[$i]['title']; ?></td>
                                                <td><?php echo $promotion[$i]['type']; ?></td>
                                                <td><?php echo "Rs. ".number_format($promotion[$i]['price']); ?></td>
                                                <!-- <td><?php //echo $promotion[$i]['discount']; ?></td> -->
                                                <!-- <td><?php //echo $promotion[$i]['maxdiscount']; ?></td>  -->
                                                <td><?php echo $promotion[$i]['active_date']; ?></td>
                                                <td><?php echo $promotion[$i]['expiry_date']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" id="">
                                                    <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
<?php
}
?>
                                            <!-- <tr>
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
                                            </tr> -->
                                        </tbody>
                                    </table>
                                    <!-- <table class="table">
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
                                    </table> -->
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
<script>
var profile = document.getElementById("profile");
<?php
for($i=0;$i<$num_rows;$i++){
?>
  var update<?php echo $i; ?> = document.getElementById("update<?php echo $i; ?>");
  var profile<?php echo $i; ?> = document.getElementById("profile<?php echo $i; ?>")
    update<?php echo $i; ?>.onclick = function() {
      // b1.classList.add('btn-dark');
      document.getElementById("profile<?php echo $i; ?>").style.display = "block";
      document.getElementById("profile").style.display = "none";
    }
<?php
}
?>
function back(){
<?php
for($i=0;$i<$num_rows;$i++){
?>
  document.getElementById("profile<?php echo $i; ?>").style.display = "none";
<?php
}
?>
document.getElementById("profile").style.display = "block";
}
</script>
</body>

</html>
