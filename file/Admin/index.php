<?php include 'header.php' ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">

    <br>
    <?php
    include './db.php';
    ?>
    <div class="row">
        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT COUNT(*) AS total FROM OrderDB";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-chart-line fa-2x text-gray-300" style="color: green;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Successful Return
                                Customers </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT COUNT(*) AS total FROM user";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Sellers
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT COUNT(*) AS total FROM sellerDB";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Average Customer
                                Rating</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT AVG(Ratings) AS total FROM sellerDB";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo round($row['total'], 2);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Signed Up Users
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT COUNT(*) AS total FROM user";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                echo $row['total'];
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total E-commerce
                                revenue
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(amount) AS total FROM OrderDB";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                // rupee sign
                                echo "₹" . $row['total'];
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total In-person
                            Revenue</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            $sql = "SELECT SUM(Grand_total) AS total FROM Orders WHERE Method='In-Store'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            // rupee sign
                            echo "₹" . $row['total'];
                            ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Revenue
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php

                            $sql = "SELECT SUM(amount) AS total FROM OrderDB";
                            $result = mysqli_query($conn, $sql);
                            $s = mysqli_fetch_assoc($result);
                            // rupee sign


                            $sql = "SELECT SUM(Grand_total) AS total FROM Orders WHERE Method='In-Store'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            // rupee sign
                            echo $s['total'] + $row['total'];

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <br>



    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Revenue Collected</h5>
                    <div class="chart-area">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Website Hits</h5>
                    <div class="chart-area">
                        <canvas id="lol"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Visitor Count by Categories</h5>
                    <div class="chart-area">
                        <canvas id="visitors"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Top Sellers</h5>
                    <div class="chart-area">
                        <canvas id="sellers"></canvas>
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
    (function() {
        'use strict'

        // Graphs
        var ctx = document.getElementById('myChart').getContext('2d');
        // eslint-disable-next-line no-unused-vars
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],

                datasets: [{
                        label: 'Ecommerce',
                        data: [<?php
                                // select data for specific dates

                                for ($i = 1; $i <= 7; $i++) {
                                    # code...
                                    $sql = "SELECT Order_Date,SUM(Grand_total) AS total FROM Orders WHERE Order_Date BETWEEN '1930-$i-01' AND '1930-$i-31' GROUP BY Order_Date";

                                    $result = mysqli_query($conn, $sql);
                                    echo mysqli_fetch_assoc($result);
                                    if (mysqli_fetch_assoc($result)) {

                                        $row = mysqli_fetch_assoc($result);
                                        echo $row['total'] . ",";
                                        print_r($row['total']);
                                    }
                                }
                                echo 0;

                                ?>],
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

    })
</script>
</body>

</html>