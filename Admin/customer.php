<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();

  $customers=$con->query("SELECT * FROM `customers`");
  $customer_info=$con->query("SELECT * FROM `customers`");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
    <title>Divine Life Memorial Park</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Assets/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Assets/css/index_admin.css">
    
    <script src="../Assets/js/sweetalert.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php include("queries/application.php");?>
  <div class="sidebar close">

    <div class="logo-details">
      <img src="../Assets/image/logopngplain.png" alt="">
    </div>

    <ul class="nav-links">
      
      <li class="tabs">
        <a href="dashboard.php">
          <i class='bx bx-grid-alt bx-rotate-180' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="dashboard.php">Dashboard</a></li>
        </ul>
      </li>

      <!-- <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-carousel'></i>
            <span class="link_name">Pages</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Pages</a></li>
          <li><a href="#">Slideshow</a></li>
          <li><a href="#">News & Events</a></li>
        </ul>
      </li> -->

      


      <li class="tabs active">
        <a href="customer.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Customer</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="customer.php">Customer</a></li>
        </ul>
      </li>

      <li class="tabs">
        <a href="#">
          <i class='bx bx-layer'></i>
          <span class="link_name">Block & Lot Setup</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Block & Lot Setup</a></li>
        </ul>
      </li>

      <li class="tabs">
        <a href="interment_Setup.php">
          <i class='bx bxs-user-rectangle' ></i>
          <span class="link_name">Interment Setup</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="interment_Setup.php">Interment Setup</a></li>
        </ul>
      </li>

      <li class="tabs">
        <a href="#">
          <i class='bx bx-map-alt' ></i>
          <span class="link_name">Grave Map</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Grave Map</a></li>
        </ul>
      </li>

      <li class="tabs">
        <a href="#">
          <i class='bx bx-bar-chart-square'></i>
          <span class="link_name">Reports</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Reports</a></li>
        </ul>
      </li>

      <li class="tabs">
        <a href="#">
          <i class='bx bx-carousel' ></i>
          <span class="link_name">Slideshow</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Slideshow</a></li>
        </ul>
      </li>

      <li class="tabs">
        <a href="#">
          <i class='bx bx-news'></i>
          <span class="link_name">News & Events</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">News & Events</a></li>
        </ul>
      </li>
      
    </ul>

  </div>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
    </div>
      <div class="main-container">
        <div class="content active">
          <div class="div-content">
            <h2 class="title-head d-flex align-items-center">
              <i class='bx bxs-user fs-1' ></i>
              &nbsp;CUSTOMER/OWNER</h2>
            <hr>
            <!-- <div class="row p-0">
              <div class="col-sm-12 col-md-12 mb-3 customer-section">
                <div class="bg-light p-5 h-100 rounded">
                  <div class="title text-start">
                    <h4> <i class='bx bx-align-left' ></i> Customer Application Form</h4>
                  </div>
                  <br>
                  <div class="form-group">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <div class="col-md-3 col-sm-6">
                        <label for="family-name">Family name:<i class="req">*</i></label>
                        <input type="text" name="family-name" id="family-name" class="form-control" placeholder="Surname" required>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="first-name">First name:<i class="req">*</i></label>
                        <input type="text" name="first-name" id="first-name" class="form-control" placeholder="Given name" required>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="middle-name">Middle name:</label>
                        <input type="text" name="middle-name" id="middle-name" class="form-control" placeholder="Middle name">
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="nickname">Other name:</label>
                        <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-12 col-sm-12">
                        <label for="home-address">Home Address:<i class="req">*</i></label>
                        <input type="text" name="home-address" id="home-address" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village - Brgy. - City - Province" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-3 col-sm-6">
                        <label for="contact">Contact No:<i class="req">*</i></label>
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact number" required>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="email">Email:<i class="req">*</i></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="bday">Birthday:<i class="req">*</i></label>
                        <input type="date" name="bday" id="bday" class="form-control" required>
                      </div>
                    
                      <div class="col-md-3 col-sm-6">
                        <label for="gender">Gender:<i class="req">*</i></label>
                        
                        <select name="gender" id="gender" class="form-select" required>
                            <option value="" selected disabled>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-5">
                      <div class="col-md-3 col-sm-6">
                        <label for="religion">Religion:<i class="req">*</i></label>
                        <input type="text" name="religion" id="religion" class="form-control" placeholder="Religion" required>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="citizenship">Citizenship:<i class="req">*</i></label>
                        <input type="text" name="citizenship" id="citizenship" class="form-control" placeholder="Citizenship" required>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="civil-status">Civil Status:<i class="req">*</i></label>
                        <select name="civil-status" id="civil-status" class="form-select" required>
                          <option value="" selected disabled>Select status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Seperated">Seperated</option>
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <label for="work">Occupation:<i class="req">*</i></label>
                        <select name="work" id="work" class="form-select" required>
                          <option value="" selected disabled>Select occupation</option>
                          <option value="Government Employee">Government Employee</option>
                          <option value="Private Employee">Private Employee</option>
                          <option value="Self-Employed">Self-Employed</option>
                          <option value="Unemployed">Unemployed</option>
                        </select>
                      </div>
                    </div> 
                    <div class="text-center">
                      <button type="submit" name="btn-submit-customer" id="btn-submit-customer" class="btn btn-primary">Submit</button>
                      <button type="reset" name="btn-clear" id="btn-clear" class="btn btn-danger">Clear</button>
                    </div>
                  </form> 
                  </div>
                </div>
              </div> -->

              <!-- <div class="col-sm-12 col-md-5 mb-3 deceased-section">
                <div class="bg-light p-3 h-100 rounded">
                  <div class="title text-center">
                    <h4>Deceased Application Form</h4>
                  </div>
                  <br>
                  <div class="form-group">
                    <form action="" method="post">
                    <div class="row mb-3">
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-family-name">Family name:<i class="req">*</i></label>
                        <input type="text" name="dead-family-name" id="dead-family-name" class="form-control" placeholder="Surname" required>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-first-name">First name:<i class="req">*</i></label>
                        <input type="text" name="dead-first-name" id="dead-first-name" class="form-control" placeholder="Given name" required>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-middle-name">Middle name:</label>
                        <input type="text" name="dead-middle-name" id="dead-middle-name" class="form-control" placeholder="Middle name">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4 col-sm-6">
                        <label for="dead-gender">Gender:<i class="req">*</i></label>
                        <select type="text" name="dead-gender" id="dead-gender" class="form-select" required>
                          <option value="" selected disabled>Select gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-md-4 col-sm-6">
                        <label for="dead-citizenship">Citizenship:<i class="req">*</i></label>
                        <input type="text" name="dead-citizenship" id="dead-citizenship" placeholder="Citizenship" class="form-control" required>
                      </div>
                      <div class="col-md-4 col-sm-2">
                        <label for="dead-civil-status">Civil Status:<i class="req">*</i></label>
                        <select type="text" name="dead-civil-status" id="dead-civil-status" class="form-select" required>
                          <option value="" disabled selected>Civil Status</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Widowed">Widowed</option>
                          <option value="Seperated">Seperated</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-relative">Relative:<i class="req">*</i></label>
                        <input type="text" name="dead-relative" id="dead-relative" placeholder="First name" class="form-control" required>
                        <input type="hidden" id="customer-id" name="customer-id">
                        <small class="text-danger" id="relative-error"></small>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-relative-surname"></label>
                        <input type="text" name="dead-relative-surname" id="dead-relative-surname" placeholder="Surname" class="form-control" required>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-relationship">Relationship:<i class="req">*</i></label>
                        <select type="text" name="dead-relationship" id="dead-relationship" class="form-select" required>
                          <option value="" disabled selected>Relationship</option>
                          <option value="Child">Child</option>
                          <option value="Father">Father</option>
                          <option value="Mother">Mother</option>
                          <option value="Sibling">Sibling</option>
                          <option value="Spouse">Spouse</option>
                          <option value="Grandparent">Grandparent</option>
                          <option value="Grandchild">Grandchild</option>
                          <option value="Parent's sibling">Parent's sibling</option>
                          <option value="Sibling's child">Sibling's child</option>
                          <option value="Cousin">Cousin</option>
                          <option value="Father-In-Law">Father-In-Law</option>
                          <option value="Mother-In-Law">Mother-In-Law</option>
                          <option value="Brother-In-Law">Brother-In-Law</option>
                          <option value="Sister-In-Law">Sister-In-Law</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-intern">Internment Date:<i class="req">*</i></label>
                        <input type="date" name="dead-intern" id="dead-intern" class="form-control" required>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-bday">Date of Birth:<i class="req">*</i></label>
                        <input type="date" name="dead-bday" id="dead-bday" class="form-control" required>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="dead-death">Date of Death:<i class="req">*</i></label>
                        <input type="date" name="dead-death" id="dead-death" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-4 col-sm-4">
                        <label for="death-cert">Death Certificate:<i class="req">*</i></label>
                        <input type="file" name="death-cert" id="death-cert" class="form-control" required>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="burial-permit">Burial Permit:<i class="req">*</i></label>
                        <input type="file" name="burial-permit" id="burial-permit" class="form-control" required>
                      </div>
                      <div class="col-md-4 col-sm-4">
                        <label for="deed-of-sale">Deed of Sale:<i class="req">*</i></label>
                        <input type="file" name="deed-of-sale" id="deed-of-sale" class="form-control" required>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="btn-submit-dead" id="btn-submit-dead" class="btn btn-primary">Submit</button>
                      <button type="reset" name="btn-clear" id="btn-clear" class="btn btn-danger">Clear</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div> -->
            <!-- </div> -->

            <div class="row p-0">
              <div class="col-sm-12 col-md-12">
                <div class="bg-light p-4 h-100 rounded">
                  <div class="title-header bg-light sticky-top p-3 d-flex">
                    <h4 class="d-flex align-items-center">
                    <i class='bx bx-info-circle fs-2' ></i>
                    &nbsp;Customer's Information</h4>
                    <button class="btn btn-primary add-customer d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add-customer">
                      <i class='bx bxs-user-plus fs-4'></i> 
                      &nbsp;Add Customer
                    </button>
                  </div>
                  <br>
                  <div class="customer-table">
                    <table class="tbl-customer table table-striped table-bordered w-100" id="tbl-customer">
                      <thead class="tbl-customer-header text-light">
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Contact #</th>
                        <th>Email</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Religion</th>
                        <th>Citizenship</th>
                        <th>Civil Status</th>
                        <th>Occupation</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php while($row=$customers->fetch_array()){?>
                        <tr>
                          <td class="align-middle"><?php echo $row["customer-id"]?></td>
                          <td class="align-middle"><?php echo $row["first-name"].' '.$row["family-name"]?></td>
                          <td class="align-middle"><?php echo $row["address"]?></td>
                          <td class="align-middle"><?php echo $row["contact"]?></td>
                          <td class="align-middle"><?php echo $row["email"]?></td>
                          <td class="align-middle"><?php echo $row["bday"]?></td>
                          <td class="align-middle"><?php echo $row["gender"]?></td>
                          <td class="align-middle"><?php echo $row["religion"]?></td>
                          <td class="align-middle"><?php echo $row["citizenship"]?></td>
                          <td class="align-middle"><?php echo $row["status"]?></td>
                          <td class="align-middle"><?php echo $row["work"]?></td>
                          <td class="text-center align-middle">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-customer<?php echo $row["customer-id"]?>">
                              <i class='bx bxs-edit'></i>
                            </button>
                          </td>
                        </tr>
                        
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
<!------------------------- MODALS ADD CUSTOMER --------------------------------------->
            <div class="modal fade" id="add-customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl"> 
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                      <i class='bx bxs-user-plus fs-1' ></i>
                      &nbsp;Add Customer Details
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="post">
                    <div class="modal-body p-5">
                      <div class="row mb-2">
                        <div class="col-md-3 col-sm-6">
                          <label for="family-name">Family name:<i class="req">*</i></label>
                          <input type="text" name="family-name" id="family-name" class="form-control" placeholder="Surname" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="first-name">First name:<i class="req">*</i></label>
                          <input type="text" name="first-name" id="first-name" class="form-control" placeholder="Given name" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="middle-name">Middle name:</label>
                          <input type="text" name="middle-name" id="middle-name" class="form-control" placeholder="Middle name">
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="nickname">Other name:</label>
                          <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname">
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-12 col-sm-12">
                          <label for="home-address">Home Address:<i class="req">*</i></label>
                          <input type="text" name="home-address" id="home-address" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village - Brgy. - City - Province" required>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-3 col-sm-6">
                          <label for="contact">Contact No:<i class="req">*</i></label>
                          <input type="text" name="contact" id="contact" class="form-control" placeholder="Contact number" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="email">Email:<i class="req">*</i></label>
                          <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="bday">Birthday:<i class="req">*</i></label>
                          <input type="date" name="bday" id="bday" class="form-control" required>
                        </div>
                      
                        <div class="col-md-3 col-sm-6">
                          <label for="gender">Gender:<i class="req">*</i></label>
                          
                          <select name="gender" id="gender" class="form-select" required>
                              <option value="" selected disabled>Select gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-2">
                        <div class="col-md-3 col-sm-6">
                          <label for="religion">Religion:<i class="req">*</i></label>
                          <input type="text" name="religion" id="religion" class="form-control" placeholder="Religion" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="citizenship">Citizenship:<i class="req">*</i></label>
                          <input type="text" name="citizenship" id="citizenship" class="form-control" placeholder="Citizenship" required>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="civil-status">Civil Status:<i class="req">*</i></label>
                          <select name="civil-status" id="civil-status" class="form-select" required>
                            <option value="" selected disabled>Select status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Seperated">Seperated</option>
                          </select>
                        </div>
                        <div class="col-md-3 col-sm-6">
                          <label for="work">Occupation:<i class="req">*</i></label>
                          <select name="work" id="work" class="form-select" required>
                            <option value="" selected disabled>Select occupation</option>
                            <option value="Government Employee">Government Employee</option>
                            <option value="Private Employee">Private Employee</option>
                            <option value="Self-Employed">Self-Employed</option>
                            <option value="Unemployed">Unemployed</option>
                          </select>
                        </div>
                      </div> 
                    </div>
                    <div class="modal-footer">
                      <button type="submit" name="btn-submit-customer" id="btn-submit-customer" class="btn btn-primary">Register</button>
                      <button type="reset" class="btn btn-danger">Reset</button> 
                    </div>
                  </form>
                </div>
              </div>        
            </div>
        </div>
      </div>
  </section>
  <!------------------------- MODALS EDIT CUSTOMER------------------------------------->
  <?php while($row=$customer_info->fetch_array()){?>
  <div class="modal fade" id="edit-customer<?php echo $row["customer-id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-edit fs-1'></i> 
            &nbsp;Edit Customer's Details
          </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="">
          <div class="modal-body p-5">
            <input type="hidden" name="customer-ID" value="<?php echo $row["customer-id"]?>">
            <div class="row mb-2">
              <div class="col-md-3 col-sm-6">
                <label for="modal-family-name">Family name:<i class="req">*</i></label></label>
                <input type="text" name="modal-family-name" id="modal-family-name" class="form-control" placeholder="Surname" value="<?php echo $row["family-name"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-first-name">First name:<i class="req">*</i></label></label>
                <input type="text" name="modal-first-name" id="modal-first-name" class="form-control" placeholder="Given name" value="<?php echo $row["first-name"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-middle-name">Middle name:</label>
                <input type="text" name="modal-middle-name" id="modal-middle-name" class="form-control" placeholder="Middle name" value="<?php echo $row["middle-name"]?>">
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-nickname">Other name:</label>
                <input type="text" name="modal-nickname" id="modal-nickname" class="form-control" placeholder="Nickname" value="<?php echo $row["nickname"]?>">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12 col-sm-12">
                <label for="modal-address">Home Address:<i class="req">*</i></label></label>
                <input type="text" name="modal-address" id="modal-address" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village - Brgy. - City - Province" value="<?php echo $row["address"]?>" required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-3 col-sm-6">
                <label for="modal-contact">Contact No:<i class="req">*</i></label>
                <input type="text" name="modal-contact" id="modal-contact" class="form-control" placeholder="Contact number" value="<?php echo $row["contact"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-email">Email:<i class="req">*</i></label>
                <input type="email" name="modal-email" id="modal-email" class="form-control" placeholder="Email address" value="<?php echo $row["email"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-bday">Birthday:<i class="req">*</i></label>
                <input type="date" name="modal-bday" id="modal-bday" class="form-control" placeholder="Contact number" value="<?php echo $row["contact"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-gender">Gender:<i class="req">*</i></label>
                <select name="modal-gender" id="modal-gender" class="form-select" required>
                    <option value="<?php echo $row["gender"]?>"><?php echo $row["gender"]?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-3 col-sm-6">
                <label for="modal-religion">Religion:<i class="req">*</i></label>
                <input type="text" name="modal-religion" id="modal-religion" class="form-control" placeholder="Religion" value="<?php echo $row["religion"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-citizenship">Citizenship:<i class="req">*</i></label>
                <input type="text" name="modal-citizenship" id="modal-citizenship" class="form-control" placeholder="Citizenship" value="<?php echo $row["citizenship"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-civil-status">Civil Status:<i class="req">*</i></label>
                <select name="modal-civil-status" id="modal-civil-status" class="form-select" required>
                    <option value="<?php echo $row["status"]?>"><?php echo $row["status"]?></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Seperated">Seperated</option>
                </select>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-work">Occupation:<i class="req">*</i></label>
                <select name="modal-work" id="modal-work" class="form-select" required>
                    <option value="<?php echo $row["work"]?>"><?php echo $row["work"]?></option>
                    <option value="Government Employee">Government Employee</option>
                    <option value="Private Employee">Private Employee</option>
                    <option value="Self-Employed">Self-Employed</option>
                    <option value="Unemployed">Unemployed</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> 
          </div>
        </form>
      </div>
    </div>        
  </div>
  <?php }?>

 
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
  <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
  <script src="../Assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
  <script src="../Assets/js/index_admin.js" defer></script>
    
</body>
</html>