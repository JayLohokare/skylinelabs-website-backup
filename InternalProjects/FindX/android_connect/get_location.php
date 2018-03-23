<?php
 

// array for JSON response
$response = array();
 
// include db connect class
require_once __DIR__ . '/db_connect.php';
 
// connecting to db
$db = new DB_CONNECT();
 
    $password = $_POST['password'];
    $user_name = $_POST['user_name'];
 
    $result = mysql_query("SELECT * FROM gps_coordinates WHERE user_name = '$user_name'");
 
    if (!empty($result)) {

 
            $result = mysql_fetch_array($result);
 
            $product = array();
            $product["latitude"] = $result["latitude"];
            $product["longitude"] = $result["longitude"];
            $product["time"] = $result["time"];
            $product["sharing_on"] = $result["sharing_on"];
          

            if($result["password"]== $_POST['password'] && $result["sharing_on"] == "1")
            {// success
            $response["success"] = 1;
 
            // user node
            $response["gps_coordinates"] = array();
 
            array_push($response["gps_coordinates"], $product);
 
            // echoing JSON response
            echo json_encode($response);
            }
           
            else {
            // no product found
            $response["success"] = 0;
            $response["message"] = "Access not granted";
 
            // echo no users JSON
            echo json_encode($response);
        }


    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";
 
        // echo no users JSON
        echo json_encode($response);
    }

?>