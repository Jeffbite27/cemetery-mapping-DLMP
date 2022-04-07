<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$customer_block=$con->query("SELECT * FROM `tbl_blocks` WHERE `site_id`='$site_id' AND `sector`='$sector' ORDER BY `block_id` ASC");
$output='';
if($customer_block->num_rows!=0){
  while($row=$customer_block->fetch_array()){
    $output.="
      <option value='$row[block_id]'>$row[block_name]</option>
    ";
  }
}else{
  $output.="
    <option value='' disabled>No block available</option>
    ";
}

echo $output;