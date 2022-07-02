<?php
require_once "./login.dbh.php";
if (isset($_GET['term'])) {

  $query = "SELECT * FROM productdb WHERE (title LIKE '%{$_GET['term']}%' or Tags LIKE '%{$_GET['term']}%' or specification LIKE '%{$_GET['term']}%' or category LIKE '%{$_GET['term']}%')  LIMIT 5";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($user = mysqli_fetch_array($result)) {
      $cat[] = $user['category'];
    }
  } else {
    $cat = array();
  }
  $values = array_count_values($cat);
  arsort($values);
  $popular = array_slice(array_keys($values), 0, 1, true);
  $res[] = "Search for '" . $_GET['term'] . "' in ". $popular[0]."s";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) > 0) {
    while ($user = mysqli_fetch_array($result)) {
      $res[] = $user["title"];
    }
  } else {
    $res = array();
  }
  $res[] = "Search in  " . $popular[0] . "s";

  
  //return json res
  echo json_encode($res);
}
