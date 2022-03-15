<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();

$sites_lot=$con->query("SELECT * FROM `tbl_sites` WHERE `total_blocks`!='0'");
$output='<option value="" selected disabled>Select Site</option>';
while($row=$sites_lot->fetch_array()){
  $output.="
    <option value='$row[site_id]'>$row[site_name]</option>
  ";
}
echo $output;
