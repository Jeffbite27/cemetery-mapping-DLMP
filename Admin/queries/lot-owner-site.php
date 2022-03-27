<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$sites_lot=$con->query("SELECT * FROM `tbl_sites` WHERE `total_blocks`!='0'");

$sql_edit_modal=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id) WHERE lot_owners.lot_owner_id='$lot_owner_id'");
$rows=$sql_edit_modal->fetch_array();

$output="<option value='$rows[site_id]' selected disabled>$rows[site_name]</option>";
while($row=$sites_lot->fetch_array()){
  $output.="
    <option value='$row[site_id]'>$row[site_name]</option>
  ";
}
echo $output;