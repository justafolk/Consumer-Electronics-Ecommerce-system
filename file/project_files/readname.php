<?php
// readname.php
// connect dbconnection file
require_once("./login.dbh.php");
// hear we search term exist then process the below lines of code
if(!empty($_POST["searchterm"])) 
{
    // the query responsible for fetch matched data
    $sql_query ="SELECT * FROM username WHERE name like '" . $_POST["searchterm"] . "%' ORDER BY name LIMIT 0,4";
    $get_result = mysqli_query($conn,$sql_query);
 
        if(!empty($get_result)) {
            // prepare the list for append
        ?>
                <ul id="name-list">
                <?php
                while($name_val = mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
                ?>
					<li onClick="selectname('<?php echo $name_val["name"]; ?>');"><?php echo $name_val["name"]; ?></li>
                <?php 
				} 
				?>
                </ul>
        <?php } 
} 
?>