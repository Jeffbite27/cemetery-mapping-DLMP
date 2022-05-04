<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();

  if(isset($_SESSION["username"])){
    $sql_sites=$con->query("SELECT * FROM `tbl_sites`");
    
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

                
                    <div class="row mt-4 gx-3">
                      <div class="col-lg-6">
                        <div class="p-3 shadow rounded ">
                          <div class="title-total-dead d-flex align-items-center justify-content-between"">
                            <h4>Number Deceased Persons in Garden Sites</h4>
                            <a href="queries/print-deceased-persons.php" target="_blank">
                              <button class="btn btn-primary d-flex align-items-center ">
                                <i class='bx bxs-printer text-white'></i>
                                &nbsp;Print Deceased Persons
                              </button>
                            </a>
                          </div>
                          <hr>
                          <div class="chart-container mt-5" style="height: 50%">
                            <canvas id="chart1" class="" height="450px"></canvas>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="p-3 shadow rounded h-100">
                          <div class="title-total-customer d-flex align-items-center justify-content-between">
                            <h4>Number of Customers per Week</h4>
                            <a href="queries/print-customers.php" target="_blank">
                              <button class="btn btn-primary d-flex align-items-center ">
                                <i class='bx bxs-printer text-white'></i>
                                &nbsp;Print Customers
                              </button>
                            </a>
                          </div>
                          <hr>
                          <div class="chart-container mt-5" style="height: 80%">
                              <canvas id="chart2" height="450px"></canvas>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
  <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
  <script src="../Assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
  <script src="../Assets/js/index_admin.js" defer></script>

  <script>
     //PIE CHART
   const data1 = {
      labels: [
        <?php while($row=$sql_sites->fetch_array()) { 
          echo "'".$row["site_name"]."',"; 
        }?>
      ],
      datasets: [{
        label: 'Total Deceased Persons in Sites',
        data: [
          <?php 
            $sql_sites1=$con->query("SELECT * FROM `tbl_sites`");
            while($row=$sql_sites1->fetch_array()){
              $site=$row["site_id"];
              $sql_site_count=$con->query("SELECT * FROM `deceased_persons` INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id WHERE deceased_persons.site_id=$site");
              $count_dead=$sql_site_count->num_rows;
              echo "'".$count_dead."',";

            }
          ?>
        ],
        backgroundColor: [
          "#4b77a9",
          "#5f255f",
          "#c25904",
          "#ded300",
          "#25de00",
        ],
        hoverOffset: 4
      }]
    };

    var options = {
      maintainAspectRatio: false
    };
    var ctx = document.getElementById("chart1").getContext('2d');
    
    new Chart(ctx, {
      type: 'pie',
      options: options,
      data: data1
    });
    //BAR GRAPH
   const data2 = {
      labels: [
        <?php 
          date_default_timezone_set('Asia/Manila');
          for ($i=0; $i<7;$i++){
            $lastweek = date("Y-m-d", strtotime(date("d") ? "$i days ago" : "last week"));
            echo "'".date("M j, Y", strtotime($lastweek))."',";
          }
        ?>
      ],
      datasets: [{
        label: 'Number of Customer(s)',
        data: [
          <?php 
          for ($i=0; $i<7;$i++){
            $lastweek = date("Y-m-d", strtotime(date("d") ? "$i days ago" : "last week"));
            $sql_count_customer=$con->query("SELECT * FROM `customers` WHERE `date`='$lastweek'");  
            $count_customer=$sql_count_customer->num_rows;
            echo "'".$count_customer."',";
          }
          ?>
        ],
        backgroundColor: [
          "#6b1515",
          "#4b77a9",
          "#5f255f",
          "#c25904",
          "#ded300",
          "#25de00",
          "#008073",
        ],
        hoverOffset: 4
      }]
    };

    var options1 = {
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        y: {
          max:
          <?php 
            $max_customer=$con->query("SELECT * FROM `customers`");
            $max_count=$max_customer->num_rows;
            echo $max_count;  
          ?>
          ,
          beginAtZero: true
        },
      },
      ticks: {
        precision:0
      }
    };
    var ctx2 = document.getElementById("chart2").getContext('2d');
    new Chart(ctx2, {
      type: 'bar',
      options: options1,
      data: data2
    });

  </script>
</body>
</html>
