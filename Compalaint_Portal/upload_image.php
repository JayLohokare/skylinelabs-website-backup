<?php
  
	$target_dir = "http://www.skylinelabs.in/Compalaint_Portal/images/";
    $base=$_REQUEST['image'];
    $filename = $_REQUEST['filename'];


    $URL =  $target_dir.$filename;	

    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen('images/'.$filename, 'wb');
    fwrite($file, $binary);
    fclose($file);


?>