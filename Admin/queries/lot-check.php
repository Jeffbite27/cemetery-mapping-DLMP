<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$sql=$con->query("SELECT * FROM `lot_owners` WHERE `site_id`='$site_id' AND `block_id`='$block_id' AND `lot_id`='$lot_id'");
$row=$sql->fetch_array();

if($site_id==isset($row["site_id"])&&$block_id==isset($row["block_id"])&&$lot_id==isset($row["lot_id"])){
  echo "
  <h6>Sorry, the lot you entered was already owned by someone else.</h6>
  <h6>Please enter other lot details.</h6>
  ";
}else{
  echo "";
}