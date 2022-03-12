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

// ---------------------------------DECEASED SUBMIT------------------------------------
if(isset($_POST["btn-submit-dead"])){
  $dead_family_name=mysqli_real_escape_string($con, $_POST["dead-family-name"]);
  $dead_first_name=mysqli_real_escape_string($con, $_POST["dead-first-name"]);
  $dead_middle_name=mysqli_real_escape_string($con, $_POST["dead-middle-name"]);
  $dead_gender=mysqli_real_escape_string($con, $_POST["dead-gender"]);
  $dead_citizenship=mysqli_real_escape_string($con, $_POST["dead-citizenship"]);
  $dead_civil_status=mysqli_real_escape_string($con, $_POST["dead-civil-status"]);
  $customer_id=mysqli_real_escape_string($con, $_POST["customer-id"]);
  $relative=mysqli_real_escape_string($con, $_POST["dead-relative"]);
  $relative_surname=mysqli_real_escape_string($con, $_POST["dead-relative-surname"]);
  $relationship=mysqli_real_escape_string($con, $_POST["dead-relationship"]);
  $internment_date=mysqli_real_escape_string($con, $_POST["dead-intern"]);
  $date_of_birth=mysqli_real_escape_string($con, $_POST["dead-bday"]);
  $date_of_death=mysqli_real_escape_string($con, $_POST["dead-death"]);
  // $death_cert=mysqli_real_escape_string($con, $_POST["death-cert"]);
  // $burial_permit=mysqli_real_escape_string($con, $_POST["burial-permit"]);
  // $deed_of_sale=mysqli_real_escape_string($con, $_POST["deed-of-sale"]);

  $death_cert="death-cert";
  $burial_permit="burial-permit";
  $deed_of_sale="deed-of-sale";

  $sql=$con->query("INSERT INTO `deceased`(`customer_id`, `dead_family_name`, `dead_fname`, `dead_mname`, `dead_gender`, `dead_citizenship`, `dead_civil-status`, `dead_relative`, `dead_relative_surname`, `dead_relationship`, `internment_date`, `date_of_birth`, `date_of_death`, `death_cert`, `burial_permit`, `deed_of_sale`) VALUES ('$customer_id', '$dead_family_name', '$dead_first_name', '$dead_middle_name', '$dead_gender', '$dead_citizenship', '$dead_civil_status', '$relative', '$relative_surname', '$relationship', '$internment_date', '$date_of_birth', '$date_of_death', '$death_cert', '$burial_permit', '$deed_of_sale')");

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
}