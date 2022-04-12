<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();

  if(isset($_SESSION["username"])){

  }else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
    <title>Dashboard | Divine Life Memorial Park</title>

    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    <!-- Data tables cdn -->
    <link rel="stylesheet" type="text/css" href="../Assets/DataTables/datatables.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- box-icon cdn -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../Assets/css/index_admin.css">

    <script src="../Assets/js/sweetalert.js"></script>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  
  <div class="sidebar close">

    <div class="logo-details">
      <img src="../Assets/image/logopngplain.png" alt="">
    </div>

    <ul class="nav-links">
      
    <li class="tabs " data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
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

      <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="News & Events">
        <a href="news-events.php">
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
          <i class='bx bx-news' ></i>
          &nbsp;NEWS AND EVENTS</h2>
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
                    </h4>
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
        </div>
      </div>
    </div>



  </section>

  <!-- modal for adding section  -->
  

  <!-- box-icons cdn  -->
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>

  <!-- font-awsome cdn  -->
  <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>

  <script src="../Assets/js/jquery.min.js"></script>

  <!-- bootstrap cdn  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- data tables cdn -->
  <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>

  <script src="../Assets/js/index_admin.js" defer></script>

</body>
</html>