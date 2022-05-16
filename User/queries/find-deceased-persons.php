<?php
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../../config.php");
  $con=connect();
  
  if(isset($_POST["search"])){
    $search = $_POST["search"];
    $search_dead=$con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id) WHERE `dead_fname` LIKE '%$search%'");
  }else{
    $search_dead=$con->prepare("SELECT * FROM ((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");
  }

  if($search_dead->num_rows!=0){
    while($row= $search_dead->fetch_array()){
      $output="
        <tr>
          <td class='align-middle'>".$row['deceased_id']."</td>
          <td class='align-middle'>".$row['dead_fname']." ".$row['dead_mname']." ".$row['dead_family_name']."</td>
          <td class='align-middle'><br>Site: ".$row["site_name"]."<br>Sector: ".$row['sector']."<br>Block #: ".$row['block_name']."<br>Lot #: ".$row['lot_name']."
          </td>
          <td class='align-middle text-center'>
            <button class='btn btn-danger btn-view-location' data-site='".$row['site_name']."' data-sector='".$row['sector']."' data-block='".$row['block_name']."' data-lot='".$row['lot_name']."' data-bs-toggle='modal' data-bs-target='#view-".explode(' ', trim($row['site_name'] ))[0]."-".$row['sector']."'>
              <div class='d-flex align-items-center'>
                  <i class='bx bx-search-alt-2'></i> 
                  &nbsp;View Location
              </div>
            </button>
          </td>
        </tr>
      ";
    }
  }else{
      $output="
        <tr>
          <td colspan='4' class='text-center'>No data found</td>
        </tr>
      ";
  }
  echo $output;

  ?>
  <script>
    $(".btn-view-location").click(function () {
      var sector = $(this).attr("data-sector");
      var site_name = $(this).attr("data-site");
      var block_name = $(this).attr("data-block");
      var lot_name = $(this).attr("data-lot");
      $.ajax({
          url: "queries/view-location.php",
          method: "post",
          data: {
            sector: sector,
            site_name: site_name,
            block_name: block_name,
            lot_name: lot_name,
          },
          success: function (data) {
            $(".lot_info").html(data);
          },
        });
      });
  </script>

