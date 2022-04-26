<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();
  if(isset($_SESSION["username"])){
    $sql=$con->query("SELECT lot_owners.lot_owner_id, customers.first_name, customers.contact, customers.family_name, customers.middle_name, customers.email, tbl_sites.site_name, tbl_blocks.sector, tbl_blocks.block_name, tbl_lots.lot_name, tbl_lots.lawn_type, deceased_persons.deceased_id FROM (((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id) LEFT JOIN `deceased_persons` ON lot_owners.lot_owner_id=deceased_persons.lot_owner_id)");
    $sql_modal=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id)");
    $sql_edit_modal=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id)");
    $sql_deceased=$con->query("SELECT * FROM ((((`lot_owners` INNER JOIN `customers` ON lot_owners.customer_id=customers.customer_id) INNER JOIN `tbl_sites` ON lot_owners.site_id=tbl_sites.site_id) INNER JOIN `tbl_blocks` ON lot_owners.block_id=tbl_blocks.block_id) INNER JOIN `tbl_lots` ON lot_owners.lot_id=tbl_lots.lot_id)");
    $sql_dead=$con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");
    $sql_deceased_edit=$con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");
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
    <title>Internmet Setup | Divine Life Memorial Park</title>
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
                                      <?php while($row=$sql->fetch_array()){ 
                                        
                                        if(isset($row["deceased_id"])!=NULL){
                                          $disabled="disabled";
                                          $btn="secondary";
                                        }else{
                                          $disabled="";
                                          $btn="primary";
                                        }

                                        ?>
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
                                          <button class="btn btn-<?php echo $btn ?>" data-bs-toggle="modal" data-bs-target="#add-deceased-<?php echo $row['lot_owner_id']?>" <?php echo $disabled ?>>
                                            <i class='bx bxs-user-x'></i>
                                          </button>
                                          <button class="btn btn-success" data-bs-toggle="modal" data-id="<?php echo $row["lot_owner_id"]?>" data-bs-target="#lot-owners-edit-<?php echo $row["lot_owner_id"]?>">
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
                                          <td class="align-middle"><?php echo $row["first_name"]." ".$row["family_name"]?></td>
                                          <td class="align-middle"><?php echo $row["dead_relationship"]?></td>
                                          <td class="align-middle"><?php echo date("M j, Y", strtotime($row["internment_date"]))?></td>
                                          <td class="align-middle"><?php echo date("M j, Y", strtotime($row["date_of_birth"]))?></td>
                                          <td class="align-middle"><?php echo date("M j, Y", strtotime($row["date_of_death"]))?></td>
                                          <td class="align-middle"><?php echo "<br>Site: ".$row["site_name"]."<br>Sector: ".$row["sector"]."<br>Block #: ".$row["block_name"]."<br>Lot #: ".$row["lot_name"]?></td>
                                          <td class="align-middle text-center">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#preview-death-cert-<?php echo $row["deceased_id"]?>">
                                              <i class="bx bxs-file"></i>
                                            </button>
                                          </td>
                                          <td class="align-middle text-center">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#preview-burial-permit-<?php echo $row["deceased_id"]?>">
                                              <i class="bx bxs-file"></i>
                                            </button>
                                          </td>
                                          <td class="align-middle text-center">
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-deceased-<?php echo $row['deceased_id']?>">
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
  <!------------------------------- EDIT LOT OWNERS MODAL -------------------------->
  <?php while($row=$sql_edit_modal->fetch_array()) { ?>
    <div class="modal fade" id="lot-owners-edit-<?php echo $row["lot_owner_id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl"> 
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
              <i class='bx bxs-edit fs-1' ></i>
              &nbsp;Edit Lot Details Owned by <?php echo $row["first_name"].' '.$row["middle_name"].' '.$row["family_name"]?>
            </h4>
            <button type="button" class="btn-close btn-close-white close-owner-lot" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="edit-owner-fullname" value="<?php echo $row["first_name"].'_'.$row["middle_name"].'_'.$row["family_name"]?>">
            <input type="hidden" name="edit-lot-owner-id" value="<?php echo $row["lot_owner_id"]?>">
            <div class="modal-body p-5">
              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="edit-customer-site-<?php echo $row["lot_owner_id"] ?>">Site:<i class="req">*</i></label>
                  <select class="form-select edit-customer-site" data-id="<?php echo $row["lot_owner_id"]?>" id="edit-customer-site-<?php echo $row["lot_owner_id"] ?>" name="edit-customer-site">
                    <option value="<?php echo $row["site_id"] ?>"><?php echo $row["site_name"] ?></option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="edit-customer-sector-<?php echo $row["lot_owner_id"] ?>">Lawn Sector:<i class="req">*</i></label>
                  <select class="form-select edit-customer-sector" data-id="<?php echo $row["lot_owner_id"]?>" id="edit-customer-sector-<?php echo $row["lot_owner_id"] ?>" name="edit-customer-sector">
                    <option value="<?php echo $row["sector"] ?>" selected><?php echo $row["sector"] ?></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                  </select>
                </div> 
                <div class="col-md-4">
                  <label for="edit-customer-block-<?php echo $row["lot_owner_id"] ?>">Lawn Block:<i class="req">*</i></label>
                  <select class="form-select edit-customer-block" data-id="<?php echo $row["lot_owner_id"]?>" id="edit-customer-block-<?php echo $row["lot_owner_id"] ?>" name="edit-customer-block">
                    <option value="<?php echo $row["block_id"] ?>" selected><?php echo $row["block_name"] ?></option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="edit-customer-lot-<?php echo $row["lot_owner_id"] ?>">Lawn Lot:<i class="req">*</i></label>
                  <select class="form-select edit-customer-lot" data-id="<?php echo $row["lot_owner_id"]?>" id="edit-customer-lot-<?php echo $row["lot_owner_id"] ?>" name="edit-customer-lot">
                    <option value="<?php echo $row["lot_id"] ?>" selected><?php echo $row["lot_name"] ?></option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="edit-customer-lawn-type-<?php echo $row["lot_owner_id"]?>">Lawn Type:<i class="req">*</i></label>
                  <input class="form-control edit-customer-lawn-type" data-id="<?php echo $row["lot_owner_id"]?>" id="edit-customer-lawn-type-<?php echo $row["lot_owner_id"] ?>" name="edit-customer-lawn-type" placeholder="Lawn Type" value="<?php echo $row["lawn_type"] ?>" readonly>
                  </inp>
                </div>
                <div class="col-md-4">
                  <label for="edit-owner-deed-sale-<?php echo $row["lot_owner_id"]?>">Deed of Sale:<i class="req">*</i></label> <a href="" data-bs-toggle="modal" data-bs-target="#preview-deed-of-sale-<?php echo $row['lot_owner_id']?>"><i class='bx bx-paperclip bx-rotate-270' ></i>Current Deed of Sale </a>
                  <input type="file" accept=".pdf, .png, .jpg" name="edit-owner-deed-sale" id="edit-owner-deed-sale-<?php echo $row["lot_owner_id"]?>" class="form-control owner-deed-sale">
                </div>
              </div>
            </div>
            <div class="text-center text-danger lot-warning" id="lot-warning-<?php echo $row["customer_id"]?>">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary btn-update-owner-setup" name="btn-update-owner-setup" data-id="<?php echo $row["lot_owner_id"]?>">Update</button>
              <button type="reset" class="btn btn-danger btn-reset-lot-owner" id="btn-reset-owner" data-id="<?php echo $row["customer_id"]?>">Reset</button>
            </div>
          </form>
        </div>
      </div>        
    </div>
  <?php } ?>
  <!------------------------------- EDIT INTERNMENT FOR DECEASED MODAL -------------------------->
  <?php while($row=$sql_deceased_edit->fetch_array()){ ?>
    <div class="modal fade" id="edit-deceased-<?php echo $row['deceased_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl"> 
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
              <i class='bx bx-user-x fs-1'></i>
              &nbsp;Edit details of <?php echo $row['dead_fname']." ".$row['dead_mname']." ".$row['dead_family_name']?>.
            </h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $row['deceased_id'] ?>" name="edit-deceased-id">
            <div class="modal-body p-5">
              <div class="">
                <div class="row mb-3">
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-family-name">Family name:<i class="req">*</i></label>
                    <input type="text" name="edit-dead-family-name" id="edit-dead-family-name" value="<?php echo $row['dead_family_name'] ?>" class="form-control" placeholder="Surname">
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-first-name">First name:<i class="req">*</i></label>
                    <input type="text" name="edit-dead-first-name" id="edit-dead-first-name" value="<?php echo $row['dead_fname'] ?>" class="form-control" placeholder="Given name">
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-middle-name">Middle name:</label>
                    <input type="text" name="edit-dead-middle-name" id="edit-dead-middle-name" value="<?php echo $row['dead_mname'] ?>" class="form-control" placeholder="Middle name">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-gender">Gender:<i class="req">*</i></label>
                    <select type="text" name="edit-dead-gender" id="edit-dead-gender" class="form-select">
                      <option value="<?php echo $row['gender'] ?>" selected><?php echo $row['gender'] ?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-citizenship">Citizenship:<i class="req">*</i></label>
                    <input type="text" name="edit-dead-citizenship" id="edit-dead-citizenship" placeholder="Citizenship" value="<?php echo $row['dead_citizenship'] ?>" class="form-control">
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-civil-status">Civil Status:<i class="req">*</i></label>
                    <select type="text" name="edit-dead-civil-status" id="edit-dead-civil-status" class="form-select">
                      <option value="<?php echo $row['dead_civil_status'] ?>" selected><?php echo $row['dead_civil_status'] ?></option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Seperated">Seperated</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-relative">Relative:<i class="req">*</i></label>
                    <input type="text" name="edit-dead-relative" id="edit-dead-relative" placeholder="First name" class="form-control" value="<?php echo $row['first_name']?>" readonly>
                    <input type="hidden" id="lot-owner-id" value="<?php echo $row['lot_owner_id']?>" name="lot-owner-id">
                    <input type="hidden" id="customer-id" value="<?php echo $row['customer_id']?>" name="customer-id">
                    <input type="hidden" id="site-id" value="<?php echo $row['site_id']?>" name="site-id">
                    <input type="hidden" id="block-id" value="<?php echo $row['block_id']?>" name="block-id">
                    <input type="hidden" id="lot-id" value="<?php echo $row['lot_id']?>" name="lot-id">
                    <small class="text-danger" id="relative-error"></small>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-relative-surname"></label>
                    <input type="text" name="edit-dead-relative-surname" id="edit-dead-relative-surname" placeholder="Surname" class="form-control" value="<?php echo $row['family_name']?>" readonly>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-relationship">Relationship:<i class="req">*</i></label>
                    <select type="text" name="edit-dead-relationship" id="edit-dead-relationship" class="form-select">
                      <option value="<?php echo $row['dead_relationship']?>" selected><?php echo $row['dead_relationship']?></option>
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
                    <label for="edit-dead-intern">Internment Date:<i class="req">*</i></label>
                    <input type="date" name="edit-dead-intern" id="edit-dead-intern" value="<?php echo $row['internment_date']?>" class="form-control">
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-bday">Date of Birth:<i class="req">*</i></label>
                    <input type="date" name="edit-dead-bday" id="edit-dead-bday" value="<?php echo $row['date_of_birth']?>" class="form-control">
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <label for="edit-dead-death">Date of Death:<i class="req">*</i></label>
                    <input type="date" name="edit-dead-death" id="edit-dead-death" value="<?php echo $row['date_of_death']?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6 col-sm-6">
                    <label for="edit-death-cert">Death Certificate:<i class="req">*</i></label> <a href="" data-bs-toggle="modal" data-bs-target="#preview-death-cert-<?php echo $row['deceased_id']?>"><i class='bx bx-paperclip bx-rotate-270' ></i>Current Death Certificate </a>
                    <input type="file" name="edit-death-cert" id="edit-death-cert" class="form-control" accept=".pdf, .docx, .jpg, .png">
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <label for="edit-burial-permit">Burial Permit:<i class="req">*</i></label> <a href="" data-bs-toggle="modal" data-bs-target="#preview-burial-permit-<?php echo $row['deceased_id']?>"><i class='bx bx-paperclip bx-rotate-270' ></i>Current Burial Permit </a>
                    <input type="file" name="edit-burial-permit" id="edit-burial-permit" class="form-control" accept=".pdf, .docx, .jpg, .png">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="btn-edit-dead" id="btn-edit-dead" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-danger">Reset</button> 
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
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
  <!------------------------------- INTERNMENT FOR DECEASED MODAL -------------------------->
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