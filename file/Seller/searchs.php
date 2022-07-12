<?php
require_once "../login.dbh.php";
if (isset($_GET['term'])) {

  $query = "SELECT * FROM productdb WHERE (title LIKE '%{$_GET['term']}%' or Tags LIKE '%{$_GET['term']}%' or specification LIKE '%{$_GET['term']}%' or category LIKE '%{$_GET['term']}%')  LIMIT 5";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    while ($user = mysqli_fetch_array($result)) {
      $res[] = $user["title"];
    }
  } else {
    $res = array();
  }


  //return json res
  echo json_encode($res);
}
