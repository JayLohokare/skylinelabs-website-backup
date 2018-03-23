<?php

$configs = include('config.php');

$read_con = mysqli_connect($configs["mysql_host"],$configs["user_read"], $configs["password_read"],$configs["database_name"]);
$write_con = mysqli_connect($configs["mysql_host"],$configs["user_write"], $configs["password_write"],$configs["database_name"]);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$json=file_get_contents('php://input');
$json_array=json_decode($json,true);

if($json_array["action"]=='ReadAll'){
	//echo "Hello";
	readall($json_array);
}

function readall($readall){
global $read_con;
$response = array();
//$special=$readall["special"];
$special = 0;
if($special==0){
$result = mysqli_query($read_con,"SELECT * FROM menuTable ORDER BY name");
}
else{
$result = mysqli_query($read_con,"SELECT * FROM specialTable ORDER BY name");
}

if (mysqli_num_rows($result) > 0) {
    $response["success"] = 1;
    $response["items"] = array();
 
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $product = array();
        $product["name"] = $row["name"];
        $product["price"] = $row["price"];
        //$product["created_at"] = $row["created_at"];
        $product["availability"] = $row["availability"]; 
        //$product["image_url"] = $row["image_url"];
        $product["category"] = $row["category"];
        array_push($response["items"], $product);
    }
 
    echo json_encode($response);
} else {
    $response["success"] = 0;
    $response["message"] = "No products found";
    echo json_encode($response);
}
}

?>
