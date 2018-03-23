<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ERROR | E_PARSE);

$json       = file_get_contents('php://input');
$json_array = json_decode($json, true);
$projectname = $json_array["projectname"];

$m= new MongoClient("mongodb://35.162.23.96:27017");
$db = $m->typesDB;
$collection = $db->$projectname;

$cursor = $collection->find();
$result1 = array();
foreach ($cursor as $document) {
   array_push($result1, $document[type_name]);
}
 
echo json_encode($result1);

?>