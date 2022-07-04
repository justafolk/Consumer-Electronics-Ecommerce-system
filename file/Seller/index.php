
<?php 
$file = "index.php";
session_start();
include "./header.php";  ?>
 

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="background-color: #f5f3ff;">
  

    <br>

    <div class="row">
      <div class="col-md-12" style="">
        <div class="card">
          <div class="">
            <div class="row my-2 mx-2" style="align-items: center; justify-content: center;">
              <div class="col-md-1" style="align-items: center; justify-content: center;">
                <div class="row" style="justify-content: center;">
                  <div class="col-md-12" style="width:100%">
                    <img src="https://ui-avatars.com/api/name=<?php echo $_SESSION["sfirstname"]." ".$_SESSION["slastname"] ?>?rounded=true" alt="Avatar"
                      class="img-fluid">
                  </div>

                </div>

              </div>
              <div class="col-md-3">
                <h5 class="card-title"><?php echo $_SESSION["sfirstname"]." ".$_SESSION["slastname"]  ?></h5>
                <h6 class="card-subtitle text-muted"><?php  echo $_SESSION["sstore_name"] ?></h6>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <br>

    <div class="row">
      <div class="col-md-3">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Orders</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  5
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Orders Dispatched</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">23</div>
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
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total
                  Revenue</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  ₹123k
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
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Average Customer Rating</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">4.7</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
    <br>

    <div class="row mx-1">
      <div class="card">
        <div class="card-body">
          <h5>New Orders</h5>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Invoice No.</th>
                <th scope="col">Item</th>
                <th scope="col">Customer ID</th>
                <th scope="col">Location</th>
                <th scope="col">Quantity</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>0129032</td>
                <td></td>
                <img class="item1" src="./assets/imgs/1.png" alt="">
                <td>avdhut.kamble776@gmail.com</td>
                <td>Pune, Maharashtra</td>
                <td>3</td>
                <td>₹25,235/-</td>
                <td>
                  <bold style="color:green"> Completed </bold>
                </td>
                <td>

                  <button class="btn btn-sm" type="submit" style="background-color: grey;color: white">View
                    Details</button>

                </td>
              </tr>

              <tr>
                <th scope="row">2</th>
                <td>0129032</td>
                <td></td>
                <img class="item1" src="./assets/imgs/1.png" alt="">
                <td>mayur.khadde776@gmail.com</td>
                <td>Bhosari, Maharashtra</td>
                <td>2</td>
                <td>₹15,235/-</td>
                <td>
                  <bold style="color:red">Pending</bold>

                </td>
                <td>

                  <button class="btn btn-sm" type="submit" style="background-color: grey;color: white">Dispatch</button>

                </td>




              </tr>
              <tr>
                <th scope="row">3</th>
                <td>0129032</td>
                <td></td>
                <img class="item1" src="../assets/imgs/1.png" alt="">
                <td>Hrishi.chau23@gmail.com</td>
                <td>Satara, Maharashtra</td>
                <td>5</td>
                <td>₹1,25,235/</td>
                <td>
                  <bold style="color:blue">At Dispatch</bold>

                </td>

                <td>

                  <button class="btn btn-sm" type="submit" style="background-color: grey; color: white;">Track</button>

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
  </main>




  </div>


  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label: 'My First dataset',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [0, 10, 5, 2, 20, 30, 45],
        }]
      },

      // Configuration options go here
      options: {}
    });
  </script>



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