
<?php 

    include("../config.php");
    $con=connect();

    $query = $con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");

    $sql_modal_map=$con->query("SELECT * FROM (`tbl_blocks` INNER JOIN `tbl_sites` ON tbl_blocks.site_id=tbl_sites.site_id)");

    $sql_view_loc=$con->query("SELECT * FROM (`tbl_blocks` INNER JOIN `tbl_sites` ON tbl_blocks.site_id=tbl_sites.site_id)");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script href="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
    <title>Divine Life Memorial Park</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Assets/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Assets/css/user_map.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../Assets/css/view_location.css">
    <link rel="stylesheet" href="../Assets/css/view_location_occupied.css">
    <link rel="stylesheet" href="../Assets/css/view_location_vacant.css">
    <link rel="stylesheet" href="../Assets/css/view_location_owned.css">
    <link rel="stylesheet" href="../Assets/css/view_location_available.css">
    <!-- swiper js cdn -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

    

    <script src="../Assets/js/sweetalert.js"></script>

</head>
<body>

<div class="container-fluid">
<header class="primary-header">
        <div class="logo">
            <img src="../Assets/image/logopngplain.png" alt="navLogo" class="navlogo">
        </div>

        <button aria-controls="primary-nav" aria-expanded="false" class="nav-toggle">
            <span class="sr-only">
                Menu
            </span>
        </button>

        <nav>
            <ul class="primary-nav" id="primary-nav" data-visible="false">
                <li> 
                    <a href="../index.php">HOME</a> 
                </li>
                <li> 
                    <a href="../index.php#about">ABOUT</a> 
                </li>
                <li> 
                    <a href="../index.php#faqs">FAQs</a> 
                </li>
                <li> 
                    <a href="../index.php#news">NEWS & EVENTS</a> 
                </li>
                <li> 
                    <a href="../index.php#contact">CONTACT</a> 
                </li>
            </ul>
        </nav>

    </header>
</div>
    

    <section class="sec mb-5">
        <div class="container">
            <h1></h1>
            <div class="container-fluid  py-4 cont-main">
                <h1>Guiding Path To Your Loved Ones</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam eos vero ullam eius unde ut ex voluptas reprehenderit ab cumque?</p>
                <div class="search-container d-flex justify-content-center">
                  <i class='bx bx-search fs-3'></i>
                  <input type="text" class="form-control form-search w-25" placeholder="Search your loved ones..." name="" id="search">
                </div>
               
                <button class="btn mt-3 px-5 view-map-btn text-white" data-bs-toggle="modal" data-bs-target="#view-map-modal">
                    <div class="d-flex align-items-center">
                        <i class='bx bxs-map-pin fs-3'></i>
                        &nbsp;<b>View Map</b>
                    </div>
                </button>
            </div>
        </div>
        
    </section>

    <div class="sec2">
        <div class="container">
            <div class="title-header text-center bg-white ">
                <h4>
                    List of Deceased Persons
                </h4>
            </div>
            <table class="tbl-find-map table table-striped mt-4 table-bordered w-100" id="tbl-find-map">
                <thead class="tbl-header text-light">
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Grave Address</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody id="tbl-deceased-persons">
                    <tr>
                      <td colspan='4' class='text-center'>Search to generate data</td>
                    </tr>
                    <!-- <?php while($row =$query->fetch_array()){ ?>
                            <tr>
                                <td class="align-middle"><?php echo $row["deceased_id"]?></td>
                                <td class="align-middle"><?php echo $row["dead_fname"]." ".$row["dead_mname"]." ".$row["dead_family_name"]?></td>
                                <td class="align-middle">
                                <?php echo "<br>Site: ".$row["site_name"]."<br>Sector: ".$row["sector"]."<br>Block #: ".$row["block_name"]."<br>Lot #: ".$row["lot_name"]?>
                                </td>
                                <td class="align-middle text-center">
                                <button class="btn btn-danger btn-view-location" data-site="<?php echo $row["site_name"] ?>" data-sector="<?php echo $row["sector"] ?>" data-block="<?php echo $row["block_name"] ?>" data-lot="<?php echo $row["lot_name"] ?>" data-bs-toggle="modal" data-bs-target="#view-<?php echo explode(' ', trim($row["site_name"] ))[0].'-'.$row["sector"] ?>">
                                <div class="d-flex align-items-center">
                                    <i class='bx bx-search-alt-2' "></i> 
                                    &nbsp;View Location
                                </div>
                                </button>
                                </td>
                            </tr>
                    <?php } ?> -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="view-map-modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                        <i class='bx bxs-map fs-1'></i>
                        &nbsp;View Map
                    </h4>
                    <button type="button" class="btn-close btn-close-white btn-reset-view-map" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="view-map text-center">
                        <div class="map-wrapper">
                            <div class="title-header bg-white sticky-top p-3 d-flex">
                                <h5 class="d-flex align-items-center">
                                <i class='bx bxs-map-pin fs-3' ></i>
                                &nbsp;Click Sectors to View Map</h5>
                            </div>
                            <img class="img-fluid rounded whole-map" src="../Assets/image/map/whole-map.png" alt="">
                            <div class="map-sites">
                                <!-- JOY GARDEN BUTTONS -->
                                <button class="btn btn-sm btn-success btn-Joy-A btn-sectors" data-bs-toggle="modal" data-bs-target="#Joy-A" data-site="Joy Garden" data-sector="A"></button>
                                <button class="btn btn-sm btn-success btn-Joy-B btn-sectors" data-bs-toggle="modal" data-bs-target="#Joy-B" data-site="Joy Garden" data-sector="B"></button>
                                <button class="btn btn-sm btn-success btn-Joy-C btn-sectors" data-bs-toggle="modal" data-bs-target="#Joy-C" data-site="Joy Garden" data-sector="C"></button>
                                <button class="btn btn-sm btn-success btn-Joy-D btn-sectors" data-bs-toggle="modal" data-bs-target="#Joy-D" data-site="Joy Garden" data-sector="D"></button>
                                <!-- PEACE GARDEN BUTTONS -->
                                <button class="btn btn-sm btn-success btn-Peace-A btn-sectors" data-bs-toggle="modal" data-bs-target="#Peace-A"></button>
                                <button class="btn btn-sm btn-success btn-Peace-B btn-sectors" data-bs-toggle="modal" data-bs-target="#Peace-B"></button>
                                <button class="btn btn-sm btn-success btn-Peace-C btn-sectors" data-bs-toggle="modal" data-bs-target="#Peace-C"></button>
                                <button class="btn btn-sm btn-success btn-Peace-D btn-sectors" data-bs-toggle="modal" data-bs-target="#Peace-D"></button> 
                                <!-- HOPE GARDEN BUTTONS -->
                                <button class="btn btn-sm btn-success btn-Hope-A btn-sectors" data-bs-toggle="modal" data-bs-target="#Hope-A" data-site="Hope Garden" data-sector="A"></button>
                                <button class="btn btn-sm btn-success btn-Hope-B btn-sectors" data-bs-toggle="modal" data-bs-target="#Hope-B" data-site="Hope Garden" data-sector="B"></button>
                                <button class="btn btn-sm btn-success btn-Hope-C btn-sectors" data-bs-toggle="modal" data-bs-target="#Hope-C" data-site="Hope Garden" data-sector="C"></button>
                                <button class="btn btn-sm btn-success btn-Hope-D btn-sectors" data-bs-toggle="modal" data-bs-target="#Hope-D" data-site="Hope Garden" data-sector="D"></button> 
                                <!-- FAITH GARDEN BUTTONS -->
                                <button class="btn btn-sm btn-success btn-Faith-A btn-sectors" data-bs-toggle="modal" data-bs-target="#Faith-A" data-site="Faith Garden" data-sector="A"></button>
                                <button class="btn btn-sm btn-success btn-Faith-B btn-sectors" data-bs-toggle="modal" data-bs-target="#Faith-B" data-site="Faith Garden" data-sector="B"></button>
                                <button class="btn btn-sm btn-success btn-Faith-C btn-sectors" data-bs-toggle="modal" data-bs-target="#Faith-C" data-site="Faith Garden" data-sector="C"></button>
                                <button class="btn btn-sm btn-success btn-Faith-D btn-sectors" data-bs-toggle="modal" data-bs-target="#Faith-D" data-site="Faith Garden" data-sector="D"></button> 
                                <!-- LOVE GARDEN BUTTONS -->
                                <button class="btn btn-sm btn-success btn-Love-A btn-sectors" data-bs-toggle="modal" data-bs-target="#Love-A" data-site="Love Garden" data-sector="A"></button>
                                <button class="btn btn-sm btn-success btn-Love-B btn-sectors" data-bs-toggle="modal" data-bs-target="#Love-B" data-site="Love Garden" data-sector="B"></button>
                                <button class="btn btn-sm btn-success btn-Love-C btn-sectors" data-bs-toggle="modal" data-bs-target="#Love-C" data-site="Love Garden" data-sector="C"></button>
                                <button class="btn btn-sm btn-success btn-Love-D btn-sectors" data-bs-toggle="modal" data-bs-target="#Love-D" data-site="Love Garden" data-sector="D"></button> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!---------------------------------- MODAL VIEW MAP----------------------------------------->
<?php while($row = $sql_modal_map->fetch_array()) { ?>
    <div class="modal fade" id="<?php echo explode(' ', trim($row["site_name"] ))[0].'-'.$row["sector"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl"> 
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
              <i class='bx bx-street-view fs-1'></i>
              &nbsp;View <?php echo $row["site_name"] ?> Sector <?php echo $row["sector"] ?> Map
            </h4>
            <button type="button" class="btn-close btn-close-white btn-reset-view-map" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body p-4">
              <div class="filter mb-4">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <h5>Filter by:</h5>
                    <div class="filter d-flex align-items-center">
                      <div class="owned" style="margin-right: 20px">
                        <input type="radio" class="form-check-input rdo-owned" name="filter-radio" data-site="<?php echo $row["site_name"] ?>" data-sector="<?php echo $row["sector"] ?>" id="owned-lots-<?php echo explode(' ', trim($row["site_name"] ))[0].'-'.$row["sector"] ?>">
                        <label for="owned-lots-<?php echo explode(' ', trim($row["site_name"] ))[0].'-'.$row["sector"] ?>">Owned Lots</label>
                        <div class="owned-legend">
                          <i class='bx bxs-checkbox' style="color: #9e0505;"></i>
                          <small>-Owned</small> <br>
                          <i class='bx bxs-checkbox' style="color: #188f03;"></i>
                          <small>-Available</small>
                        </div>
                      </div>
                      <div class="occupied">
                        <input type="radio" class="form-check-input rdo-occupied" name="filter-radio" data-site="<?php echo $row["site_name"] ?>" data-sector="<?php echo $row["sector"] ?>" id="occupied-lots-<?php echo explode(' ', trim($row["site_name"] ))[0].'-'.$row["sector"] ?>">
                        <label for="occupied-lots-<?php echo explode(' ', trim($row["site_name"] ))[0].'-'.$row["sector"] ?>">Occupied Lots</label>
                        <div class="occupied-legend">
                          <i class='bx bxs-checkbox' style="color: #db8812;"></i>
                          <small>-Occupied</small> <br>
                          <i class='bx bxs-checkbox' style="color: #6e18c9;"></i>
                          <small>-Vacant</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="right-side d-flex align-items-center justify-content-between px-3">
                      <div class="legends">
                        <h5>Legends:</h5>
                        <i class='bx bxs-checkbox' style="color: #ebcd81;"></i>
                        <small>-Standard</small> <br>
                        <i class='bx bxs-checkbox' style="color: #0cbab0;"></i>
                        <small>-Deluxe</small> <br>
                        <i class='bx bxs-checkbox' style="color: #e1e32b;"></i>
                        <small>-Premium</small> <br>
                      </div>
                      <div class="minimap p-1" style="border: 1px solid black; border-radius: 5px">
                        <img width="350px" src="../Assets/image/minimap/<?php echo $row["site_name"] ?>-<?php echo $row["sector"] ?>.png" alt="">
                      </div>
                    </div>
                    
                  </div>
                </div>
                
              </div>
              <div class="img-sector text-center">
                <img class="img-fluid rounded img-sector" src="../Assets/image/map/<?php echo $row["site_name"] ?> - <?php echo $row["sector"] ?>.png" alt="">
                
                <div class="lot_info">
                  
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer .map-footer">
              
            </div> -->
          </form>
        </div>
      </div>
    </div>
<?php } ?>
<!---------------------------------- VIEW LOCATION MAP----------------------------------------->
<?php while($row = $sql_view_loc->fetch_array()) { ?>
    <div class="modal fade" id="view-<?php echo explode(' ', trim($row["site_name"] ))[0].'-'.$row["sector"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl"> 
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
              <i class='bx bx-street-view fs-1'></i>
              &nbsp;View <?php echo $row["site_name"] ?> Sector <?php echo $row["sector"] ?> Map
            </h4>
            <button type="button" class="btn-close btn-close-white btn-reset-view-location" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body p-4">
              <div class="filter mb-4">
                <div class="legend d-flex justify-content-between px-3">
                  <div class="text-start">
                    <h5>Legends:</h5>
                    <i class='bx bxs-checkbox' style="color: #ebcd81;"></i>
                    <small>-Standard</small> <br>
                    <i class='bx bxs-checkbox' style="color: #0cbab0;"></i>
                    <small>-Deluxe</small> <br>
                    <i class='bx bxs-checkbox' style="color: #e1e32b;"></i>
                    <small>-Premium</small> <br>
                  </div>
                  <div class="p-1" style="border: 1px solid black; border-radius: 5px">
                      <img width="350px" src="../Assets/image/minimap/<?php echo $row["site_name"] ?>-<?php echo $row["sector"] ?>.png" alt="">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Switch Map</label>
                      </div>
                  </div>
                </div>
                
              </div>
              <div class="img-sector text-center">
                <img class="img-fluid rounded img-sector" src="../Assets/image/map/<?php echo $row["site_name"] ?> - <?php echo $row["sector"] ?>.png" alt="">
                
                <div class="lot_info">
                  
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer .map-footer">
              
            </div> -->
          </form>
        </div>
      </div>
    </div>
<?php } ?>
<!-- bootstrap js cdn -->

    <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
    <script src="../Assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
    <script src="../Assets/js/index.js" defer></script>

</body>
</html>