<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();

  if(isset($_SESSION["username"])){
    $slideshow=$con->query("SELECT * FROM `slideshow`");
    $slideshow_announcement=$con->query("SELECT * FROM `slideshow` WHERE `type`='Announcement'");
    $slideshow_banner=$con->query("SELECT * FROM `slideshow` WHERE `type`='Banner'");
    $slideshow_preview_banner=$con->query("SELECT * FROM `slideshow` WHERE `type`='Banner'");

  }else{
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
    <title>Slideshow | Divine Life Memorial Park</title>

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
<?php include("queries/application.php");?>
<?php include("queries/delete-items.php");?>
  
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

      <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Slideshow">
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
          <i class='bx bxs-carousel'></i>
          &nbsp;SLIDESHOW</h2>
          <hr>

          <div class="row p-0">
            <div class="col-sm-12 col-md-12">
              <div class="bg-white p-4 h-100 rounded">
                <div class="title-header bg-white sticky-top p-3 d-flex">
                  <h4 class="d-flex align-items-center">
                    <i class='bx bxs-slideshow fs-2' ></i>
                    &nbsp;Slideshow Setup</h4>
                    <button class="btn btn-primary edit-news d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#slideshowmodal">
                      <i class='bx bxs-add-to-queue fs-4'></i>
                      &nbsp;Add Slideshow
                    </button>      
                  </h4>
                </div>
                <br>
                <div class="customer-table">
                  <table class="tbl-customer table table-striped table-bordered w-100" id="tbl-customer"  style="font-size: 15px">

                    <thead class="tbl-header text-light">
                      <th>#</th>
                      <th>Slideshow Type</th>
                      <th>What</th>
                      <th>When</th>
                      <th>Where</th>
                      <th>Who</th>
                      <th style="width: 20%">Banner Image</th>  
                      <th>Action</th>
                    </thead>

                    <tbody>
                      <?php while($row=$slideshow->fetch_array()){ ?>
                        <tr>
                          <td class="align-middle"><?php echo $row["slideshow_id"] ?></td>
                          <td class="align-middle"><?php echo $row["type"] ?></td>
                          <td class="align-middle"><?php echo $row["what"] ?></td>
                          <td class="align-middle">
                            <?php 
                              if($row["when"]=="N/A"){
                                echo $row["when"];
                              }else{
                                echo date("M j, Y", strtotime($row["when"])); 
                              }
                            ?>
                          </td>
                          <td class="align-middle"><?php echo $row["where"] ?></td>
                          <td class="align-middle"><?php echo $row["who"] ?></td>
                          <td class="align-middle text-center"><img style="width: 60%;" src="files/banner_img/<?php echo $row["banner_image"] ?>"></td>
                          <td class="align-middle text-center">
                          <form action="" method="POST" >
                              <button type="button" class="btn btn-success edit-slideshow" data-bs-toggle="modal" data-bs-target="#edit-slideshow-<?php echo $row["slideshow_id"]?>">
                                <i class='bx bxs-edit'></i>
                              </button>
                            
                              <input type="hidden" name="slide-show-id" value="<?php echo $row["slideshow_id"] ?>">

                              <button class="btn btn-danger delete-slideshow" name="btn-del-slideshow">
                                <i class='bx bxs-trash'></i>
                              </button>
                            </form>
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

<!-- Modal -->
<div class="modal fade" id="slideshowmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
          <i class='bx bxs-carousel fs-1' ></i>
          &nbsp;Add Slideshow
        </h4>
        <button type="button" class="btn-close btn-close-white btn-close-slideshow" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="modal-body p-5">
            <div class="row mb-2">
              <div class="col-12 text-center">
                <label for="slideshow-type" class="">Slideshow Type:<i class="req">*</i></label>
                <center>
                  <select class="form-select" style="width: 50%" id="slideshow-type" name="slideshow-type" required>
                    <option value="" disabled selected>Select Type</option>
                    <option value="Announcement">Announcement</option>
                    <option value="Banner">Banner</option>
                  </select>
                </center>
              </div>
            </div>
            <div class="row mb-2" id="announcement" style="display:none">
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="what" class="">What:<i class="req">*</i></label>
                <input type="text" class="form-control w-100" id="what" name="what" required>
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="when" class="">When:<i class="req">*</i></label>
                <input type="date" class="form-control w-100" id="when" name="when" required>
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="where" class="">Where:<i class="req">*</i></label>
                <input type="text" class="form-control w-100" id="where" name="where" required>
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="who" class="">Who:<i class="req">*</i></label>
                <input type="text" class="form-control w-100" id="who" name="who" required>
              </div>
            </div>
            <div class="row mb-2 mt-3" id="banner" style="display:none">
              <div class="col text-center">
                <label for="banner-img" class="">Banner (860x360px):<i class="req">*</i></label>
                <center>
                  <input type="file" class="form-control" style="width: 80%" id="banner-img" name="banner-img" required> 
                </center>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="btn-submit-slideshow" id="btn-submit-slideshow" class="btn btn-primary">Add</button>
            <button type="reset" class="btn btn-danger reset-slideshow">Reset</button> 
        </div>
      </form>
    </div>
  </div>
</div>

<!-- EDIT MODAL ANNOUNCEMENT SLIDESHOWS -->
<?php while($row=$slideshow_announcement->fetch_array()){ ?>
  <div class="modal fade" id="edit-slideshow-<?php echo $row["slideshow_id"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-message-square-edit fs-1' ></i>
              &nbsp;Edit Slideshow
          </h4>
          <button type="button" class="btn-close btn-close-white btn-close-announce" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body p-5">
            <div class="row mb-2">
              <div class="col-12 text-center">
                <label for="edit-slideshow-type-announce" class="">Slideshow Type:<i class="req">*</i></label>
                <center>
                  <select class="form-select edit-slideshow-type-announce" style="width: 50%" id="edit-slideshow-type-announce" name="edit-slideshow-type-announce" required>
                    <option value="<?php echo $row["type"]?>"><?php echo $row["type"]?></option>
                    <option value="Announcement">Announcement</option>
                    <option value="Banner">Banner</option>
                  </select>
                </center>
              </div>
            </div>
            <div class="row mb-2 edit-announcement-announce" id="edit-announcement-announce">
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-what-announce" class="">What:<i class="req">*</i></label>
                <input type="text" class="form-control w-100 edit-what-announce" id="edit-what-announce" name="edit-what-announce" value="<?php echo $row["what"]?>" required>
                <input type="hidden" value="<?php echo $row["slideshow_id"]?>" name="edit-id-announce">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-when-announce" class="">When:<i class="req">*</i></label>
                <input type="date" class="form-control w-100 edit-when-announce" id="edit-when-announce" name="edit-when-announce" value="<?php echo $row["when"]?>" required>
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-where-announce" class="">Where:<i class="req">*</i></label>
                <input type="text" class="form-control w-100 edit-where-announce" id="edit-where-announce" name="edit-where-announce" value="<?php echo $row["where"]?>" required>
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-who-announce" class="">Who:<i class="req">*</i></label>
                <input type="text" class="form-control w-100 edit-who-announce" id="edit-who-announce" name="edit-who-announce" value="<?php echo $row["who"]?>" required>
              </div>
            </div>
            <div class="row mb-2 mt-3 edit-banner-announce" id="edit-banner-announce" style="display:none">
              <div class="col text-center">
                <label for="edit-banner-img-announce" class="">Banner (860x360px):<i class="req">*</i></label>
                <center>
                  <input type="file" class="form-control edit-banner-img-announce" style="width: 80%" id="edit-banner-img-announce" name="edit-banner-img-announce"> 
                </center>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="submit" name="btn-edit-slideshow-announce" id="btn-edit-slideshow" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-danger reset-announce">Reset</button> 
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
<!-- EDIT MODAL BANNER SLIDESHOWS -->
<?php while($row=$slideshow_banner->fetch_array()){ ?>
  <div class="modal fade" id="edit-slideshow-<?php echo $row["slideshow_id"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-message-square-edit fs-1' ></i>
              &nbsp;Edit Slideshow
          </h4>
          <button type="button" class="btn-close btn-close-white btn-close-banner" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body p-5">
            <div class="row mb-2">
              <div class="col-12 text-center">
                <label for="edit-slideshow-type-banner" class="">Slideshow Type:<i class="req">*</i></label>
                <center>
                  <select class="form-select edit-slideshow-type-banner" style="width: 50%" id="edit-slideshow-type-banner" name="edit-slideshow-type-banner" required>
                    <option value="<?php echo $row["type"]?>"><?php echo $row["type"]?></option>
                    <option value="Announcement">Announcement</option>
                    <option value="Banner">Banner</option>
                  </select>
                </center>
              </div>
            </div>
            <div class="row mb-2 edit-announcement-banner" id="edit-announcement-banner" style="display: none">
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-what-banner" class="">What:<i class="req">*</i></label>
                <input type="text" class="form-control w-100 edit-what-banner" id="edit-what-banner" name="edit-what-banner" value="<?php echo $row["what"]?>">
                <input type="hidden" value="<?php echo $row["slideshow_id"]?>" name="edit-id-banner">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-when-banner" class="">When:<i class="req">*</i></label>
                <input type="date" class="form-control w-100 edit-when-banner" id="edit-when-banner" name="edit-when-banner" value="<?php echo $row["when"]?>">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-where-banner" class="">Where:<i class="req">*</i></label>
                <input type="text" class="form-control w-100 edit-where-banner" id="edit-where-banner" name="edit-where-banner" value="<?php echo $row["where"]?>">
              </div>
              <div class="col-lg-6 col-md-12 mb-2">
                <label for="edit-who-banner" class="">Who:<i class="req">*</i></label>
                <input type="text" class="form-control w-100 edit-who-banner" id="edit-who-banner" name="edit-who-banner" value="<?php echo $row["who"]?>">
              </div>
            </div>
            <div class="row mb-2 mt-3 edit-banner" id="edit-banner">
              <div class="col text-center">
                <label for="edit-banner-img-banner" class="">Banner (860x360px):<i class="req">*</i> <a href="" data-bs-toggle="modal" data-bs-target="#preview-banner-<?php echo $row['slideshow_id']?>">Current Banner</a></label>
                <center>
                  <input type="file" class="form-control edit-banner-img-banner" style="width: 80%" id="edit-banner-img-banner" name="edit-banner-img-banner" required> 
                </center>
              </div>
            </div>
 
          </div>
          <div class="modal-footer">
              <button type="submit" name="btn-edit-slideshow-banner" id="btn-edit-slideshow-banner" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-danger reset-banner">Reset</button> 
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
<!-- CURRENT THUMBNAIL -->
<?php while($row=$slideshow_preview_banner->fetch_array()){ ?>
  <div class="modal fade" id="preview-banner-<?php echo $row['slideshow_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-file fs-1'></i> 
            &nbsp;Preview of Current Banner
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body p-5">
            <div class="text-center">
                <iframe style="width: 100%; height: 500px" src="files/banner_img/<?php echo $row['banner_image']?>" frameborder="0">
                </iframe>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>

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
