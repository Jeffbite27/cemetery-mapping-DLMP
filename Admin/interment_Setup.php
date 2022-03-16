<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();
  if(isset($_SESSION["username"])){
    $sql=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id)");
    
  }else{
    header("Location: index.php");
  }
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

      <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Block & Lot Setup">
        <a href="block-and-lot.php">
          <i class='bx bx-layer'></i>
          <span class="link_name">Block & Lot Setup</span>
        </a>
      </li>

      <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Interment Setup">
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
            <i class='bx bxs-user-rectangle fs-1' ></i>
            &nbsp;INTERMENT SETUP</h2>
            <hr>
            <div class="row mb-4 p-0">
              <div class="col-sm-12 col-md-12">
                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab-interment" role="tablist">
                      <li class="nav-item" role="presentation">
                          <button class="nav-link text-dark internments" id="internment-setup" data-bs-toggle="tab" data-bs-target="#owners" type="button" role="tab" aria-controls="owners" aria-selected="true">Internment Setup</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link text-dark internments" id="internment-table" data-bs-toggle="tab" data-bs-target="#deads" type="button" role="tab" aria-controls="deads" aria-selected="false">Internment Table</button>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane" id="owners" role="tabpanel" aria-labelledby="sites-tab">
                        <div class="head">
                          <div class="row p-0">
                            <div class="col-sm-12 col-md-12">
                              <div class="bg-white p-3 h-100 rounded">
                                <div class="title-header bg-white sticky-top p-3 d-flex">
                                  <h5 class="d-flex align-items-center">
                                  <i class='bx bx-group fs-3'></i>
                                  &nbsp;List of Lot Owners</h5>
                                </div> 
                                <div class="lot-owners">
                                  <table class="tbl-customer table table-striped table-bordered w-100" id="tbl-customer"  style="font-size: 14px">
                                    <thead class="tbl-header text-light">
                                      <th>#</th>
                                      <th>Fullname</th>
                                      <th>Email</th>
                                      <th>Contact #</th>
                                      <th>Site</th>
                                      <th>Sector</th>
                                      <th>Block</th>
                                      <th>Lot</th>
                                      <th>Type</th>
                                      <th>Deed of Sale</th>
                                      <th>Action</th>
                                    </thead>
                                    <tbody>
                                      <?php while($row=$sql->fetch_array()){ ?>
                                      <tr>
                                        <td class="align-middle"><?php echo $row["lot_owner_id"] ?></td>
                                        <td class="align-middle"><?php echo $row["first_name"].' '.$row["middle_name"].' '.$row["family_name"]?></td>
                                        <td class="align-middle"><?php echo $row["email"] ?></td>
                                        <td class="align-middle"><?php echo $row["contact"] ?></td>
                                        <td class="align-middle"><?php echo $row["site_name"] ?></td>
                                        <td class="align-middle"><?php echo $row["sector"] ?></td>
                                        <td class="align-middle"><?php echo $row["block_name"] ?></td>
                                        <td class="align-middle"><?php echo $row["lot_name"] ?></td>
                                        <td class="align-middle"><?php echo $row["lawn_type"] ?></td>
                                        <td class="align-middle text-center">
                                          <a href="files/deed_of_sales/<?php echo $row["deed_of_sale"] ?>">
                                            <button class="btn btn-primary">
                                              <i class='bx bxs-file fs-5' ></i>
                                            </button>
                                          </a>
                                        </td>
                                        <td class="align-middle text-center">
                                          <button class="btn btn-success">
                                            <i class='bx bxs-edit'></i>
                                          </button>
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
                      <div class="tab-pane" id="deads" role="tabpanel" aria-labelledby="blocks-tab">
                        <div class="head">
                          <div class="row p-0">
                            <div class="col-sm-12 col-md-12">
                              <div class="bg-white p-3 h-100 rounded">
                                <div class="title-header bg-white sticky-top p-3 d-flex">
                                  <h5 class="d-flex align-items-center">
                                  <i class='bx bx-user-x fs-3'></i>
                                  &nbsp;List of Deceased</h5>
                                </div>
                                <div class="list-of-deads">
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
  </section>

  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
  <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
  <script src="../Assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
  <script src="../Assets/js/index_admin.js" defer></script>
</body>
</html>