<?php 

    include("../config.php");
    $con=connect();

    $query = $con->query("SELECT * FROM (((((`deceased_persons` INNER JOIN `customers` ON deceased_persons.customer_id=customers.customer_id)INNER JOIN `lot_owners` ON deceased_persons.lot_owner_id=lot_owners.lot_owner_id)INNER JOIN `tbl_sites` ON deceased_persons.site_id=tbl_sites.site_id)INNER JOIN `tbl_blocks` ON deceased_persons.block_id=tbl_blocks.block_id)INNER JOIN `tbl_lots` ON deceased_persons.lot_id=tbl_lots.lot_id)");

    $sql_modal_map=$con->query("SELECT * FROM (`tbl_blocks` INNER JOIN `tbl_sites` ON tbl_blocks.site_id=tbl_sites.site_id)");

    $sql_view_loc=$con->query("SELECT * FROM (`tbl_blocks` INNER JOIN `tbl_sites` ON tbl_blocks.site_id=tbl_sites.site_id)");

    
    if(isset($_GET["item"])){
      $news_id=$_GET["item"];

      $sql_news=$con->query("SELECT * FROM `news_events` WHERE `news_id`='$news_id'");
      $row=$sql_news->fetch_array();

     
      $sql_news_events=$con->query("SELECT * FROM `news_events` WHERE `news_id`!='$news_id'"); 
    }else{
      header("Location: ../index.php");
    }
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
                    <a href="../index.php#news">NEWS & EVENTS</a> 
                </li>
                <li> 
                    <a href="../index.php#contact">CONTACT</a> 
                </li>
            </ul>
        </nav>

  </header>
</div>
<div class="container" style="position: relative; top: 100px">
  <section class="news">
    <div class="row">
        <div class="news-header ">
            <h1>NEWS AND EVENTS</h1>
        </div>
        <div class="news-title mt-4">
          <?php echo $row["news_title"] ?>
        </div>
        <div class="news-subtitle mt-3">
          <?php echo $row["news_subtitle"] ?>
        </div>
        <div class="news-date mt-3">
          <?php echo date("M j, Y", strtotime($row["news_date"]))?>
        </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-8 col-sm-12">
        <div class="news-pic">
          <img class="rounded" src="../Admin/files/news_img/<?php echo $row["news_img"] ?>" alt="">
        </div>
        <div class="news-desc mt-3">
          <p class="p-0">
            <?php echo $row["news_description"] ?>
          </p>
        </div>
      </div>
     
      <div class="col-lg-4 col-sm-12 rounded">
        <div class="other-news mb-3">
          <h3 style="font-weight: 700">Other News and Events</h3>
        </div>
        <?php while($rows=$sql_news_events->fetch_array()){ ?>
        <div class="row mb-4 p-2 rounded other-news-item">
          <div class="col-12 rounded px-0">
            <div class="sub-img">
              <img class="other-news-img rounded" src="../Admin/files/news_img/<?php echo $rows["news_img"] ?>" alt="">
            </div>
           
            <div class="other-news-title mt-3 mx-3 text-justify">
              <p class="m-0"><?php echo $rows["news_title"] ?></p>
            </div>
            <div class="other-news-subtitle mx-3">
              <p class="lead fst-italic fs-6"><?php echo $rows["news_subtitle"] ?></p>
            </div>
            <div class="other-news-date mt-2 mx-3">
              <p class="m-0 fs-8 fw-light"><?php echo date("M j, Y", strtotime($row["news_date"]))?></p>
            </div>
            <div class="mx-3">
              <a href="news_and_events.php?item=<?php echo $rows["news_id"] ?>">
                <button class="btn btn-primary w-100 mt-3 mb-3">
                  View more
                </button>
              </a>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
       
    </section>
</div>


<!-- bootstrap js cdn -->

    <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
    <script src="../Assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
    <script src="../Assets/js/index.js" defer></script>

</body>
</html>