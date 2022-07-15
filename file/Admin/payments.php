<?php
include "./header.php";
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
        <h1 class="h2">Manage Payments </h1>
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
    <!-- tab layout for add seller, seller lookup, inventory requests -->

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">View payments</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Manage Seller Payouts</button>
        </li>
        
    </ul>
    <br>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- enter from date to date payments -->
                            <form action="" method="get">

                            <div class="row">
                                <div class="col-md-5">
                                    <?php 
                                    include "./db.php";
                                    $sql = "select MIN(transac_date) as from_date, MAX(transac_date) as to_date from transactions;";
                                    $results = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($results);

?>
                                    <div class="form-group">
                                        <label for="from_date">From Date</label>
                                        <input type="date" class="form-control" id="from_date" placeholder="From Date" name="from_date" value="<?php echo $row["from_date"] ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="to_date">To Date</label>
                                        <input type="date" class="form-control" id="to_date" placeholder="To Date" value="<?php echo $row["to_date"] ?>" name="to_date">
                                    </div>
                                </div>

                                <div class="col-md-2" style="margin-top: 20px">
                                    <div class="form-group">
                                        <label for="submit"><br></label>
                                        <button type="submit" class="btn btn-ecomm btn-dark">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>


                        </div>

                        <div class="table-responsive">
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Invoice No. </th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Payment Method </th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                if (isset($_GET["to_date"])){
                                    include "./db.php";
                                    $sql = "select * from transactions where transac_date between '{$_GET["from_date"]}' and '{$_GET["to_date"]}'";
                                    $results = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($results) > 0){

                                        while ($row = mysqli_fetch_assoc($results)){
                                            echo "he";
                                            
                            ?>
                            
                                    <tr>
                                        <th scope="row"><?php echo $row["transc_id"] ?></th>
                                        <td><?php echo $row["c_id"] ?></td>
                                        <td><?php echo $row["transc_id"] ?></td>
                                        <td><?php echo $row["amount"] ?></td>
                                        <td><?php echo $row["method"] ?></td>

                                        <td><?php echo $row["transac_date"] ?></td>
                                        <td style="color: green">Received</td>
                                        <td>
                                            <button type="button" class="btn-sm btn-secondary">View</button>
                                            <button type="button" class="btn-sm btn-secondary">Initiate
                                                Return</button>

                                        </td>
                                    </tr>
                                 


                                    <?php 
                                        }
                                    }
                                }?>
                                </table>
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
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Seller ID</th>
                                            <th>Seller Location </th>
                                            <th>Revenue Collected Offline </th>
                                            <th>Revenue Collected Online </th>
                                            <th>Total Revenue Collected </th>
                                            <th>Total Payout Amount </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "./db.php";
                                        $sql = "select * from sellerDB";
                                        $results = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($results) > 0){
                                            while ($row = mysqli_fetch_assoc($results)){
                                               $sqsl = "select SUM(amount) as total_amount from OrderDB where s_id = '{$row["id"]}' and method='online'";
                                                  $results2 = mysqli_query($conn, $sqsl);
                                                    $row2 = mysqli_fetch_assoc($results2);
                                                    $online_total_amount = $row2["total_amount"];
                                                    $sqsl = "select SUM(amount) as total_amount from OrderDB where s_id = '{$row["id"]}' and method='offline'";
                                                    $results2 = mysqli_query($conn, $sqsl);
                                                    $row2 = mysqli_fetch_assoc($results2);
                                                    $offline_total_amount = $row2["total_amount"];
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row["id"] ?></th>
                                            <td><?php echo $row["store_name"] ?></td>
                                            <td><?php echo 0+$offline_total_amount ?></td>
                                            <td><?php echo 0+$online_total_amount ?></td>
                                            <td><?php echo 0+$online_total_amount+$offline_total_amount ?></td>
                                            <td><?php echo 0+$online_total_amount ?></td>
                                            <td>
                                                <button type="button" class="btn-sm btn-dark btn-ecomm">View</button>                                              <button type="button" class="btn-sm btn-dark btn-ecomm">Payout done</button>

                                            </td>
                                        </tr>
                                       <?php }}
                                       ?>
                                    </tbody>
                                </table>
                            </div>
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
                                <input type="text" class="form-control" placeholder="Search Promotion ID or title">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
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