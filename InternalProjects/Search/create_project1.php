<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
 
    $name = "ABC";
    
    $price = 56;
    $description = "Trial";
	echo "Hello";
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 echo "Hello";
    // connecting to db
    $db = new DB_CONNECT();
 echo "Hello";
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO products(name, price, description) VALUES('$name', '$price', '$description')");
 
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

?>