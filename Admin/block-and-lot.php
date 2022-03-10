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
      
      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
        <a href="dashboard.php">
          <i class='bx bx-grid-alt bx-rotate-180' ></i>
          <span class="link_name">Dashboard</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customer">
        <a href="customer.php">
          <i class='bx bx-user' ></i>
          <span class="link_name">Customer</span>
        </a>
      </li>

      <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Block & Lot Setup">
        <a href="#">
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
        <a href="#">
          <i class='bx bx-map-alt' ></i>
          <span class="link_name">Grave Map</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Reports">
        <a href="#">
          <i class='bx bx-bar-chart-square'></i>
          <span class="link_name">Reports</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Slideshow">
        <a href="#">
          <i class='bx bx-carousel' ></i>
          <span class="link_name">Slideshow</span>
        </a>
      </li>

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="News & Events">
        <a href="#">
          <i class='bx bx-news'></i>
          <span class="link_name">News & Events</span>
        </a>
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
              <i class='bx bx-layer fs-1'></i>
              &nbsp;BLOCK AND LOT SETUP</h2>
            <hr>
            <div class="row p-0">
            
            </div>
<!------------------------- MODALS ADD CUSTOMER --------------------------------------->
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
        <form action="" method="post">
          <div class="modal-body p-5">
            <input type="hidden" name="modal-customer-id" value="<?php echo $row["customer-id"]?>">
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
                <label for="modal-home-address">Home Address:<i class="req">*</i></label></label>
                <input type="text" name="modal-home-address" id="modal-home-address" class="form-control" placeholder="House No./Unit/Purok/Subdivision/Village - Brgy. - City - Province" value="<?php echo $row["address"]?>" required>
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
            <button type="submit" class="btn btn-primary" name="btn-update" id="btn-update">Save</button>
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