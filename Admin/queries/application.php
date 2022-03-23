<?php
// ---------------------------------CUSTOMER SUBMIT------------------------------------
if(isset($_POST["btn-submit-customer"])){
  $family_name=mysqli_real_escape_string($con, $_POST["family-name"]);
  $first_name=mysqli_real_escape_string($con, $_POST["first-name"]);
  $middle_name=mysqli_real_escape_string($con, $_POST["middle-name"]);
  $nickname=mysqli_real_escape_string($con, $_POST["nickname"]);
  $address=mysqli_real_escape_string($con, $_POST["home-address"]);
  $contact=mysqli_real_escape_string($con, $_POST["contact"]);
  $email=mysqli_real_escape_string($con, $_POST["email"]);
  $bday=mysqli_real_escape_string($con, $_POST["bday"]);
  $gender=mysqli_real_escape_string($con, $_POST["gender"]);
  $religion=mysqli_real_escape_string($con, $_POST["religion"]);
  $citizenship=mysqli_real_escape_string($con, $_POST["citizenship"]);
  $civil_status=mysqli_real_escape_string($con, $_POST["civil-status"]);
  $work=mysqli_real_escape_string($con, $_POST["work"]);

  $sql=$con->query("SELECT * FROM `customers` WHERE `family_name`='$family_name' AND `first_name`='$first_name' AND `middle_name`='$middle_name'");
  $row=$sql->fetch_array();

  if($family_name!=isset($row["family_name"])&&$first_name!=isset($row["first_name"])&&$middle_name!=isset($row["middle_name"])){
    $sql=$con->query("INSERT INTO `customers`(`family_name`, `first_name`, `middle_name`, `nickname`, `address`, `contact`, `email`, `bday`, `gender`, `religion`, `citizenship`, `status`, `work`) VALUES ('$family_name','$first_name','$middle_name','$nickname','$address','$contact','$email','$bday','$gender','$religion','$citizenship','$civil_status','$work')");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Successfully Registered',
      text: 'You added a new customer',
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
      title: 'Customer Already Exists',
      text: 'Enter another customer details',
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
if(isset($_POST["btn-update"])){
  $modal_customer_id=mysqli_real_escape_string($con, $_POST["modal-customer-id"]);
  $modal_family_name=mysqli_real_escape_string($con, $_POST["modal-family-name"]);
  $modal_first_name=mysqli_real_escape_string($con, $_POST["modal-first-name"]);
  $modal_middle_name=mysqli_real_escape_string($con, $_POST["modal-middle-name"]);
  $modal_nickname=mysqli_real_escape_string($con, $_POST["modal-nickname"]);
  $modal_address=mysqli_real_escape_string($con, $_POST["modal-home-address"]);
  $modal_contact=mysqli_real_escape_string($con, $_POST["modal-contact"]);
  $modal_email=mysqli_real_escape_string($con, $_POST["modal-email"]);
  $modal_bday=mysqli_real_escape_string($con, $_POST["modal-bday"]);
  $modal_gender=mysqli_real_escape_string($con, $_POST["modal-gender"]);
  $modal_religion=mysqli_real_escape_string($con, $_POST["modal-religion"]);
  $modal_citizenship=mysqli_real_escape_string($con, $_POST["modal-citizenship"]);
  $modal_civil_status=mysqli_real_escape_string($con, $_POST["modal-civil-status"]);
  $modal_work=mysqli_real_escape_string($con, $_POST["modal-work"]);

  $sql=$con->query("UPDATE `customers` SET `family_name`='$modal_family_name',`first_name`='$modal_first_name',`middle_name`='$modal_middle_name',`nickname`='$modal_nickname',`address`='$modal_address',`contact`='$modal_contact',`email`='$modal_email',`bday`='$modal_bday',`gender`='$modal_gender',`religion`='$modal_religion',`citizenship`='$modal_citizenship',`status`='$modal_civil_status',`work`='$modal_work' WHERE `customer_id`='$modal_customer_id'");

  echo "<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Successfully Updated',
    text: 'You updated the details of $modal_first_name $modal_family_name',
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
// ---------------------------------LOT OWNER SUBMIT---------------------------------
if(isset($_POST["btn-owner-setup"])){
  $fullname=mysqli_real_escape_string($con, $_POST["owner-fullname"]);
  $customer_id=mysqli_real_escape_string($con, $_POST["customer-id"]);
  $site_id=mysqli_real_escape_string($con, $_POST["customer-site"]);
  $block_id=mysqli_real_escape_string($con, $_POST["customer-block"]);
  $lot_id=mysqli_real_escape_string($con, $_POST["customer-lot"]);
  $deed_of_sale=$fullname.'.'.pathinfo($_FILES["owner-deed-sale"]['name'], PATHINFO_EXTENSION);
  $deed_of_saleTarget="files/deed_of_sales/".$deed_of_sale;

  $sql=$con->query("SELECT * FROM `lot_owners` WHERE `site_id`='$site_id' AND `block_id`='$block_id' AND `lot_id`='$lot_id'");
  $row=$sql->fetch_array();
  if($site_id!=isset($row["site_id"])&&$block_id!=isset($row["block_id"])&&$lot_id!=isset($row["lot_id"])){
    $sql=$con->query("INSERT INTO `lot_owners`(`customer_id`, `site_id`, `block_id`, `lot_id`, `deed_of_sale`) VALUES ('$customer_id','$site_id','$block_id','$lot_id','$deed_of_sale')");
    move_uploaded_file($_FILES["owner-deed-sale"]["tmp_name"], $deed_of_saleTarget);
    echo "<script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Successfully added $fullname as lot owner',
        text: 'You added a new lot owner',
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
      title: 'Lot Owned By Someone Else',
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
// ---------------------------------DECEASED SUBMIT------------------------------------
if(isset($_POST["btn-submit-dead"])){
  $dead_family_name=mysqli_real_escape_string($con, $_POST["dead-family-name"]);
  $dead_first_name=mysqli_real_escape_string($con, $_POST["dead-first-name"]);
  $dead_middle_name=mysqli_real_escape_string($con, $_POST["dead-middle-name"]);
  $dead_gender=mysqli_real_escape_string($con, $_POST["dead-gender"]);
  $dead_citizenship=mysqli_real_escape_string($con, $_POST["dead-citizenship"]);
  $dead_civil_status=mysqli_real_escape_string($con, $_POST["dead-civil-status"]);
  $lot_owner_id=mysqli_real_escape_string($con, $_POST["lot-owner-id"]);
  $customer_id=mysqli_real_escape_string($con, $_POST["customer-id"]);
  $site_id=mysqli_real_escape_string($con, $_POST["site-id"]);
  $block_id=mysqli_real_escape_string($con, $_POST["block-id"]);
  $lot_id=mysqli_real_escape_string($con, $_POST["lot-id"]);
  $relative=mysqli_real_escape_string($con, $_POST["dead-relative"]);
  $relative_surname=mysqli_real_escape_string($con, $_POST["dead-relative-surname"]);
  $relationship=mysqli_real_escape_string($con, $_POST["dead-relationship"]);
  $internment_date=mysqli_real_escape_string($con, $_POST["dead-intern"]);
  $date_of_birth=mysqli_real_escape_string($con, $_POST["dead-bday"]);
  $date_of_death=mysqli_real_escape_string($con, $_POST["dead-death"]);

  $death_cert=$dead_first_name.'_'.$dead_family_name.'.'.pathinfo($_FILES["death-cert"]['name'], PATHINFO_EXTENSION);
  $burial_permit=$dead_first_name.'_'.$dead_family_name.'.'.pathinfo($_FILES["burial-permit"]['name'], PATHINFO_EXTENSION);

  $death_certTarget="files/death_certificates/".$death_cert;
  $burial_permitTarget="files/burial_permits/".$burial_permit;

  $sql_dead=$con->query("SELECT * FROM `deceased_persons` WHERE `dead_fname`='$dead_first_name' AND `dead_mname`='$dead_middle_name' AND `dead_family_name`='$dead_family_name'");
  $sql_site=$con->query("SELECT * FROM `deceased_persons` WHERE `site_id`='$site_id' AND `block_id`='$block_id' AND `lot_id`='$lot_id'");
  $row=$sql_dead->fetch_array();
  $rows=$sql_site->fetch_array();
  if($dead_first_name==isset($row["dead_fname"])&&$dead_middle_name==isset($row["dead_mname"])&&$dead_family_name==isset($row["dead_family_name"])){
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Deceased Person is Already Exists',
      text: 'Enter another deceased person details',
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
  }else if($site_id==isset($rows["site_id"])&&$block_id==isset($rows["block_id"])&&$lot_id==isset($rows["lot_id"])){
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Grave Address Owned By Someone Else',
      text: 'Please select other grave address',
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
    move_uploaded_file($_FILES["death-cert"]["tmp_name"], $death_certTarget);
    move_uploaded_file($_FILES["burial-permit"]["tmp_name"], $burial_permitTarget);
    $sql=$con->query("INSERT INTO `deceased_persons`(`lot_owner_id`, `customer_id`, `site_id`, `block_id`, `lot_id`, `dead_family_name`, `dead_fname`, `dead_mname`, `dead_gender`, `dead_citizenship`, `dead_civil_status`, `dead_relative`, `dead_relative_surname`, `dead_relationship`, `internment_date`, `date_of_birth`, `date_of_death`, `death_cert`, `burial_permit`) VALUES (' $lot_owner_id', '$customer_id', '$site_id', '$block_id', '$lot_id', '$dead_family_name', '$dead_first_name', '$dead_middle_name', '$dead_gender', '$dead_citizenship', '$dead_civil_status', '$relative', '$relative_surname', '$relationship', '$internment_date', '$date_of_birth', '$date_of_death', '$death_cert', '$burial_permit')");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Successfully Registered',
      text: 'You added a new deceased person',
      showConfirmButton: false,
      timer: 2000
    })

    window.history.replaceState( null, null, window.location.href );
    </script>";
    header("refresh: 1;");
  }
  
}