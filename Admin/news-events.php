<?php 
  if(!isset($_SESSION)){
    session_start();    
  }
  include("../config.php");
  $con=connect();

  if(isset($_SESSION["username"])){
    $news_events=$con->query("SELECT * FROM `news_events`");
    $news_events_edit=$con->query("SELECT * FROM `news_events`");
    $news_thumbnail=$con->query("SELECT * FROM `news_events`");

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
<?php include("queries/application.php");?>
  
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
                    <i class='bx bx-news fs-2'></i>
                    &nbsp;News & Events Setup</h4>
                    <button class="btn btn-primary edit-news d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#newsmodal">
                      <i class='bx bxs-user-plus fs-4'></i> 
                      &nbsp;Add News & Events
                    </button>      
                  </h4>
                </div>
                <br>
                <div class="customer-table">
                  <table class="tbl-customer table table-striped table-bordered w-100" id="tbl-customer"  style="font-size: 15px">

                    <thead class="tbl-header text-light">
                      <th>#</th>
                      <th>Date</th>
                      <th>Title</th>
                      <th>Subtitle</th>
                      <th>Description</th>
                      <th style="width: 20%">News Image</th>  
                      <th>Action</th>
                    </thead>

                    <tbody>
                      <?php while($row=$news_events->fetch_array()){ ?>
                        <tr>
                          <td class="align-middle"><?php echo $row["news_id"] ?></td>
                          <td class="align-middle"><?php echo date("M j, Y", strtotime($row["news_date"]))?></td>
                          <td class="align-middle"><?php echo $row["news_title"] ?></td>
                          <td class="align-middle"><?php echo $row["news_subtitle"] ?></td>
                          <td class="align-middle"><?php echo $row["news_description"] ?></td>
                          <td class="align-middle text-center"><img style="width: 60%;" src="files/news_img/<?php echo $row["news_img"] ?>"></td>
                          <td class="align-middle text-center">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-news-<?php echo $row["news_id"]?>">
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

<!-- Modal -->
<div class="modal fade" id="newsmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
          <i class='bx bx-news fs-1'></i>
          &nbsp;Add News & Events
        </h4>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="" method="POST" enctype="multipart/form-data">

        <div class="modal-body p-5">
            <div class="row mb-2">
              <div class="col">
                <label for="title" class="">News/Events Title:<i class="req">*</i></label></label>
                <input type="text" class="form-control w-100" id="title" name="title" required>
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-md-8">
                <div class="col">
                  <label for="subtitle" class="">Subtitle:<i class="req">*</i></label>
                  <input type="text" class="form-control" id="subtitle" name="subtitle" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="col">
                  <label for="news_date" class="">Date:<i class="req">*</i></label>
                  <input type="date" name="news_date" id="news_date" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="row-mb-2">
              <div class="col-12 mb-2">
                <label for="description">Description:<i class="req">*</i></label>
                <textarea  maxlength="200" class="form-control " id="description" name="description" rows="2"></textarea required>
              </div>
              <div class="col-12">
                <label for="thumbnail">Thumbnail:<i class="req">*</i></label>
                <input class="form-control thumbnail" type="file" accept=".png, .jpg, .jpeg" id="thumbnail" name="thumbnail" required>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="btn-submit-news" id="btn-submit-news" class="btn btn-primary">Add</button>
            <button type="reset" class="btn btn-danger">Reset</button> 
        </div>
      </form>
    </div>
  </div>
</div>

<!-- EDIT MODAL NEWS & EVENTS -->
<?php while($row=$news_events_edit->fetch_array()){ ?>
  <div class="modal fade" id="edit-news-<?php echo $row["news_id"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bx-news fs-1'></i>
            &nbsp;Edit News & Events
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body p-5">
              <div class="row mb-2">
                <div class="col">
                  <label for="title" class="">News/Events Title:<i class="req">*</i></label>
                  <input type="text" class="form-control w-100" id="title" value="<?php echo $row["news_title"] ?>" name="edit_title" required>
                  <input type="hidden" name="edit_news_id" value="<?php echo $row["news_id"] ?>">
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-md-8">
                  <div class="col">
                    <label for="subtitle" class="">Subtitle:<i class="req">*</i></label>
                    <input type="text" class="form-control" id="subtitle" value="<?php echo $row["news_subtitle"] ?>" name="edit_subtitle" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="col">
                    <label for="news_date" class="">Date:<i class="req">*</i></label>
                    <input type="date" name="edit_news_date" id="news_date" value="<?php echo $row["news_date"] ?>" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row-mb-2">
                <div class="col-12 mb-2">
                  <label for="description">Description:<i class="req">*</i></label>
                  <textarea class="form-control" id="description" name="edit_description" rows="5"><?php echo $row["news_description"] ?></textarea required>
                </div>
                <div class="col-12">
                  <label for="thumbnail">Thumbnail:<i class="req">*</i></label> <a href="" data-bs-toggle="modal" data-bs-target="#preview-thumbnail-<?php echo $row['news_id']?>"><i class='bx bx-paperclip bx-rotate-270' ></i>Current Thumbnail </a>
                  <input class="form-control thumbnail" type="file" accept=" .png, .jpg" id="thumbnail" name="edit_thumbnail">
                </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" name="btn-edit-news" id="btn-edit-news" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-danger">Reset</button> 
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>
<!-- CURRENT THUMBNAIL -->
<?php while($row=$news_thumbnail->fetch_array()){ ?>
  <div class="modal fade" id="preview-thumbnail-<?php echo $row['news_id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl"> 
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
            <i class='bx bxs-file fs-1'></i> 
            &nbsp;Thumbnail of <?php echo $row["news_title"] ?>
          </h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          <div class="modal-body p-5">
            <div class="text-center">
                <iframe style="width: 100%; height: 500px" src="files/thumbnails/<?php echo $row['news_img']?>" frameborder="0">
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
