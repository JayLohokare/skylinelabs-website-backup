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

$response["count"] = $count;
echo json_encode($response);
?>