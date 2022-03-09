<?php
if(!isset($_SESSION)){
  session_start();    
}

include("../../config.php");
$con=connect();
extract($_POST);

$sql=$con->query("SELECT * FROM `customers` WHERE `first-name`='$relative' AND `family-name`='$relative_surname'");
$row=$sql->fetch_array();

if($relative!=""&&$relative_surname!=""){
  if($relative!=isset($row["first-name"])&&$relative_surname!=isset($row["family-name"])){
    echo "No relative found.";
    echo "<script>
    $('#customer-id').val('');
    </script>";
  }else{
    $customer_id=$row["customer-id"];
    echo "<script>
    $('#customer-id').val($customer_id);
    </script>";
  }
}