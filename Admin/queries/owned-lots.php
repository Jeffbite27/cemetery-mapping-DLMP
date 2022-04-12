<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

$sql_occupied=$con->query("SELECT * FROM ((((`lot_owners` LEFT JOIN `deceased_persons` ON lot_owners.lot_owner_id=deceased_persons.lot_owner_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id) INNER JOIN `tbl_blocks` ON tbl_lots.block_id=tbl_blocks.block_id) INNER JOIN `tbl_sites` ON tbl_lots.site_id=tbl_sites.site_id) WHERE `site_name`='$site_name' AND `sector`='$sector' AND deceased_persons.deceased_id IS NULL");

$sql_available=$con->query("SELECT * FROM (((`tbl_lots`LEFT JOIN `lot_owners` ON tbl_lots.lot_id=lot_owners.lot_id) INNER JOIN `tbl_sites` ON tbl_lots.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON tbl_lots.block_id=tbl_blocks.block_id) WHERE `site_name`='$site_name' AND `sector`='$sector' AND lot_owners.lot_owner_id IS NULL");
$output="";
$output2="";

while($row=$sql_occupied->fetch_array()){
  $output.="<div class='owned-".explode(' ', trim($row["site_name"] ))[0]."-$row[sector]-block-$row[block_name]-lot-$row[lot_name]'>
  </div>";
}
while($row=$sql_available->fetch_array()){
  $output.="<div class='available-".explode(' ', trim($row["site_name"] ))[0]."-$row[sector]-block-$row[block_name]-lot-$row[lot_name]'>
  </div>";
}
echo $output;
echo $output2;