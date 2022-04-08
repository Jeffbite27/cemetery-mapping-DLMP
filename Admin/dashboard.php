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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Assets/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
      
    <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
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

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="News & Events">
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
          <i class='bx bxs-grid-alt' ></i>
          &nbsp;ADMIN DASHBOARD</h2>
          <hr>

            <div class="row p-0 cont-dash">
              <div class="col-sm-12 col-md-12">
                <div class="bg-white p-4 h-100 rounded contents">
                  <div class="row g-3">
                    <div class="col-md shadow p-2 rounded mx-0 mx-md-2">
                      <div class="p-3" >
                        <p class="fs-5 ">Customer/Owner</p>
                        <hr>
                        <div class="d-flex align-items-center justify-content-between px-3">
                          <?php
                            $query = "SELECT  customer_id FROM customers ORDER BY customer_id";
                            $query_run = mysqli_query($con, $query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h1>' .$row. '</h1>'
                          ?>
                          
                          <i class='bx bxs-user fs-1' ></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md shadow p-2 rounded mx-0 mx-md-2">
                      <div class="p-3" >
                          <p class="fs-5 ">Deceased</p>
                          <hr>
                          <div class="d-flex align-items-center justify-content-between px-3">
                            <?php
                              $query = "SELECT  deceased_id FROM deceased_persons ORDER BY deceased_id";
                              $query_run = mysqli_query($con, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h1>' .$row. '</h1>'
                            ?>
                            
                            <i class='bx bxs-user-rectangle fs-1' ></i>
                          </div>
                        </div>
                    </div>
                    <div class="col-md shadow p-2 rounded mx-0 mx-md-2">
                        <div class="p-3" >
                          <p class="fs-5 ">Garden Sites</p>
                          <hr>
                          <div class="d-flex align-items-center justify-content-between px-3">
                            <?php
                              $query = "SELECT  site_id FROM tbl_sites ORDER BY site_id";
                              $query_run = mysqli_query($con, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h1>' .$row. '</h1>'
                            ?>
                            
                            <i class='bx bx-sitemap fs-1' ></i>
                          </div>
                        </div>
                    </div>
                    <div class="col-md shadow p-2 rounded mx-0 mx-md-2">
                        <div class="p-3" >
                          <p class="fs-5 ">Lawn Blocks</p>
                          <hr>
                          <div class="d-flex align-items-center justify-content-between px-3">
                            <?php
                              $query = "SELECT  block_id FROM tbl_blocks ORDER BY block_id";
                              $query_run = mysqli_query($con, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h1>' .$row. '</h1>'
                            ?>
                            
                            <i class='bx bxs-cube-alt fs-1'></i>
                          </div>
                        </div>
                    </div>
                    <div class="col-md shadow p-2 rounded mx-0 mx-md-2">
                        <div class="p-3" >
                          <p class="fs-5 ">Lawn Lots</p>
                          <hr>
                          <div class="d-flex align-items-center justify-content-between px-3">
                            <?php
                              $query = "SELECT  lot_id FROM tbl_lots ORDER BY lot_id";
                              $query_run = mysqli_query($con, $query);
                              $row = mysqli_num_rows($query_run);
                              echo '<h1>' .$row. '</h1>'
                            ?>
                            
                            <i class='bx bxs-grid fs-1' ></i>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
    


  </section>

  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
  <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
  <script src="../Assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
  <script src="../Assets/js/index_admin.js" defer></script>

</body>
</html>
