<?php 

if(!isset($_SESSION)){
    session_start();    
}

include("../../config.php");
$con=connect();
extract($_POST);
$sql = $con->query("SELECT * FROM `admin_acc` WHERE `username`='$user'");

session_destroy();
