<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$customer_lawn=$con->query("SELECT * FROM `tbl_lots` WHERE `lot_id`='$lot_id'");
$row=$customer_lawn->fetch_array();

echo "$row[lawn_type]";
