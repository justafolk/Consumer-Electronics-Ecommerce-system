<div class="col-12 col-xl-3">
    <div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
    </div>
    <div class="filter-sidebar d-none d-xl-flex">
        <div class="card rounded-0 w-100">
            <div class="card-body">
                <div class="align-items-center d-flex d-xl-none">
                    <h6 class="text-uppercase mb-0">Filter</h6>
                    <div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
                </div>
                <hr class="d-flex d-xl-none" />
                <div class="product-categories">
                    <h6 class="text-uppercase mb-3">Categories</h6>
                    <ul class="list-unstyled mb-0 categories-list">
                        <form action="" method="get">

                            <?php
                            include "./login.dbh.php";
                            $sql = "SELECT
                        category,
                        COUNT(*) AS `num`
                      FROM
                        productdb
                        WHERE (category=' {$_GET['term']} ') or (category LIKE '%{$_GET['term']}%') or (title LIKE '%{$_GET['term']}%' or Tags LIKE '%{$_GET['term']}%' or specification LIKE '%{$_GET['term']}%')
                      GROUP BY
                        category
                      ";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="cat_<?php echo $row["category"] ?>" value="<?php echo $row["category"] ?>" id="cat_<?php echo $row["category"] ?>">
                                        <label class="form-check-label" for="cat<?php echo $row["category"] ?>"><?php echo  ucwords($row["category"]) ?></label>
                                        <span class="float-end badge rounded-pill bg-primary"><?php echo number_format($row["num"]) ?></span>
                                    </div>
                                </li>
                            <?php


                            }
                            ?>
                    </ul>
                </div>
                <hr>
                <div class="ratings">
                    <h6 class="text-uppercase mb-3">Customer Ratings</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="4" id="4star" name="star">
                        <label class="form-check-label" for="4star">

                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i> & Up
                            <br>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="3" id="3star" name="star">
                        <label class="form-check-label" for="3star">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i> & Up
                            <br>
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="2" id="2star" name="star">
                        <label class="form-check-label" for="2star">

                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i> & Up
                            <br>
                        </label>
                    </div>
                    <div class="form-check">

                        <input class="form-check-input" type="radio" value="1" id="1star" name="star">
                        <label class="form-check-label" for="1star">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i>
                            <i class="bx bx-star text-warning"></i> & Up
                            <br>
                        </label>

                    </div>

                </div>
                <hr>
                <div class="product-brands">
                    <h6 class="text-uppercase mb-3">Brands</h6>
                    <ul class="list-unstyled mb-0 categories-list">
                        <?php
                        include "./login.dbh.php";
                        $sql = "SELECT DISTINCT brand FROM productdb";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brand_<?php echo $row["brand"] ?>" value="<?php echo $row["brand"] ?>" id="brand_<?php echo $row["brand"] ?>">
                                    <label class="form-check-label" for="brand_<?php echo $row["brand"] ?>"><?php echo  $row["brand"] ?></label>
                                </div>
                            </li>
                        <?php


                        }
                        ?>

                    </ul>
                </div>
                <hr>
                <div class="price-range">
                    <h6 class="text-uppercase mb-3">Price</h6>
                    <!-- min and max text fields -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rs.</span>
                        </div>
                        <input type="text" class="form-control" id="min-price" placeholder="Min" aria-label="Min" name="min-price" required>
                        &nbsp;
                        <h4>

                            -
                        </h4>
                        &nbsp;

                        <div class="input-group-append">
                            <span class="input-group-text">Rs.</span>
                        </div>
                        <input type="text" class="form-control" id="max-price" placeholder="Max" name="max-price" aria-label="Max" required>
                        <input type="hidden" id="term" value="<?php echo $_GET["term"] ?>" name="term" >

                    </div>
                </div>
                <hr>

                <button type="submit" class="btn btn-dark btn-sm text-uppercase rounded-0 font-14 fw-500" style="margin-top:4%;">Filter</button>
                </form>

            </div>
        </div>
    </div>
</div>