<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */

// array for JSON response
$response = array();

if (isset($_POST['latitude']) && isset($_POST['longitude']) && isset($_POST['user_name'])) {
    
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $sharing_on = $_POST['sharing_on'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO gps_coordinates(latitude, longitude, user_name, password, sharing_on) VALUES('$latitude', '$longitude', '$user_name', '$password', '$sharing_on')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";

        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>