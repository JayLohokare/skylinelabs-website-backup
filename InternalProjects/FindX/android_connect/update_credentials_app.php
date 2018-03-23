     <?php
     

    // array for JSON response
    $response = array();
     
    
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';
     
    // connecting to db
    $db = new DB_CONNECT();
     
    // get a product from products table
    $result = mysql_query("UPDATE gps_coordinates SET password = '$password' WHERE user_name= '$user_name'");
    $result = mysql_fetch_array($result);

    if (($result)) {
    $response["success"] = 1;
    echo json_encode($response);

    }
     
    else {
    $response["success"] = 0;
    echo json_encode($response);
    }
     
    ?>