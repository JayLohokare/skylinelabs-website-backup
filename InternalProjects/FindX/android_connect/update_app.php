    <?php
     
    /*
     * Following code will create a new product row
     * All product details are read from HTTP Post Request
     */
     
    // array for JSON response
    $response = array();
     
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $time = $_POST['time'];
    $sharing_on = $_POST['sharing_on'];
     
     
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
     
    // connecting to db
    $db = new DB_CONNECT();
     
     // get a product from products table
     $result = mysql_query("UPDATE gps_coordinates SET longitude = '$longitude', latitude = '$latitude', time='$time', sharing_on = '$sharing_on', password='$password' WHERE user_name= '$user_name'");
     $result = mysql_fetch_array($result);
    if (($result)) {
     
     
         
     $response["success"] = 1;
      $response["message"] = "Product successfully created.";
      
      
    
    // echoing JSON response
    echo json_encode($response);
    } 

    else {
    // failed to insert row
    $response["success"] = 0;
    $response["message"] = "Oops! An error occurred.";
     
    // echoing JSON response
    echo json_encode($response);
    }
    
    ?>