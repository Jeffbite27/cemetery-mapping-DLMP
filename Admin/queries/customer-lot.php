<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$customer_lot=$con->query("SELECT * FROM `tbl_lots` WHERE `site_id`='$site_id' AND `block_id`='$block' ORDER BY `lot_name` ASC");
$output='';
if($customer_lot->num_rows!=0){
  while($row=$customer_lot->fetch_array()){
    $output.="
      <option value='$row[lot_id]'>$row[lot_name]</option>
    ";
  }
}else{
  $output.="
    <option value='' disabled>No lot available</option>
    ";
}

echo $output;