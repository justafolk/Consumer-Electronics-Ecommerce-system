<?php include 'header.php' ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">

    <br>
    <!-- tab layout for add seller, seller lookup, inventory requests -->


    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Seller Lookup</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Verify Sellers</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="requestop-tab" data-bs-toggle="tab" data-bs-target="#requestop" type="button" role="tab" aria-controls="requestop" aria-selected="false">Inventory Requests</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="performanceop-tab" data-bs-toggle="tab" data-bs-target="#performanceop" type="button" role="tab" aria-controls="performanceop" aria-selected="false">Performance
                        Reports</button>
                </li>
            </ul>
            <div class="tab-content my-3" id="myTabContent">
                <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">


                    <h5>Verification Requests</h5>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Request ID</th>
                                <th scope="col">Seller Name</th>
                                <th scope="col">Email ID</th>
                                <th scope="col">City,State</th>
                                <th scope="col">Address</th>
                                <th scope="col">Request Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- search bar -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for ....">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                        <div class="row">


                            <div class="col-md-6">
                                <div class="row my-3">
                                    <div class="col-md-5">

                                    </div>
                                    <div class="col-md-4">
                                        <img src="https://ui-avatars.com/api/name=Avdhut+Kamble?rounded=true" alt="Avatar" class="img-fluid">
                                    </div>
                                </div>
                                <br>
                                <div class="table-responsive mx-3">

                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Seller ID: </th>
                                                <td>SID194033</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Name: </th>
                                                <td>Avdhut Akash Kamble</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Address: </th>
                                                <td>H-18, Yerwada, Pune, 6</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Phone: </th>
                                                <td>+91 8605677177</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Zip Code: </th>
                                                <td>411006</td>
                                            </tr>
                                            <tr>
                                                <th>Seller Verification Status: </th>
                                                <td style="color: green;">Verified</td>
                                            </tr>
                                            <tr>
                                                <th>Average Customer Rating: </th>
                                                <td style="color: gold;">4.7 <i class="fa-solid fa-star"></i></td>
                                            </tr>
                                            <tr>
                                                <th>Total offline Revenue: </th>
                                                <td>Rs. 132,415,325</td>
                                            </tr>
                                            <tr>
                                                <th>Total offline Revenue: </th>
                                                <td>Rs. 132,415,325</td>
                                            </tr>
                                            <tr>
                                                <th>Total Online Revenue: </th>
                                                <td>Rs. 132,415,325</td>
                                            </tr>
                                            <tr>
                                                <th>Partnership Timeline: </th>
                                                <td>2 years, 4 months</td>
                                            </tr>
                                            <tr>
                                                <th>Total Customers Served: </th>
                                                <td>24135</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-6" style="justify-content: center; align-items:center">

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
                <div class="tab-pane fade" id="requestop" role="tabpanel" aria-labelledby="requestsop-tab">
                    <!-- list inventory requests by sellers -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Request ID</th>
                                            <th scope="col">Seller Name</th>
                                            <th scope="col">Email ID</th>
                                            <th scope="col">City,State</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Request Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                <div class="tab-pane fade" id="performanceop" role="tabpanel" aria-labelledby="performanceop-tab">
                            <h4>Performance Reports</h4>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Seller</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Pune, Maharashtra</option>
                                            <option>Vadodara, Gujarat</option>
                                            <option></option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="idk">Select Month</label>
                                        <br>
                                        <input type="date" class="date form-control" name="idk" id="idk">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="go"> </label>
                                        <br>
                                        <input type="button" class="btn btn-secondary" value="Generate">
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

</script>
</body>

</html>