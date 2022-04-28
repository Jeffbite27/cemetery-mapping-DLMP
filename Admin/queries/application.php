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
  date_default_timezone_set('Asia/Manila');
  $date=date("Y-m-d");

  $sql=$con->query("SELECT * FROM `customers` WHERE `family_name`='$family_name' AND `first_name`='$first_name' AND `middle_name`='$middle_name'");
  $row=$sql->fetch_array();
  

  if($family_name!=isset($row["family_name"])&&$first_name!=isset($row["first_name"])&&$middle_name!=isset($row["middle_name"])){
    $sql=$con->query("INSERT INTO `customers`(`family_name`, `first_name`, `middle_name`, `nickname`, `address`, `contact`, `email`, `bday`, `gender`, `religion`, `citizenship`, `status`, `work`, `date`) VALUES ('$family_name','$first_name','$middle_name','$nickname','$address','$contact','$email','$bday','$gender','$religion','$citizenship','$civil_status','$work', '$date')");

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
// ---------------------------------CUSTOMER UPDATE------------------------------------
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

  $time=time();
  $deed_of_sale=$fullname.'_'.$time.'.'.pathinfo($_FILES["owner-deed-sale"]['name'], PATHINFO_EXTENSION);
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
// ---------------------------------LOT OWNER UPDATE---------------------------------
if(isset($_POST["btn-update-owner-setup"])){
  $lot_owner_id=mysqli_real_escape_string($con, $_POST["edit-lot-owner-id"]);
  $fullname=mysqli_real_escape_string($con, $_POST["edit-owner-fullname"]);
  $site_id=mysqli_real_escape_string($con, $_POST["edit-customer-site"]);
  $block_id=mysqli_real_escape_string($con, $_POST["edit-customer-block"]);
  $lot_id=mysqli_real_escape_string($con, $_POST["edit-customer-lot"]);
  $sector=mysqli_real_escape_string($con, $_POST["edit-customer-sector"]);
  
  $sql_lot_owner=$con->query("SELECT * FROM `lot_owners` WHERE `lot_owner_id`='$lot_owner_id'");
  $rows=$sql_lot_owner->fetch_array();

  $sql=$con->query("SELECT * FROM `lot_owners` WHERE `site_id`='$site_id' AND `block_id`='$block_id' AND `lot_id`='$lot_id' AND `lot_owner_id`!='$lot_owner_id'");
  $row=$sql->fetch_array();

  $sql_lots=$con->query("SELECT * FROM `tbl_blocks` INNER JOIN `tbl_lots` ON tbl_blocks.block_id=tbl_lots.block_id WHERE tbl_lots.site_id='$site_id' AND tbl_lots.block_id='$block_id' AND tbl_lots.lot_id='$lot_id' AND tbl_blocks.sector='$sector'");

  if($sql_lots->num_rows!=0){
    if($site_id!=isset($row["site_id"])&&$block_id!=isset($row["block_id"])&&$lot_id!=isset($row["lot_id"])){


      if(!empty($_FILES["edit-owner-deed-sale"]["name"])){
        if(!empty($rows["deed_of_sale"])){
          unlink("files/deed_of_sales/".$rows["deed_of_sale"]);
        }
        $time=time();
        $deed_of_sale=$fullname.'_'.$time.'.'.pathinfo($_FILES["edit-owner-deed-sale"]['name'], PATHINFO_EXTENSION);
        $deed_of_saleTarget="files/deed_of_sales/".$deed_of_sale;
        move_uploaded_file($_FILES["edit-owner-deed-sale"]["tmp_name"], $deed_of_saleTarget);
      }else{
        $deed_of_sale=$rows["deed_of_sale"];
      }

      $sql_update=$con->query("UPDATE `lot_owners` SET `site_id`='$site_id', `block_id`='$block_id', `lot_id`='$lot_id', `deed_of_sale`='$deed_of_sale' WHERE `lot_owner_id`='$lot_owner_id'");
      $sql_dead=$con->query("UPDATE `deceased_persons` SET `site_id`='$site_id', `block_id`='$block_id', `lot_id`='$lot_id' WHERE `lot_owner_id`='$lot_owner_id'");

      echo "<script>
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Lot Owner Details Successfully Updated',
          text: 'You updated a lot owner details',
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
        title: 'Lot Owner Details Already Exists',
        text: 'Enter another lot owner details',
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
  }else{
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Lot Does not Exist',
      text: 'A lot you entered is not yet registered.',
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

  $time=time();
  $death_cert=$dead_first_name.'_'.$dead_family_name.'_'.$time.'.'.pathinfo($_FILES["death-cert"]['name'], PATHINFO_EXTENSION);
  $burial_permit=$dead_first_name.'_'.$dead_family_name.'_'.$time.'.'.pathinfo($_FILES["burial-permit"]['name'], PATHINFO_EXTENSION);

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
// ---------------------------------DECEASED UPDATE------------------------------------
if(isset($_POST["btn-edit-dead"])){
  $deceased_id=mysqli_real_escape_string($con, $_POST["edit-deceased-id"]);
  $dead_family_name=mysqli_real_escape_string($con, $_POST["edit-dead-family-name"]);
  $dead_first_name=mysqli_real_escape_string($con, $_POST["edit-dead-first-name"]);
  $dead_middle_name=mysqli_real_escape_string($con, $_POST["edit-dead-middle-name"]);
  $dead_gender=mysqli_real_escape_string($con, $_POST["edit-dead-gender"]);
  $dead_citizenship=mysqli_real_escape_string($con, $_POST["edit-dead-citizenship"]);
  $dead_civil_status=mysqli_real_escape_string($con, $_POST["edit-dead-civil-status"]);
  $relative=mysqli_real_escape_string($con, $_POST["edit-dead-relative"]);
  $relative_surname=mysqli_real_escape_string($con, $_POST["edit-dead-relative-surname"]);
  $relationship=mysqli_real_escape_string($con, $_POST["edit-dead-relationship"]);
  $internment_date=mysqli_real_escape_string($con, $_POST["edit-dead-intern"]);
  $date_of_birth=mysqli_real_escape_string($con, $_POST["edit-dead-bday"]);
  $date_of_death=mysqli_real_escape_string($con, $_POST["edit-dead-death"]);

  $sql_dead=$con->query("SELECT * FROM `deceased_persons` WHERE `deceased_id`='$deceased_id'");
  $rows=$sql_dead->fetch_array();

  $sql_deads=$con->query("SELECT * FROM `deceased_persons` WHERE `dead_fname`='$dead_first_name' AND `dead_mname`='$dead_middle_name' AND `dead_family_name`='$dead_family_name' AND `deceased_id`!='$deceased_id'");
  $row=$sql_deads->fetch_array();

  if($dead_first_name!=isset($row["dead_fname"])&&$dead_middle_name!=isset($row["dead_mname"])&&$dead_family_name!=isset($row["dead_family_name"])){
    if(!empty($_FILES["edit-death-cert"]['name'])){
      if(!empty($rows["death_cert"])){
        unlink("files/death_certificates/".$rows["death_cert"]);
      }
      $time=time();
      $death_cert=$dead_first_name.'_'.$dead_family_name.'_'.$time.'.'.pathinfo($_FILES["edit-death-cert"]['name'], PATHINFO_EXTENSION);
      $death_certTarget="files/death_certificates/".$death_cert;
      move_uploaded_file($_FILES["edit-death-cert"]["tmp_name"], $death_certTarget);
    }else{
      $death_cert=$rows["death_cert"];
    }

    if(!empty($_FILES["edit-burial-permit"]['name'])){
      if(!empty($rows["burial_permit"])){
        unlink("files/burial_permits/".$rows["burial_permit"]);
      }
      $time=time();
      $burial_permit=$dead_first_name.'_'.$dead_family_name.'_'.$time.'.'.pathinfo($_FILES["edit-burial-permit"]['name'], PATHINFO_EXTENSION);
      $burial_permitTarget="files/burial_permits/".$burial_permit;
      move_uploaded_file($_FILES["edit-burial-permit"]["tmp_name"], $burial_permitTarget);
    }else{
      $burial_permit=$rows["burial_permit"];
    }

    $sql=$con->query("UPDATE `deceased_persons` SET `dead_family_name`='$dead_family_name', `dead_fname`='$dead_first_name', `dead_mname`='$dead_middle_name', `dead_gender`='$dead_gender', `dead_citizenship`='$dead_citizenship', `dead_civil_status`='$dead_civil_status', `dead_relationship`='$relationship', `internment_date`='$internment_date', `date_of_birth`='$date_of_birth', `date_of_death`='$date_of_death', `death_cert`='$death_cert', `burial_permit`='$burial_permit' WHERE `deceased_id`='$deceased_id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Deceased Person Details Successfully Updated',
      text: 'You updated a deceased person details',
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
  }
}

// ----------------------------NEWS & EVENTS SUBMIT------------------------------------

if(isset($_POST["btn-submit-news"])){
  $news_title=mysqli_real_escape_string($con, $_POST["title"]);
  $news_subtitle=mysqli_real_escape_string($con, $_POST["subtitle"]);
  $news_description=mysqli_real_escape_string($con, $_POST["description"]);
  $news_date=mysqli_real_escape_string($con, $_POST["news_date"]);

  $sql=$con->query("SELECT * FROM `news_events` WHERE `news_title`='$news_title'");
  $row=$sql->fetch_array();

  if($news_title!=isset($row["news_title"])){

    $time=time();
    $news_thumbnail=$time.'.'.pathinfo($_FILES["thumbnail"]['name'], PATHINFO_EXTENSION);
    $news_thumbnail_saleTarget="files/news_img/".$news_thumbnail;

    $sql=$con->query("INSERT INTO `news_events`(`news_title`, `news_subtitle`, `news_description`, `news_date`, `news_img`) VALUES ('$news_title','$news_subtitle', '$news_description','$news_date','$news_thumbnail')");
    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $news_thumbnail_saleTarget);

    echo "<script>
      Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Successfully Added',
        text: 'You added News & Update',
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
      title: 'Title Already Exists',
      text: 'Enter another details',
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
// ----------------------------NEWS & EVENTS UPDATE------------------------------------

if(isset($_POST["btn-edit-news"])){
  $news_id=mysqli_real_escape_string($con, $_POST["edit_news_id"]);
  $news_title=mysqli_real_escape_string($con, $_POST["edit_title"]);
  $news_subtitle=mysqli_real_escape_string($con, $_POST["edit_subtitle"]);
  $news_description=mysqli_real_escape_string($con, $_POST["edit_description"]);
  $news_date=mysqli_real_escape_string($con, $_POST["edit_news_date"]);

  $sql_news=$con->query("SELECT * FROM `news_events` WHERE `news_id`='$news_id'");
  $rows=$sql_news->fetch_array();

  $sql=$con->query("SELECT * FROM `news_events` WHERE `news_title`='$news_title' AND `news_id`!='$news_id'");
  $row=$sql->fetch_array();

  if($news_title!=isset($row["news_title"])){
    if(!empty($_FILES["edit_thumbnail"]["name"])){
      if(!empty($rows["news_img"])){
        unlink("files/news_img/".$rows["news_img"]);
      }
      $time=time();
      $thumbnail=$time.'.'.pathinfo($_FILES["edit_thumbnail"]['name'], PATHINFO_EXTENSION);
      $thumbnailTarget="files/news_img/".$thumbnail;
      move_uploaded_file($_FILES["edit_thumbnail"]["tmp_name"], $thumbnailTarget);
    }else{
      $thumbnail=$rows["news_img"];
    }
    $sql=$con->query("UPDATE `news_events` SET `news_title`='$news_title',`news_subtitle`='$news_subtitle',`news_description`='$news_description',`news_date`='$news_date',`news_img`='$thumbnail' WHERE `news_id`='$news_id'");

    echo "<script>
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'A News and Event Successfully Updated',
          text: 'You updated a lot owner details',
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
        title: 'Title Already Exists',
        text: 'Enter another lot owner details',
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


if(isset($_POST["btn-submit-slideshow"])){
  $type=mysqli_real_escape_string($con, $_POST["slideshow-type"]);
  if($type=="Announcement"){
    $what=mysqli_real_escape_string($con, $_POST["what"]);
    $when=mysqli_real_escape_string($con, $_POST["when"]);
    $where=mysqli_real_escape_string($con, $_POST["where"]);
    $who=mysqli_real_escape_string($con, $_POST["who"]);
    $banner_img="no-img.jpg";

    $sql=$con->query("INSERT INTO `slideshow`(`type`, `what`, `when`, `where`, `who`, `banner_image`) VALUES ('$type','$what','$when','$where','$who','$banner_img')");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Announcement Successfully Added!',
      text: 'You added new announcement',
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

  }else if($type=="Banner"){
    $time=time();
    $banner_img=$time.'.'.pathinfo($_FILES["banner-img"]['name'], PATHINFO_EXTENSION);
    $banner_Target="files/banner_img/".$banner_img;
    move_uploaded_file($_FILES["banner-img"]["tmp_name"], $banner_Target);

    $sql=$con->query("INSERT INTO `slideshow`(`type`, `what`, `when`, `where`, `who`, `banner_image`) VALUES ('$type','N/A','N/A','N/A','N/A','$banner_img')");
    
    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Banner Successfully Added!',
      text: 'You added new banner',
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
//ANNOUNCEMENT
if(isset($_POST["btn-edit-slideshow-announce"])){
  $type=mysqli_real_escape_string($con, $_POST["edit-slideshow-type-announce"]);
  $id=mysqli_real_escape_string($con, $_POST["edit-id-announce"]);
  if($type=="Announcement"){
    $what=mysqli_real_escape_string($con, $_POST["edit-what-announce"]);
    $when=mysqli_real_escape_string($con, $_POST["edit-when-announce"]);
    $where=mysqli_real_escape_string($con, $_POST["edit-where-announce"]);
    $who=mysqli_real_escape_string($con, $_POST["edit-who-announce"]);
    $banner_img="no-img.jpg";

    $sql=$con->query("UPDATE `slideshow` SET `type`='$type',`what`='$what',`when`='$when',`where`='$where',`who`='$who',`banner_image`='$banner_img' WHERE `slideshow_id`='$id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Successfully Updated',
      text: 'You updated a slideshow',
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

  }else if ($type=="Banner"){
    $time=time();
    $banner_img=$time.'.'.pathinfo($_FILES["edit-banner-img-announce"]['name'], PATHINFO_EXTENSION);
    $banner_Target="files/banner_img/".$banner_img;
    move_uploaded_file($_FILES["edit-banner-img-announce"]["tmp_name"], $banner_Target);

    $sql=$con->query("UPDATE `slideshow` SET `type`='$type',`what`='N/A',`when`='N/A',`where`='N/A',`who`='N/A',`banner_image`='$banner_img' WHERE `slideshow_id`='$id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Successfully Updated',
      text: 'You updated a slideshow',
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
//BANNER
if(isset($_POST["btn-edit-slideshow-banner"])){
  $type=mysqli_real_escape_string($con, $_POST["edit-slideshow-type-banner"]);
  $id=mysqli_real_escape_string($con, $_POST["edit-id-banner"]);
  $sql1=$con->query("SELECT * FROM `slideshow` WHERE `slideshow_id`='$id'");
  $row=$sql1->fetch_array();

  if($type=="Announcement"){
    
    unlink("files/banner_img/".$row["banner_image"]);
    $what=mysqli_real_escape_string($con, $_POST["edit-what-banner"]);
    $when=mysqli_real_escape_string($con, $_POST["edit-when-banner"]);
    $where=mysqli_real_escape_string($con, $_POST["edit-where-banner"]);
    $who=mysqli_real_escape_string($con, $_POST["edit-who-banner"]);
    $banner_img="no-img.jpg";

    $sql=$con->query("UPDATE `slideshow` SET `type`='$type',`what`='$what',`when`='$when',`where`='$where',`who`='$who',`banner_image`='$banner_img' WHERE `slideshow_id`='$id'");

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Successfully Updated',
      text: 'You updated a slideshow',
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

  }else if ($type=="Banner"){
    unlink("files/banner_img/".$row["banner_image"]);
    
    $time=time();
    $banner_img=$time.'.'.pathinfo($_FILES["edit-banner-img-banner"]['name'], PATHINFO_EXTENSION);
    $banner_Target="files/banner_img/".$banner_img;
    move_uploaded_file($_FILES["edit-banner-img-banner"]["tmp_name"], $banner_Target);

    $sql=$con->query("UPDATE `slideshow` SET `type`='$type',`what`='N/A',`when`='N/A',`where`='N/A',`who`='N/A',`banner_image`='$banner_img' WHERE `slideshow_id`='$id'");
   

    echo "<script>
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Successfully Updated',
      text: 'You updated a slideshow',
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