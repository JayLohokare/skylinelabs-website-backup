<?php
session_start();
$check = $_SESSION['login'];
if($check) {
include ("card.php");}
else {
include ("header.html");
include("login.php");
include ("footer.html");}
?>