<?php
    function user_exists($conn, $email, $phone_number) {
        require_once "login.dbh.php";
        $sql = "SELECT * FROM user WHERE email = ? OR phone_number = ?;";
        $smt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($smt, $sql)){
            header("location: authentication-signup.php/?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($smt, "si", $email, $phone_number);
        mysqli_stmt_execute($smt);
        $resultData = mysqli_stmt_get_result($smt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
    }
    function createuser1($conn, $firstname, $lastname, $email, $phone_number, $password1, $city){
        require_once "login.dbh.php";
        $error = "";
        $user_existed = user_exists($conn, $email, $phone_number);
        if($user_existed == NULL){
            $sql = "INSERT INTO user(firstname, lastname, email, phone_number, password1, city) VALUES('$firstname','$lastname','$email','$phone_number','$password1','$city');";
            $smt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($smt, $sql)){
                $error .= "Error in STMT";
                exit();
            }
            mysqli_stmt_execute($smt);
            mysqli_stmt_close($smt);
            $error .= "User Created Successfully";
            return $error;
        }
        else
        {
            $error .= "Email id Existed";
            return $error;
        }
    }

    function createuser($conn, $firstname, $lastname, $email, $firebaseop){
        require_once "login.dbh.php";
        $error = "";
        $user_existed = user_exists($conn, $email, $phone_number);
        if($user_existed == NULL){
            
            $sql = "INSERT INTO user(firstname, lastname, email, firebase_id) VALUES(\"$firstname\",\"$lastname\",\"$email\", , \"$firebaseop\");";
         
            if ($conn->query($sql) === TRUE) {
                $error .= "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              
            return $error ;
        }
        else
        {
            $error .= "Email id Existed";
            return $error;
        }
    }

    function createusers($conn, $firstname, $lastname, $email, $phone_number,$firebaseop){
        require_once "login.dbh.php";
        $error = "";
        $user_existed = user_exists($conn, $email, $phone_number);
        if($user_existed == NULL){
            
            $sql = "INSERT INTO user(firstname, lastname, email, firebase_id) VALUES(\"$firstname\",\"$lastname\",\"$email\", , \"$firebaseop\");";
         
            if ($conn->query($sql) === TRUE) {
                $error .= "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              
            return $error ;
        }
        else
        {
            $error .= "Email id Existed";
            return $error;
        }
    }

    function login($conn, $email, $password){
        require_once "login.dbh.php";
        $error = "";
        $user_existed = user_exists($conn, $email, $password);
        if($user_existed === false){
            $error .= "User Does'nt Exists";
        }
        else{
            if($user_existed["password1"] == $password){
                $check = true;
            }
            else{
                $check = false;
            }
            if($check === false)
            {
                $error .= "Incorrect Password";
            }
            elseif($check === true)
            {
                session_start();
                $_SESSION["uemail"] = $user_existed["email"];
                $_SESSION["ufirstname"] = $user_existed["firstname"];
                $_SESSION["ulastname"] = $user_existed["lastname"];
                $_SESSION["u_id"] = $user_existed["id"];
                header("location: index.php");
                exit();
            }
        }
        return $error;
    }

    function column_info($conn)
    {
      $result[] = "";
        $query = $conn->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'ecommerce' AND TABLE_NAME = 'productdb'");
        $count = 0;
        while($row = $query->fetch_assoc()){
            $count = $count + 1;
            $result[] = $row;
        }
        return $result;
    }