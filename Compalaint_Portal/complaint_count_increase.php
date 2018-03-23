<?php

$response = array();

   // include db connect class
    require_once __DIR__ . '/db_connect.php';
     
    // connecting to db
    $db = new DB_CONNECT();


$id = $_GET["id"];

$result = mysql_query("select * from Complaint_Portal where ID='$id'");
$row = mysql_fetch_array($result);
$count = $row["count"];

$count = $count +1;

$update = mysql_query("UPDATE Complaint_Portal SET count='$count' WHERE ID='$id'");

?>