<?php
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();
  if(isset($_SESSION["username"])){
    $sql=$con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");
  }else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grave Map | Divine Life Memorial Park</title>
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

      <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Grave Map">
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
          <i class='bx bxs-map-alt' ></i>
          &nbsp;Grave Map</h2>
          <hr>
          <div class="row p-0">
            <div class="col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs" id="tab-find-grave" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark d-flex align-items-center grave-maps" id="find-grave-btn" data-bs-toggle="tab" data-bs-target="#find-graves" type="button" role="tab" aria-controls="find-graves" aria-selected="true">
                          <i class='bx bx-search-alt-2 fs-5'></i>
                          &nbsp;Find Grave
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark d-flex align-items-center grave-maps" id="view-map-btn" data-bs-toggle="tab" data-bs-target="#view-maps" type="button" role="tab" aria-controls="view-maps" aria-selected="false">
                          <i class='bx bxs-map-pin fs-5' ></i>
                          &nbsp;View Map
                      </button>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="myTabGraveMap">
                    <div class="tab-pane" id="find-graves" role="tabpanel" aria-labelledby="find-grave-tab">
                      <div class="head">
                        <div class="row p-0">
                          <div class="col-sm-12 col-md-12">
                            <div class="bg-white p-3 h-100 rounded">
                              <div class="title-header bg-white sticky-top p-3 d-flex">
                                <h5 class="d-flex align-items-center">
                                <i class='bx bx-search-alt-2 fs-3' ></i>
                                &nbsp;Find Grave Location of Deceased Persons</h5>
                              </div>
                              <div class="find-grave">
                                <table class="table table-striped table-bordered w-100" id="tbl-find-map">
                                  <thead class="tbl-header text-light">
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Relative</th>
                                    <th>Relationship</th>
                                    <th>Details</th>
                                    <th>Grave Address</th>
                                    <th>Action</th>
                                  </thead>
                                  <tbody>
                                    <?php while($row=$sql->fetch_array()) {?>
                                    <tr>
                                      <td class="align-middle"><?php echo $row["deceased_id"]?></td>
                                      <td class="align-middle"><?php echo $row["dead_fname"]." ".$row["dead_mname"]." ".$row["dead_family_name"]?></td>
                                      <td class="align-middle"><?php echo $row["dead_relative"]." ".$row["dead_relative_surname"]?></td>
                                      <td class="align-middle"><?php echo $row["dead_relationship"]?></td>
                                      <td class="align-middle">
                                        <?php echo "<br>Gender: ".$row["dead_gender"]."<br>Date Born: ".date("M j, Y", strtotime($row["date_of_birth"]))."<br>Date Died: ".date("M j, Y", strtotime($row["date_of_death"]))."<br>Internment Date: ".date("M j, Y", strtotime($row["internment_date"])) ?>
                                      </td>
                                      <td class="align-middle">
                                        <?php echo "<br>Site: ".$row["site_name"]."<br>Sector: ".$row["sector"]."<br>Block #: ".$row["block_name"]."<br>Lot #: ".$row["lot_name"]?>
                                      </td>
                                      <td class="align-middle text-center">
                                        <button class="btn btn-danger btn-view-location"><i class='bx bx-search-alt-2' ></i> View Location</button>
                                      </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="view-maps" role="tabpanel" aria-labelledby="find-grave-tab">
                      <div class="head">
                        <div class="row p-0">
                          <div class="col-sm-12 col-md-12">
                            <div class="bg-white p-3 h-100 rounded">
                              <div class="title-header bg-white sticky-top p-3 d-flex">
                                <h5 class="d-flex align-items-center">
                                <i class='bx bxs-map-pin fs-3' ></i>
                                &nbsp;Click Sectors to View Map</h5>
                              </div>
                              <br>
                              <div class="view-map text-center">
                                <div class="map-wrapper">
                                  <img class="img-fluid rounded whole-map" src="../Assets/image/whole-map.png" alt="">
                                  <div class="map-sites">
                                    <!-- JOY GARDEN BUTTONS -->
                                    <button class="btn btn-sm btn-success btn-joy-a" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Joy Garden Sector A"></button>
                                    <button class="btn btn-sm btn-success btn-joy-b" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Joy Garden Sector B"></button>
                                    <button class="btn btn-sm btn-success btn-joy-c" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Joy Garden Sector C"></button>
                                    <button class="btn btn-sm btn-success btn-joy-d" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Joy Garden Sector D"></button>
                                    <!-- PEACE GARDEN BUTTONS -->
                                    <button class="btn btn-sm btn-success btn-peace-a" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Peace Garden Sector A"></button>
                                    <button class="btn btn-sm btn-success btn-peace-b" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Peace Garden Sector B"></button>
                                    <button class="btn btn-sm btn-success btn-peace-c" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Peace Garden Sector C"></button>
                                    <button class="btn btn-sm btn-success btn-peace-d" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Peace Garden Sector D"></button> 
                                    <!-- HOPE GARDEN BUTTONS -->
                                    <button class="btn btn-sm btn-success btn-hope-a" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Hope Garden Sector A"></button>
                                    <button class="btn btn-sm btn-success btn-hope-b" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hope Garden Sector B"></button>
                                    <button class="btn btn-sm btn-success btn-hope-c" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hope Garden Sector C"></button>
                                    <button class="btn btn-sm btn-success btn-hope-d" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Hope Garden Sector D"></button> 
                                    <!-- FAITH GARDEN BUTTONS -->
                                    <button class="btn btn-sm btn-success btn-faith-a" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Faith Garden Sector A"></button>
                                    <button class="btn btn-sm btn-success btn-faith-b" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Faith Garden Sector B"></button>
                                    <button class="btn btn-sm btn-success btn-faith-c" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Faith Garden Sector C"></button>
                                    <button class="btn btn-sm btn-success btn-faith-d" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Faith Garden Sector D"></button> 
                                    <!-- LOVE GARDEN BUTTONS -->
                                    <button class="btn btn-sm btn-success btn-love-a" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Love Garden Sector A"></button>
                                    <button class="btn btn-sm btn-success btn-love-b" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Love Garden Sector B"></button>
                                    <button class="btn btn-sm btn-success btn-love-c" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Love Garden Sector C"></button>
                                    <button class="btn btn-sm btn-success btn-love-d" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Love Garden Sector D"></button> 
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
            </div>
          </div>
        </div>
      </div>
    </div>
    
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
  <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
  <script src="../Assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
  <script src="../Assets/js/index_admin.js" defer></script>

  </section>
</body>
</html>