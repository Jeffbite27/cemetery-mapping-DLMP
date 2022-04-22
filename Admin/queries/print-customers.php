<?php
if(!isset($_SESSION)){
  session_start();    
}
include("../../config.php");
$con=connect();

$customers=$con->query("SELECT * FROM `customers`");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../Assets/image/logopngplain.png" type="image/x-icon">
  <title>Print Customers</title>
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
    <h4 style="font-weight: 700">Customer Data Report</h4>
    <h6>
      <?php 
          date_default_timezone_set('Asia/Manila');
          echo date("M j, Y | h:i:a");
      ?>
    </h6>
  </div>
  <br>
  <table class="tbl-customer" id="tbl-customer" style="font-size: 14px">
    <thead class="text-center">
      <th>Name</th>
      <th>Address</th>
      <th>Contact #</th>
      <th>Email</th>
      <th>Birthday</th>
      <th>Gender</th>
      <th>Religion</th>
      <th>Citizenship</th>
      <th>Status</th>
      <th>Occupation</th>
    </thead>
    <tbody>
      <?php while($row=$customers->fetch_array()){?>
      <tr>
        <td class=""><?php echo $row["first_name"].' '.$row["middle_name"].' '.$row["family_name"]?></td>
        <td><?php echo $row["address"]?></td>
        <td><?php echo $row["contact"]?></td>
        <td><?php echo $row["email"]?></td>
        <td><?php echo $row["bday"]?></td>
        <td><?php echo $row["gender"]?></td>
        <td><?php echo $row["religion"]?></td>
        <td><?php echo $row["citizenship"]?></td>
        <td><?php echo $row["status"]?></td>
        <td><?php echo $row["work"]?></td>
        
      </tr>
      
      <?php }?>
    </tbody>
  </table>
  </center>
</body>
</html>