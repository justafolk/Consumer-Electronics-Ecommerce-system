<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create Store</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap');

* {
    margin: 0;
    padding: 0;
}

.header1{
    border-bottom: 1px solid #E2E8F0;
}

.navbar1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: rgb(150, 149, 149);
    min-height:4vh;
    padding: 5px;
    border-radius:3px;
}
.form1{
            width:40%;
            height:40%;
            margin-left:auto;
            margin-right:auto;
            padding:10px;
            border-radius:10px;
            margin-top:120px;
            /* background-color: rgb(230, 227, 227); */
        }

.hamburger1 {
    display: none;
}
.title{
    margin-bottom:-5%;
    margin-top:1.5%;  
}
.bar1 {
    display: block;
    width: 25px;
    height: 2px;
    margin: 5px auto;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    background-color: #101010;
}
.nav-menu1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top:-23px;
    margin-bottom:-10px;
}
.nav-menu1 li{
    list-style: none;
    margin-top:10px;
}
.nav-menu1 a{
    text-decoration: none;
}
.nav-item1 {
    margin-right:4rem;
}

.nav-link1{
    font-size: 14pt;
    color: black;
}

.nav-link1:hover{
    color: #482ff7;
}

.nav-logo1 {
    font-size: 18pt;
    margin-left:30px;
    color: white;
}



@media only screen and (max-width: 768px) {
    .nav-menu1 {
        position: fixed;
        left: -100%;
        top: 5rem;
        flex-direction: column;
        background-color: #fff;
        width: 100%;
        border-radius: 10px;
        text-align: center;
        transition: 0.3s;
        box-shadow:
            0 10px 27px rgba(0, 0, 0, 0.05);
    }

    .nav-menu1.active {
        left: 0px;
    }

    .nav-item1 {
        margin: 2.5rem 0;
    }

    .hamburger1 {
        display: block;
        cursor: pointer;
    }
    .hamburger1.active .bar1:nth-child(2) {
        opacity: 0;
    }

    .hamburger1.active .bar1:nth-child(1) {
        transform: translateY(8px) rotate(45deg);
    }

    .hamburger1.active .bar1:nth-child(3) {
        transform: translateY(-8px) rotate(-45deg);
    }
    }
    @media only screen and (max-width: 850px) {
        .form1{
            width:80%;
            height:80%;
            margin-left:auto;
            margin-right:auto;
            margin-top:120px;
            transition: 0.5s;
        }
    }
}
    </style>
</head>
<body>
        <nav class="navbar1" style="min-height: 3vh;">
            <h3><a href="#" class="nav-logo1" style="text-decoration:none;">LOGO</a></h3>
            <ul class="nav-menu1">
                <li class="nav-item1">
                    <a href="#" class="nav-link1">Login</a>
                </li>
                <li class="nav-item1">
                    <a href="#" class="nav-link1">Create User</a>
                </li>
                <li class="nav-item1">
                    <a href="#" class="nav-link1">About</a>
                </li>
                <li class="nav-item1">
                    <a href="#" class="nav-link1">Help</a>
                </li>
            </ul>
            <div class="hamburger1">
                <span class="bar1"></span>
                <span class="bar1"></span>
                <span class="bar1"></span>
            </div>
        </nav>
        <center><h1 class="title">Store Register</h1></center>
<form class="form1 border-0">
        <div class="margin personal" id="form11">
            <center><h2 class="title1"><b>Personal Info</b></h2></center>
            <div class="mb-3 firstname">
                <label for="exampleInput" class="form-label" style="margin-top:10px;">Full  Name</label>
                <input type="text" class="form-control" id="exampleInput" required />
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required />
            </div>
            <div class="mb-3" style="margin:left:-20%;">
                        <li style="list-style:none;">
                            <label for="exampleInputPassword1" class="form-label">Phone number</label>
                        </li>
                    <ul style="display:flex; padding:0px;">
                            <li style="list-style-type:none; max-width:15%;">
                            <select class="form-select" style="max-height:200px; overflow:scroll;">
                                <option selected>+1</option>
                                <?php
                                    for($i=2;$i<101;$i++){
                                        ?><option value="<?php echo $i; ?>"><?php echo "+".$i ?></option><?php
                                    }
                                ?>
                            </select>
                        </li>
                        <li style="list-style:none; min-width:50%; margin-left:20px;">
                            <input type="tel" id="phone" class="form-control" name="phone" pattern="[0-9]{10}">
                        </li>
                    </ul>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Re-Enter Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Personal Address</label>
                <input type="text" class="form-control" id="exampleInput" required />
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Permanant Address</label>
                <input type="text" class="form-control" id="exampleInput" required />
            </div>
            <div class="mb-3">
                <center><button type="submit" onclick="second()" class="btn btn-primary">Next</button></center>
            </div>
        </div>
        <div class="margin store" id="form2">
            <center><h2 class="title1"><b>Store Info</b></h2></center>
            <div class="mb-3 firstname">
                <label for="exampleInput" class="form-label" style="margin-top:10px;">Store Name</label>
                <input type="text" class="form-control" id="exampleInput" required />
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Store address</label>
                <input type="text" class="form-control" id="exampleInput" required />
            </div>
            <div class="mb-3" style="margin:left:-20%;">
                <ul style="display:flex;  justify-content:space-between; padding:0px">
                        <li style="list-style:none;">
                          <label for="exampleInput" class="form-label">City Name</label>
                          <input type="text" class="form-control" id="exampleInput" required />
                        </li>
                        <li style="list-style:none;">
                            <label for="exampleInputPassword1" class="form-label">State</label>
                            <select class="form-select" style="overflow:scroll;">
                              <option value="">Select State</option>
                              <option value="Andhra Pradesh">Andhra Pradesh</option>
                              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                              <option value="Assam">Assam</option>
                              <option value="Bihar">Bihar</option>
                              <option value="Chhattisgarh">Chhattisgarh</option>
                              <option value="Goa">Goa</option>
                              <option value="Gujarat">Gujarat</option>
                              <option value="Haryana">Haryana</option>
                              <option value="Himachal Pradesh">Himachal Pradesh</option>
                              <option value="Jharkhand">Jharkhand</option>
                              <option value="Karnataka">Karnataka</option>
                              <option value="Kerala">Kerala</option>
                              <option value="Madhya Pradesh">Madhya Pradesh</option>
                              <option value="Maharashtra">Maharashtra</option>
                              <option value="Manipur">Manipur</option>
                              <option value="Meghalaya">Meghalaya</option>
                              <option value="Mizoram">Mizoram</option>
                              <option value="Nagaland">Nagaland</option>
                              <option value="Odisha">Odisha</option>
                              <option value="Punjab">Punjab</option>
                              <option value="Rajasthan">Rajasthan</option>
                              <option value="Sikkim">Sikkim</option>
                              <option value="Tamil Nadu">Tamil Nadu</option>
                              <option value="Telangana">Telangana</option>
                              <option value="Tripura">Tripura</option>
                              <option value="Uttar Pradesh">Uttar Pradesh</option>
                              <option value="Uttarakhand">Uttarakhand</option>
                              <option value="Gairsain">Gairsain</option>
                              <option value="West Bengal">West Bengal</option>
                              </select>
                        </li>
                        <li style="list-style:none;">
                          <label for="exampleInput" class="form-label">Pin code</label>
                          <input type="tel" id="phone" class="form-control" name="pincode" pattern="[0-9]{10}">                        
                        </li>
                    </ul>
                </div>

            <div class="mb-3">
                <label for="exampleInput" class="form-label">Enter Geo-graphical Location</label>
                <input type="text" class="form-control" id="exampleInput">
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Store Images</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Store Proof</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Permanant Address</label>
                <input type="text" class="form-control" id="exampleInput" required />
            </div>
            <div class="mb-3">
                <center><button type="button" onclick="back()"class= "btn btn-primary" style="margin-right:5%; background-color:white;color:black; border:black 1px solid;">< Back</button><button type="submit" class="btn btn-primary" style="margin-left:5%;">Submit</button></center>
            </div>
        </div>
</form>
<form class="form2">

    </form>
</body>
<script>
        const hamburger = document.querySelector(".hamburger1");
        const navMenu = document.querySelector(".nav-menu1");
        const navLink = document.querySelectorAll(".nav-link1");

        hamburger.addEventListener("click", mobileMenu);
        navLink.forEach(n => n.addEventListener("click", closeMenu));

        function mobileMenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        }

        function closeMenu() {
            hamburger.classList.remove("active");
            navMenu.classList.remove("active");
        }
        document.getElementById("form11").style.display="block";
        document.getElementById("form2").style.display="none";

        function second(){
            document.getElementById("form11").style.display="none";
            document.getElementById("form2").style.display="block";
            }
                // document.getElementById('login').onclick = changeColor;

            function changeColor() {
                document.body.style.color = "purple";
                    return false;
                }
        function back(){
                document.getElementById("form11").style.display="block";
                document.getElementById("form2").style.display="none";
        }
    </script>
</html>
