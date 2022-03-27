<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$customer_lot=$con->query("SELECT * FROM `tbl_lots` WHERE `site_id`='$site_id' AND `block_id`='$block_id' ORDER BY `lot_name` ASC");

$sql_edit_modal=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id) WHERE lot_owners.lot_owner_id='$lot_owner_id'");
$rows=$sql_edit_modal->fetch_array();

$output="<option value='$rows[lot_id]' selected>$rows[lot_name]</option>";

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