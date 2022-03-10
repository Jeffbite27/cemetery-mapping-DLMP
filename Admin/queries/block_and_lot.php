<?php
if(isset($_POST["btn-submit-site"])){
  $site_name=mysqli_real_escape_string($con, $_POST["site-name"]);
  $square_meters=mysqli_real_escape_string($con, $_POST["site-sqm2"]);

  $sql=$con->query("INSERT INTO `tbl_sites`(`site_name`, `site_sqm2`, `total_blocks`, `total_lots`) VALUES ('$site_name','$square_meters','0','0')");

  echo "<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Garden Site Successfully Added',
    text: 'You added a new site',
    showConfirmButton: false,
    timer: 2000,
    allowOutsideClick: () => {
      const popup = Swal.getPopup()
      popup.classList.remove('swal2-show')
      setTimeout(() => {
        popup.classList.add('animate__animated', 'animate__headShake')
      })
      setTimeout(() => {
        popup.classList.remove('animate__animated', 'animate__headShake')
      }, 500)
      return false
    }
  })
  window.history.replaceState( null, null, window.location.href );
  </script>";

  header("refresh: 1;");
}
if(isset($_POST["btn-submit-block"])){
  $block_name=mysqli_real_escape_string($con, $_POST["block-name"]);
  $sector=mysqli_real_escape_string($con, $_POST["sector"]);
  $site_id=mysqli_real_escape_string($con, $_POST["site-id"]);

  $sql=$con->query("INSERT INTO `tbl_blocks`(`site_id`, `block_name`, `sector`, `total_lots`) VALUES ('$site_id','$block_name', '$sector','0')");

  $sql=$con->query("SELECT COUNT(`block_id`) AS `blocks` FROM `tbl_blocks` WHERE `site_id`='$site_id'");
  $row=$sql->fetch_array();
  $total_blocks=$row["blocks"];

  $sql=$con->query("UPDATE `tbl_sites` SET `total_blocks`='$total_blocks' WHERE `site_id`='$site_id'");

  echo "<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Block Successfully Added',
    text: 'You added a new block',
    showConfirmButton: false,
    timer: 2000,
    allowOutsideClick: () => {
      const popup = Swal.getPopup()
      popup.classList.remove('swal2-show')
      setTimeout(() => {
        popup.classList.add('animate__animated', 'animate__headShake')
      })
      setTimeout(() => {
        popup.classList.remove('animate__animated', 'animate__headShake')
      }, 500)
      return false
    }
  })
  window.history.replaceState( null, null, window.location.href );
  </script>";

  header("refresh: 1;");
}