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

  $sql=$con->query("INSERT INTO `customers`(`family-name`, `first-name`, `middle-name`, `nickname`, `address`, `contact`, `email`, `bday`, `gender`, `religion`, `citizenship`, `status`, `work`) VALUES ('$family_name','$first_name','$middle_name','$nickname','$address','$contact','$email','$bday','$gender','$religion','$citizenship','$civil_status','$work')");

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

  header("refresh: 2;");
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

  $sql=$con->query("INSERT INTO `deceased`(`customer-id`, `dead-family-name`, `dead-fname`, `dead-mname`, `dead-gender`, `dead-citizenship`, `dead-civil-status`, `dead-relative`, `dead-relative-surname`, `dead-relationship`, `internment-date`, `date-of-birth`, `date-of-death`, `death-cert`, `burial-permit`, `deed-of-sale`) VALUES ('$customer_id', '$dead_family_name', '$dead_first_name', '$dead_middle_name', '$dead_gender', '$dead_citizenship', '$dead_civil_status', '$relative', '$relative_surname', '$relationship', '$internment_date', '$date_of_birth', '$date_of_death', '$death_cert', '$burial_permit', '$deed_of_sale')");

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