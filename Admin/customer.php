<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();
  if(isset($_SESSION["username"])){
    $customers=$con->query("SELECT * FROM `customers`");
    $customer_info=$con->query("SELECT * FROM `customers`");
    $customer_info_lot=$con->query("SELECT * FROM `customers`");
  }else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
    <title>Block & Lot Setup | Divine Life Memorial Park</title>

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
      
      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
        <a href="dashboard.php">
          <i class='bx bx-grid-alt bx-rotate-180' ></i>
          <span class="link_name">Dashboard</span>
        </a>
      </li>

      <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customer">
        <a href="customer.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Customer</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Block & Lot Setup">
        <a href="block-and-lot.php">
          <i class='bx bx-layer'></i>
          <span class="link_name">Block & Lot Setup</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Interment Setup">
        <a href="interment_Setup.php">
          <i class='bx bxs-user-rectangle' ></i>
          <span class="link_name">Interment Setup</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Grave Map">
        <a href="grave-map.php">
          <i class='bx bx-map-alt' ></i>
          <span class="link_name">Grave Map</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Slideshow">
        <a href="slideshow.php">
          <i class='bx bx-carousel' ></i>
          <span class="link_name">Slideshow</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="News & Events">
        <a href="news-events.php">
          <i class='bx bx-news'></i>
          <span class="link_name">News & Events</span>
        </a>
      </li>
      
    </ul>

    <button id="logout" data-username="<?php echo  $_SESSION["username"] ?>">
    <div class="admin-content">
      <div class="admin d-flex align-items-center">
        <div class="admin-details ">
          <i class='bx bx-log-out-circle' style="cursor: pointer"></i>
          <div class="admin-label">
            Logout
          </div>
        </div>
      </div>
    </div>
    </button>
  </div>
  <div class="notif"></div>

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
            <div class="row p-0">
              <div class="col-sm-12 col-md-12">
                <div class="bg-white p-4 h-100 rounded">
                  <div class="title-header bg-white sticky-top p-3 d-flex">
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
                    <table class="tbl-customer table table-striped table-bordered w-100" id="tbl-customer"  style="font-size: 15px">
                      <thead class="tbl-header text-light">
                        <th>#</th>
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
                        <th>Action</th>
                      </thead>
                      <tbody>
                        <?php while($row=$customers->fetch_array()){?>
                        <tr>
                          <td class="align-middle"><?php echo $row["customer_id"]?></td>
                          <td class="align-middle"><?php echo $row["first_name"].' '.$row["middle_name"].' '.$row["family_name"]?></td>
                          <td class="align-middle"><?php echo $row["address"]?></td>
                          <td class="align-middle"><?php echo $row["contact"]?></td>
                          <td class="align-middle"><?php echo $row["email"]?></td>
                          <td class="align-middle"><?php echo date("M j, Y", strtotime($row["bday"]))?></td>
                          <td class="align-middle"><?php echo $row["gender"]?></td>
                          <td class="align-middle"><?php echo $row["religion"]?></td>
                          <td class="align-middle"><?php echo $row["citizenship"]?></td>
                          <td class="align-middle"><?php echo $row["status"]?></td>
                          <td class="align-middle"><?php echo $row["work"]?></td>
                          <td class="text-center align-middle">
                            <button class="btn btn-primary mb-1" id="btn-select" data-bs-toggle="modal" data-bs-target="#select-owner<?php echo $row["customer_id"]?>">
                              <i class='bx bx-layer' ></i>
                            </button>
                            <button class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#edit-customer<?php echo $row["customer_id"]?>">
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
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
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
                          <input type="text" name="contact" id="contact" class="form-control" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" maxlength="11" placeholder="09XXxxxxxxx" required>
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
      </div>
  </section>
  <!------------------------- MODALS EDIT CUSTOMER------------------------------------->
  <?php while($row=$customer_info->fetch_array()){?>
  <div class="modal fade" id="edit-customer<?php echo $row["customer_id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-edit fs-1'></i> 
            &nbsp;Edit Customer's Details
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body p-5">
            <input type="hidden" name="modal-customer-id" value="<?php echo $row["customer_id"]?>">
            <div class="row mb-2">
              <div class="col-md-3 col-sm-6">
                <label for="modal-family-name">Family name:<i class="req">*</i></label></label>
                <input type="text" name="modal-family-name" id="modal-family-name" class="form-control" placeholder="Surname" value="<?php echo $row["family_name"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-first-name">First name:<i class="req">*</i></label></label>
                <input type="text" name="modal-first-name" id="modal-first-name" class="form-control" placeholder="Given name" value="<?php echo $row["first_name"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-middle-name">Middle name:</label>
                <input type="text" name="modal-middle-name" id="modal-middle-name" class="form-control" placeholder="Middle name" value="<?php echo $row["middle_name"]?>">
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-nickname">Other name:</label>
                <input type="text" name="modal-nickname" id="modal-nickname" class="form-control" placeholder="Nickname" value="<?php echo $row["nickname"]?>">
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-12 col-sm-12">
                <label for="modal-home-address">Home Address:<i class="req">*</i></label></label>
                <input type="text" name="modal-home-address" id="modal-home-address" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village - Brgy. - City - Province" value="<?php echo $row["address"]?>" required>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-3 col-sm-6">
                <label for="modal-contact">Contact No:<i class="req">*</i></label>
                <input type="text" name="modal-contact" id="modal-contact" class="form-control" pattern="(\+?\d{2}?\s?\d{3}\s?\d{3}\s?\d{4})|([0]\d{3}\s?\d{3}\s?\d{4})" maxlength="11" placeholder="09XXxxxxxxx" value="<?php echo $row["contact"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-email">Email:<i class="req">*</i></label>
                <input type="email" name="modal-email" id="modal-email" class="form-control" placeholder="Email address" value="<?php echo $row["email"]?>" required>
              </div>
              <div class="col-md-3 col-sm-6">
                <label for="modal-bday">Birthday:<i class="req">*</i></label>
                <input type="date" name="modal-bday" id="modal-bday" class="form-control" placeholder="Contact number" value="<?php echo $row["bday"]?>" required>
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
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">Update</button>
            <button type="reset" class="btn btn-danger">Reset</button> 
          </div>
        </form>
      </div>
    </div>        
  </div>
  <?php }?>
 <!------------------- MODALS SELECTED CUSTOMER------------------------------------->
 <?php while($row=$customer_info_lot->fetch_array()){?>
  <div class="modal fade" id="select-owner<?php echo $row["customer_id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-layer fs-1' ></i>
            &nbsp;Owner Setup
          </h4>
          <button type="button" class="btn-close btn-close-white close-owner-lot" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="modal-body p-5">
            <div class="row mb-3">
              <div class="col-md-4 mb-2">
                <label for="owner-fullname-<?php echo $row["customer_id"] ?>">Fullname:</label>
                <input type="text" class="form-control" id="owner-fullname-<?php echo $row["customer_id"] ?>" name="owner-fullname" value="<?php echo $row["first_name"].' '.$row["middle_name"].' '.$row["family_name"]?>" readonly>
                <input type="hidden" class="form-control" id="customer-id" name="customer-id" value="<?php echo $row["customer_id"]?>">
              </div>
              <div class="col-md-4">
                <label for="owner-email-<?php echo $row["customer_id"] ?>">Email:</label>
                <input type="text" class="form-control" id="owner-email-<?php echo $row["customer_id"] ?>" name="owner-email" value="<?php echo $row["email"]?>" readonly>
              </div>
              <div class="col-md-4">
                <label for="owner-contact-<?php echo $row["customer_id"] ?>">Contact no:</label>
                <input type="text" class="form-control" id="owner-contact-<?php echo $row["customer_id"] ?>" name="owner-contact" value="<?php echo $row["contact"]?>" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="customer-site-<?php echo $row["customer_id"] ?>">Site:<i class="req">*</i></label>
                <select class="form-select customer-site" data-id="<?php echo $row["customer_id"]?>" id="customer-site-<?php echo $row["customer_id"] ?>" name="customer-site" required>
                </select>
              </div>
              <div class="col-md-4">
                <label for="customer-sector-<?php echo $row["customer_id"] ?>">Lawn Sector:<i class="req">*</i></label>
                <select class="form-select customer-sector" data-id="<?php echo $row["customer_id"]?>" id="customer-sector-<?php echo $row["customer_id"] ?>" name="customer-sector" disabled required>
                  <option value="" selected disabled>Select Sector</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
              </div> 
              <div class="col-md-4">
                <label for="customer-block-<?php echo $row["customer_id"] ?>">Lawn Block:<i class="req">*</i></label>
                <select class="form-select customer-block" data-id="<?php echo $row["customer_id"]?>" id="customer-block-<?php echo $row["customer_id"] ?>" name="customer-block" disabled required>
                  <option value="" selected disabled>Select Block</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="customer-lot-<?php echo $row["customer_id"] ?>">Lawn Lot:<i class="req">*</i></label>
                <select class="form-select customer-lot" data-id="<?php echo $row["customer_id"]?>" id="customer-lot-<?php echo $row["customer_id"] ?>" name="customer-lot" disabled required>
                  <option value="" selected disabled>Select Lot</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="customer-lawn-type-<?php echo $row["customer_id"]?>">Lawn Type:<i class="req">*</i></label>
                <input class="form-control customer-lawn-type" data-id="<?php echo $row["customer_id"]?>" id="customer-lawn-type-<?php echo $row["customer_id"] ?>" name="customer-lawn-type" placeholder="Lawn Type" readonly>
              </div>
              <div class="col-md-4">
                <label for="owner-deed-sale-<?php echo $row["customer_id"]?>">Deed of Sale:<i class="req">*</i></label>
                <input type="file" accept=".pdf, .png, .jpg" name="owner-deed-sale" id="owner-deed-sale-<?php echo $row["customer_id"]?>" class="form-control owner-deed-sale" required>
              </div>
            </div>
          </div>
          <div class="text-center text-danger lot-warning" id="lot-warning-<?php echo $row["customer_id"]?>">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="btn-owner-setup">Add</button>
            <button type="reset" class="btn btn-danger btn-reset-owner" id="btn-reset-owner" data-id="<?php echo $row["customer_id"]?>">Reset</button>
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