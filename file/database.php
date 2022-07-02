<?php
  $uid = 1;
  $pid = 2;
  ?>
<script>
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "ecommerce"
});
var uid = <?php echo $uid; ?>;
var pid = <?php echo $pid; ?>;
// document.body.innerHTML = uid;
// document.body.innerHTML = pid;

con.connect(function(err) {
  if (err) throw err;

  var sql = "INSERT INTO cart (U_id, Prod_id) VALUES (?, ?)";
  con.query(sql, [uid, pid], function (err, result) {
    if (err) throw err;

  });
});
</script>