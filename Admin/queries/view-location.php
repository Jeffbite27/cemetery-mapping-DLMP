<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

// $sql=$con->query("SELECT * FROM ((`tbl_sites` INNER JOIN `tbl_blocks` ON tbl_sites.site_id=tbl_blocks.site_id) INNER JOIN `tbl_lots` ON tbl_sites.site_id=tbl_lots.site_id) WHERE tbl_sites.site_name='$site_name' AND tbl_blocks.sector='$sector' GROUP BY tbl_lots.lot_name");
$sql=$con->query("SELECT * FROM (((`deceased_persons` INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id) WHERE `site_name`='$site_name' AND `sector`='$sector' AND `block_name`='$block_name' AND `lot_name`='$lot_name'");
$output="";
if($sql->num_rows!=0){
  while($row=$sql->fetch_array()){
    $output.= "
      <button class='".explode(' ', trim($row["site_name"] ))[0]."-$row[sector]-block-$row[block_name]-lot-$row[lot_name]' style='border: 3px solid red !important;' title='$row[dead_fname] $row[dead_family_name]'>
           <!--button>$row[lot_name]</!--button----->    
      </button>
    ";
  }
}else{
  $output.="<p>No lots found</p>";
}


echo $output;