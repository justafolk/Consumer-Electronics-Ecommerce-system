<?php include "./header.php"; ?>

<?php
include "./db.php";
if (isset($_POST["update_f"])) {
    $sql = "update marketing set name = '{$_POST["sourcename"]}', type = '{$_POST["sourcetype"]}', url = '{$_POST["sourceurl"]}', secret = '{$_POST["sourceapi"]}' where id = {$_POST["update_f"]}";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo mysqli_error($conn);
    }
}
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom  ">
        <h1 class="h2">Manage Marketing resources </h1>
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
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Add Source</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Update Source</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">View Source</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="performanceop-tab" data-bs-toggle="tab" data-bs-target="#performanceop" type="button" role="tab" aria-controls="performanceop" aria-selected="false">Analysis</button>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-12">


                                <h4>Add Marketing Source</h4>
                                <p>Add promotions to home page.</p>
                                <form action="add_source.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="sourcename">Source Name</label>
                                        <input type="text" class="form-control" id="sourcename" aria-describedby="sourcename" placeholder="Enter Source Name" name="sourcename">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <!-- add a select tag for primary, secondary and categorical options -->
                                        <label for="exampleFormControlSelect1">Source Type</label>
                                        <select class="form-control" id="sourcetype" name="sourcetype">
                                            <option value="social">Social Media</option>
                                            <option value="television">Television / Radio</option>
                                            <option value="news">News Paper</option>
                                            <option value="seo">SEO optimizers</option>
                                            <option value="emails">Email</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="sourceurl">Source URL</label>
                                        <input type="text" class="form-control" id="sourceurl" aria-describedby="sourceurl" placeholder="Enter Source URL" name="sourceurl">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="sourceapi">Source Client secrent / API keys</label>
                                        <input type="text" class="form-control" id="sourceapi" aria-describedby="sourceapi" placeholder="Enter Source API key  " name="sourceapi">
                                    </div>
                                    <br>



                                    <br>
                                    <script>

                                    </script>
                                    <input type="submit" class="btn btn-primary" value=" Submit">
                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- search bar -->

                        <div class="row">
                            <div class="col-md-12">


                                <h4>Update Marketing Sources</h4>
                                <p>Update Existing Promotions.</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>Source Name</th>
                                            <th>Source Type</th>
                                            <th>Source URL</th>
                                            <th>Source API</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "./db.php";
                                            $sql = "SELECT * FROM marketing";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['type'] . "</td>";
                                                echo "<td>" . $row['url'] . "</td>";
                                                echo "<td>" . $row['secret'] . "</td>";
                                                echo "<td><a href='update_marketing.php?id=" . $row['id'] . "'>Update</a></td>";
                                                echo "</tr>";
                                                $i++;
                                            }
                                            ?>
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
                                            <th>#</th>
                                            <th>Source Name</th>
                                            <th>Source Type</th>
                                            <th>Source URL</th>
                                            <th>Source API</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "./db.php";
                                            $sql = "SELECT * FROM marketing";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row["id"] . "</td>";
                                                echo "<td>" . $row['name'] . "</td>";
                                                echo "<td>" . $row['type'] . "</td>";
                                                echo "<td>" . $row['url'] . "</td>";
                                                echo "<td>" . $row['secret'] . "</td>";
                                                echo "<td><a href='update_marketing.php?id=" . $row['id'] . "'>Update</a></td>";
                                                echo "</tr>";
                                                $i++;
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

</main>



<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="../dashboard.js"></script>
</body>

</html>