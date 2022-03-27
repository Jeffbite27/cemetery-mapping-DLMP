<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$customer_block=$con->query("SELECT * FROM `tbl_blocks` WHERE `site_id`='$site_id' AND `sector`='$sector' ORDER BY `block_name` ASC");

$sql_edit_modal=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id) WHERE lot_owners.lot_owner_id='$lot_owner_id'");
$rows=$sql_edit_modal->fetch_array();

$output="<option value='$rows[block_id]' selected>$rows[block_name]</option>";

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