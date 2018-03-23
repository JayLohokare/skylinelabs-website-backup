<?php
  
	$target_dir = "http://www.skylinelabs.in/Compalaint_Portal/images/";
    $base=$_REQUEST['image'];
    $filename = $_REQUEST['filename'];

    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $user_name=$_REQUEST['user_name'];
    $latitude=$_REQUEST['latitude'];
    $longitude=$_REQUEST['longitude'];
    $URL =  $target_dir.$filename;	

    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen('images/'.$filename, 'wb');
    fwrite($file, $binary);
    fclose($file);

    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();
	$count = 1;

 $sql = "INSERT INTO Complaint_Portal (user_name,latitude,longitude,title,description,image_URL,count)
VALUES ('$user_name','$latitude','$longitude','$title','$description','$URL','$count')";

mysql_query($sql);
   
    


?>