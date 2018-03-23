<html>
<?php
include("header.html"); ?>
<div class="row">
</div>
<?php
include("db_config.php"); ?>
<div class="row">
<?php

$conn = new mysqli(servername, username, password, dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$no = 1;
$success = 0;
$row_cnt = $result->num_rows;
   while($row_cnt > $success) {
                                           $sql = "SELECT * FROM users WHERE uid=$no;";
                                           $result = $conn->query($sql);
                                           $row = $result->fetch_assoc();
                                           $ans = $row["fullname"];
					   $img = $row["image"];
					   $uid = $row["uid"];
                                           if ($ans == NULL) { $no++;}
                                           else {
                                                     include("card.html");
                                                     $success++;
 						     $no++; 
                                                     }
                                         }
?>
</div>
<?php
include("modalscr.php");
include("footer.html");
?>
</html>