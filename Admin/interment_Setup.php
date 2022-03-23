<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();
  if(isset($_SESSION["username"])){
    $sql=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id)");
    $sql_modal=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id)");
    $sql_deceased=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id)");
    $sql_dead=$con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");
    $sql_death_cert=$con->query("SELECT * FROM `deceased_persons`");
    $sql_burial_permit=$con->query("SELECT * FROM `deceased_persons`");
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
                    <ul class="nav nav-tabs card-header-tabs" id="tab-interment" role="tablist">
                      <li class="nav-item" role="presentation">
                          <button class="nav-link text-dark d-flex align-items-center internments" id="internment-setup" data-bs-toggle="tab" data-bs-target="#owners" type="button" role="tab" aria-controls="owners" aria-selected="true">
                            <i class='bx bx-group fs-5'></i>
                            &nbsp;Lot Owners
                          </button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link text-dark d-flex align-items-center internments" id="internment-table" data-bs-toggle="tab" data-bs-target="#deads" type="button" role="tab" aria-controls="deads" aria-selected="false">
                            <i class='bx bx-user-x fs-5'></i>
                            &nbsp;Deceased Persons
                        </button>
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
                                  <table class="table table-striped table-bordered w-100" id="tbl-lot-owners"  style="font-size: 14px">
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
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#preview-deed-of-sale-<?php echo $row['lot_owner_id']?>">
                                              <i class='bx bxs-file' ></i>
                                            </button>
                                        </td>
                                        <td class="align-middle text-center">
                                          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-deceased-<?php echo $row['lot_owner_id']?>">
                                            <i class='bx bxs-user-x'></i>
                                          </button>
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
                                  &nbsp;List of Deceased Persons</h5>
                                </div>
                                <div class="list-of-deads">
                                  <table class="table table-striped table-bordered w-100" id="tbl-deads"  style="font-size: 14px">
                                    <thead class="tbl-header text-light">
                                      <th>#</th>
                                      <th>Fullname</th>
                                      <th>Gender</th>
                                      <th>Relative</th>
                                      <th>Relationship</th>
                                      <th>Internment Date</th>
                                      <th>Birthday</th>
                                      <th>Date of death</th>
                                      <th>Grave Address</th>
                                      <th>Death Certificate</th>
                                      <th>Burial Permit</th>
                                      <th>Actions</th>
                                    </thead>
                                    <tbody>
                                      <?php while($row=$sql_dead->fetch_array()){ ?>
                                        <tr>
                                          <td class="align-middle"><?php echo $row["deceased_id"]?></td>
                                          <td class="align-middle"><?php echo $row["dead_fname"]." ".$row["dead_mname"]." ".$row["dead_family_name"]?></td>
                                          <td class="align-middle"><?php echo $row["dead_gender"]?></td>
                                          <td class="align-middle"><?php echo $row["dead_relative"]." ".$row["dead_relative_surname"]?></td>
                                          <td class="align-middle"><?php echo $row["dead_relationship"]?></td>
                                          <td class="align-middle"><?php echo $row["internment_date"]?></td>
                                          <td class="align-middle"><?php echo $row["date_of_birth"]?></td>
                                          <td class="align-middle"><?php echo $row["date_of_death"]?></td>
                                          <td class="align-middle"><?php echo "Site: ".$row["site_name"]."<br>Sector: ".$row["sector"]."<br>Block #: ".$row["block_name"]."<br>Lot #: ".$row["lot_name"]?></td>
                                          <td class="align-middle text-center">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#preview-death-cert-<?php echo $row['deceased_id']?>">
                                              <i class="bx bxs-file"></i>
                                            </button>
                                          </td>
                                          <td class="align-middle text-center">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#preview-burial-permit-<?php echo $row['deceased_id']?>">
                                              <i class="bx bxs-file"></i>
                                            </button>
                                          </td>
                                          <td class="align-middle text-center">
                                            <button class="btn btn-success">
                                              <i class="bx bxs-edit"></i>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!------------------------------- DEED OF SALE MODAL PREVIEW -------------------------->
  <?php while($row=$sql_modal->fetch_array()){ ?>
  <div class="modal fade" id="preview-deed-of-sale-<?php echo $row['lot_owner_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-file fs-1'></i> 
            &nbsp;<?php echo $row['first_name']." ".$row['family_name']?>'s Deed of Sale Preview
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body p-5">
            <div class="text-center">
                <iframe style="width: 100%; height: 500px" src="files/deed_of_sales/<?php echo $row['deed_of_sale']?>" frameborder="0">

                </iframe>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
  <!------------------------------- DEATH CERTIFICATE MODAL PREVIEW -------------------------->
  <?php while($row=$sql_death_cert->fetch_array()){ ?>
  <div class="modal fade" id="preview-death-cert-<?php echo $row['deceased_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-file fs-1'></i> 
            &nbsp;Preview of <?php echo $row['dead_fname']." ".$row['dead_mname']." ".$row['dead_family_name']?>'s Death Certificate
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body p-5">
            <div class="text-center">
                <iframe style="width: 100%; height: 500px" src="files/death_certificates/<?php echo $row['death_cert']?>" frameborder="0">

                </iframe>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
  <!------------------------------- BURIAL PERMIT MODAL PREVIEW -------------------------->
  <?php while($row=$sql_burial_permit->fetch_array()){ ?>
  <div class="modal fade" id="preview-burial-permit-<?php echo $row['deceased_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-file fs-1'></i> 
            &nbsp;Preview of <?php echo $row['dead_fname']." ".$row['dead_mname']." ".$row['dead_family_name']?>'s Burial Permit
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body p-5">
            <div class="text-center">
                <iframe style="width: 100%; height: 500px" src="files/burial_permits/<?php echo $row['burial_permit']?>" frameborder="0">

                </iframe>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
  <!------------------------------- INTERNMENT FOR DECEASED MODAL PREVIEW -------------------------->
  <?php while($row=$sql_deceased->fetch_array()){ ?>
    <div class="modal fade" id="add-deceased-<?php echo $row['lot_owner_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl"> 
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
              <i class='bx bx-user-x fs-1'></i>
              &nbsp;Add deceased relative of <?php echo $row['first_name']." ".$row['family_name']?>.
            </h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body p-5">
              <div class="">
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
                  <div class="col-md-4 col-sm-4">
                    <label for="dead-gender">Gender:<i class="req">*</i></label>
                    <select type="text" name="dead-gender" id="dead-gender" class="form-select" required>
                      <option value="" selected disabled>Select gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="dead-citizenship">Citizenship:<i class="req">*</i></label>
                    <input type="text" name="dead-citizenship" id="dead-citizenship" placeholder="Citizenship" class="form-control" required>
                  </div>
                  <div class="col-md-4 col-sm-4">
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
                    <input type="text" name="dead-relative" id="dead-relative" placeholder="First name" class="form-control" value="<?php echo $row['first_name']?>" readonly required>
                    <input type="hidden" id="lot-owner-id" value="<?php echo $row['lot_owner_id']?>" name="lot-owner-id">
                    <input type="hidden" id="customer-id" value="<?php echo $row['customer_id']?>" name="customer-id">
                    <input type="hidden" id="site-id" value="<?php echo $row['site_id']?>" name="site-id">
                    <input type="hidden" id="block-id" value="<?php echo $row['block_id']?>" name="block-id">
                    <input type="hidden" id="lot-id" value="<?php echo $row['lot_id']?>" name="lot-id">
                    <small class="text-danger" id="relative-error"></small>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="dead-relative-surname"></label>
                    <input type="text" name="dead-relative-surname" id="dead-relative-surname" placeholder="Surname" class="form-control" value="<?php echo $row['family_name']?>" readonly required>
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
                  <div class="col-md-6 col-sm-6">
                    <label for="death-cert">Death Certificate:<i class="req">*</i></label>
                    <input type="file" name="death-cert" id="death-cert" class="form-control" accept=".pdf, .docx, .jpg, .png" required>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <label for="burial-permit">Burial Permit:<i class="req">*</i></label>
                    <input type="file" name="burial-permit" id="burial-permit" class="form-control" accept=".pdf, .docx, .jpg, .png" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="btn-submit-dead" id="btn-submit-dead" class="btn btn-primary">Register</button>
              <button type="reset" class="btn btn-danger">Reset</button> 
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
  <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
  <script src="../Assets/js/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
  <script src="../Assets/js/index_admin.js" defer></script>
</body>
</html>