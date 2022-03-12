<?php
// --------------------ADD AND EDIT SITE-------------------------------
if(isset($_POST["btn-submit-site"])){
  $site_name=mysqli_real_escape_string($con, $_POST["site-name"]);
  $square_meters=mysqli_real_escape_string($con, $_POST["site-sqm2"]);
  
  $sql=$con->query("SELECT * FROM `tbl_sites` WHERE `site_name`='$site_name'");
  $row=$sql->fetch_array();

  if($site_name!=isset($row["site_name"])){
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
  }else{
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Site Already Exists',
      text: 'Enter another site name',
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
  
}
if(isset($_POST["btn-update-site"])){
  $site_name=mysqli_real_escape_string($con, $_POST["edit-site-name"]);
  $square_meters=mysqli_real_escape_string($con, $_POST["edit-site-sqm2"]);
  $site_id=mysqli_real_escape_string($con, $_POST["edit-site-id"]);
  
  $sql=$con->query("SELECT * FROM `tbl_sites` WHERE `site_name`='$site_name' AND `site_id`!='$site_id'");
  $row=$sql->fetch_array();

  if($site_name!=isset($row["site_name"])){
    $sql=$con->query("UPDATE `tbl_sites` SET `site_name`='$site_name', `site_sqm2`='$square_meters' WHERE `site_id`='$site_id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Garden Site Successfully Updated',
      text: 'You updated a site',
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
  }else{
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Site Already Exists',
      text: 'Enter another site details',
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
  }

}
// --------------------ADD AND EDIT BLOCK-------------------------------
if(isset($_POST["btn-submit-block"])){
  $block_name=mysqli_real_escape_string($con, $_POST["block-name"]);
  $sector=mysqli_real_escape_string($con, $_POST["sector"]);
  $site_id=mysqli_real_escape_string($con, $_POST["site-id"]);

  $sql=$con->query("SELECT * FROM `tbl_blocks` WHERE `block_name`='$block_name' AND `sector`='$sector' AND `site_id` ='$site_id'");
  $row_block=$sql->fetch_array();

  if($block_name!=isset($row_block["block_name"])&&$sector!=isset($row_block["sector"])&&$site_id!=isset($row_block["site_id"])){

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

  }else{
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Block Already Exists',
      text: 'Enter another block details',
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

}
if(isset($_POST["btn-update-block"])){
  $block_name=mysqli_real_escape_string($con, $_POST["edit-block-name"]);
  $sector=mysqli_real_escape_string($con, $_POST["edit-sector-block"]);
  $block_id=mysqli_real_escape_string($con, $_POST["edit-block-id"]);
  $site_id=mysqli_real_escape_string($con, $_POST["edit-site-id"]);
  
  $sql=$con->query("SELECT * FROM `tbl_blocks` WHERE `block_name`='$block_name' AND `sector`='$sector' AND `site_id`='$site_id' AND `block_id`!='$block_id'");
  $row=$sql->fetch_array();

  if($block_name!=isset($row["block_name"])&&$sector!=isset($row["sector"])){
    $sql=$con->query("UPDATE `tbl_blocks` SET `block_name`='$block_name', `sector`='$sector' WHERE `block_id`='$block_id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Block Successfully Updated',
      text: 'You updated a block',
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
  }else{
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Block Already Exists',
      text: 'Enter another block details',
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
    
  }

}
// --------------------ADD AND EDIT LOT-------------------------------
if(isset($_POST["btn-submit-lot"])){
  $site_id=mysqli_real_escape_string($con, $_POST["site-lot"]);
  $block_id=mysqli_real_escape_string($con, $_POST["block-lot"]);
  $sector=mysqli_real_escape_string($con, $_POST["sector-lot"]);
  $lot_name=mysqli_real_escape_string($con, $_POST["lot-name"]);
  $lawn_type=mysqli_real_escape_string($con, $_POST["lawn-type"]);
  
  $sql=$con->query("SELECT * FROM `tbl_lots` WHERE `lot_name`='$lot_name' AND `block_id`='$block_id' AND `site_id`='$site_id'");
  $row_lot=$sql->fetch_array();

  if($site_id!=isset($row_lot["site_id"])&&$block_id!=isset($row_lot["block_id"])&&$sector!=isset($row_lot["sector"])&&$lot_name!=isset($row_lot["lot_name"])){

    $sql=$con->query("INSERT INTO `tbl_lots`(`block_id`, `site_id`, `lot_name`, `lawn_type`) VALUES ('$block_id','$site_id','$lot_name','$lawn_type')");
  
    $sql=$con->query("SELECT COUNT(`lot_id`) AS `lots` FROM `tbl_lots` WHERE `site_id`='$site_id'");
    $row=$sql->fetch_array();
    $total_lots=$row["lots"];

    $sql=$con->query("SELECT COUNT(`lot_id`) AS `lots_block` FROM `tbl_lots` WHERE `block_id`='$block_id'");
    $row=$sql->fetch_array();
    $total_lots_block=$row["lots_block"];

    $sql=$con->query("UPDATE `tbl_sites` SET `total_lots`='$total_lots' WHERE `site_id`='$site_id'");
    $sql=$con->query("UPDATE `tbl_blocks` SET `total_lots`='$total_lots_block' WHERE `block_id`='$block_id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Lot Successfully Added',
      text: 'You added a new lot',
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
  }else{
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Lot Already Exists',
      text: 'Enter another lot details',
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
  
  }
}

if(isset($_POST["btn-update-lot"])){
  $lot_id=mysqli_real_escape_string($con, $_POST["edit-lot-id"]);
  $lot_name=mysqli_real_escape_string($con, $_POST["edit-lot-name"]);
  $block_id=mysqli_real_escape_string($con, $_POST["edit-block-id"]);
  // $sector=mysqli_real_escape_string($con, $_POST["edit-sector-lot"]);
  $lawn_type=mysqli_real_escape_string($con, $_POST["edit-lawn-type"]);

  $sql=$con->query("SELECT * FROM `tbl_lots` WHERE `lot_name`='$lot_name'AND `block_id`='$block_id' AND `lot_id`!='$lot_id'");
  $row=$sql->fetch_array();

  if($lot_name!=isset($row["lot_name"])&&$block_id!=isset($row["block_id"])){
    $sql=$con->query("UPDATE `tbl_lots` SET `lot_name`='$lot_name',`lawn_type`='$lawn_type' WHERE `lot_id`='$lot_id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Lot Successfully Updated',
      text: 'You updated a block',
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
  }else{
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Lot Already Exists',
      text: 'Enter another lot details',
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
  }
}