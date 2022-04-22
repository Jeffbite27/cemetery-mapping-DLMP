<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();

$sql_dead=$con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../Assets/image/logopngplain.png" type="image/x-icon">
  <title>Print Deceased Persons</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<style>
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;700&family=Poppins:wght@300;400;600;700;800&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800&display=swap");

table, th, td {
  border:1px solid black;
  border-collapse: collapse;
  max-width: 100%;

}
</style>
<body onload="window.print();">
  <center>
  <div class="logo">
    <img src="../../Assets/image/logopngplain.png" width="100px" alt="">
    <h4 style="font-weight: 700">Deceased Persons Data Report</h4>
    <h6>
      <?php 
          date_default_timezone_set('Asia/Manila');
          echo date("M j, Y | h:i:a");
      ?>
    </h6>
  </div>
  <br>
    <table class="" id="tbl-deads"  style="font-size: 14px">
      <thead class="text-center">
        <th>Fullname</th>
        <th>Gender</th>
        <th>Relative</th>
        <th>Relationship</th>
        <th>Internment Date</th>
        <th>Birthday</th>
        <th>Date of death</th>
        <th>Site</th>
        <th>Sector</th>
        <th>Block</th>
        <th>Lot</th>
      </thead>
      <tbody>
        <?php while($row=$sql_dead->fetch_array()){ ?>
          <tr>
            <td><?php echo $row["dead_fname"]." ".$row["dead_mname"]." ".$row["dead_family_name"]?></td>
            <td><?php echo $row["dead_gender"]?></td>
            <td><?php echo $row["dead_relative"]." ".$row["dead_relative_surname"]?></td>
            <td><?php echo $row["dead_relationship"]?></td>
            <td><?php echo $row["internment_date"]?></td>
            <td><?php echo $row["date_of_birth"]?></td>
            <td><?php echo $row["date_of_death"]?></td>
            <td>
              <?php echo $row["site_name"]?>
            </td>
            <td>
              <?php echo $row["sector"]?>
            </td>
            <td>
              <?php echo $row["block_name"]?>
            </td>
            <td>
              <?php echo $row["lot_name"]?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </center>
</body>
</html>