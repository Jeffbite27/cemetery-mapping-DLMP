<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();
extract($_POST);

// $sql=$con->query("SELECT * FROM ((`tbl_sites` INNER JOIN `tbl_blocks` ON tbl_sites.site_id=tbl_blocks.site_id) INNER JOIN `tbl_lots` ON tbl_sites.site_id=tbl_lots.site_id) WHERE tbl_sites.site_name='$site_name' AND tbl_blocks.sector='$sector' GROUP BY tbl_lots.lot_name");
$sql=$con->query("SELECT * FROM ((`tbl_lots` INNER JOIN `tbl_blocks` ON tbl_lots.block_id=tbl_blocks.block_id) INNER JOIN `tbl_sites` ON tbl_lots.site_id=tbl_sites.site_id) WHERE `site_name`='$site_name' AND `sector`='$sector'");
$output="";
if($sql->num_rows!=0){
  while($row=$sql->fetch_array()){
    $output.= "
      <div class='".explode(' ', trim($row["site_name"] ))[0]."-$row[sector]-block-$row[block_name]-lot-$row[lot_name]'>
           <!--button>$row[lot_name]</!--button----->    
      </div>
      <br>
    ";
  }
}else{
  $output.="<p>No lots found</p>";
}


echo $output;