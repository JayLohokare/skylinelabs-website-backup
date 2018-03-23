    <?php
     
    $response = array();
     
     
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
     
    // connecting to db
    $db = new DB_CONNECT();
     
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
     
     
    // get a product from products table
    $result = mysql_query("SELECT * FROM gps_coordinates WHERE user_name = '$user_name'");
     
    if (!empty($result)) {
     
    $result = mysql_fetch_array($result);
    $product = array();
     
    if($result["password"]== $_POST['password'])
    {
     // include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
// get a product from products table
$result = mysql_query("UPDATE gps_coordinates SET longitude = '$longitude', latitude = '$latitude' WHERE user_name= '$user_name'");
$result = mysql_fetch_array($result);

if (($result)) {
$response["success"] = 1;
    $response["gps_coordinates"] = array();
    array_push($response["gps_coordinates"], $product);
    echo json_encode($response);
}
 
else {
$response["success"] = 0;
    $response["gps_coordinates"] = array();
    array_push($response["gps_coordinates"], $product);
    echo json_encode($response);
}
    }
     
    else
    {
    $response["success"] = 0;
    $response["gps_coordinates"] = array();
    array_push($response["gps_coordinates"], $product);
    echo json_encode($response);
    }
     
     
    }
    else
    {
    $response["success"] = 0;
    $response["gps_coordinates"] = array();
    array_push($response["gps_coordinates"], $product);
    echo json_encode($response);
    }
     
     
    ?>