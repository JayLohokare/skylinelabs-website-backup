<?php
    

include_once './db_functions.php';
include_once './GCM.php';

     
if (isset($_GET["latitude"]) && isset($_GET["user_name"]) && isset($_GET["name"]) && isset($_GET["phone_number"]) && isset($_GET["longitude"])){


$lat = $_GET["latitude"];
$lon =$_GET["longitude"];
$user_name = $_GET["user_name"];
$number = $_GET["phone_number"];
$name = $_GET["name"];
$time = $_GET["time"];


$lla = $lat-0.1;
$ula = $lat+0.11;
$llo = $lon-0.1;
$ulo = $lon+0.1;


$db = new DB_Functions();
$gcm = new GCM();



$all = $db->getAllUsers();



while($row = mysql_fetch_array($all))
{
if($row["user_name"] != $user_name)
{
$current_id = $row["gcm_regid"];
       
    $curlat = $row["latitude"];
    $curlon = $row["longitude"];

if(($lla < $curlat) && ($curlat< $ula) && ($llo < $curlon) && ($curlon< $ulo))
{
    $registatoin_ids = array($current_id);
    $message = array("latitude" => $lat,"number" =>$number, "longitude" =>  $lon,"name"   => $name, "user_name"   => $user_name, "time"=>$time);
 
    $result = $gcm->send_notification($registatoin_ids, $message);
 }
}
}

}
?>