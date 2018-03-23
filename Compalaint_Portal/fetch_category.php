<?php


$jsonData = array();
$jsonData2 = array();
$jsonData3 = array();
$count = 1;


  require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();


//$category= $_GET["category"];

$result = mysql_query("SELECT *FROM Complaint_Portal"); //WHERE category= '$category'");

while ($row= mysql_fetch_array($result )) {

$jsonData2["id"] = $row["ID"];
$jsonData2["latitude"] = $row["latitude"];
$jsonData2["longitude"] = $row["longitude"];
$jsonData2["user_name"] = $row["user_name"];
$jsonData2["title"] = $row["title"];
$jsonData2["description"] = $row["description"];

if(get_magic_quotes_gpc())
{
   $jsonData2["image"] = stripslashes($row["image_URL"]);
}

else
{
$jsonData2["image"] = $row["image_URL"];

}



$jsonData[] = $jsonData2;
}
$jsonData3["result"] = $jsonData;
echo json_encode($jsonData3);

?>