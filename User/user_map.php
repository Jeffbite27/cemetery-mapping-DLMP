

<!DOCTYPE html>
<html lang="en">
<head>
    <script href="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
    <title>Divine Life Memorial Park</title>
    
    <link rel="stylesheet" href="../Assets/css/style.css">
    <script src="../Assets/js/index.js" defer></script>

    <link rel="stylesheet" href="../Assets/css/user_map.css">


    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- jquery cdn  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- boxicons cdn  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- swiper js cdn -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>



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
    

    <section class="sec mb-5">
        <div class="container">
            <h1></h1>
            <div class="container-fluid  py-4 cont-main">
                <h1>Guiding Path To Your Loved Ones</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsam eos vero ullam eius unde ut ex voluptas reprehenderit ab cumque?</p>
                <form action="" method="post" class="w-25 m-auto pt-3" >
                    <input type="text" class="form-control w-20" name="filter_value" placeholder="Name of deceased">
                    <button class="btn mt-3 px-5 search-btn text-white" type="submit" name="filter_btn">Search</button>
                </form>
            </div>
        </div>
        
    </section>

    <div class="sec2">
        <div class="container">
            <table class="table table-striped table-bordered " id="tbl-find-map">
                <thead class="tbl-header text-light">
                    <th scope="col">#</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Relative</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">Details</th>
                    <th scope="col">Grave Address</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php
                    $connection = mysqli_connect("localhost","root","", "divinelifedb");
                    if(isset($_POST['filter_btn'])){
                        $value_filter = $_POST['filter_value'];
                        $query = "Select * from deceased_persons WHERE CONCAT(dead_family_name,dead_fname,dead_mname,dead_relative,dead_relative_surname) LIKE '%$value_filter%'";
                        $query_run = mysqli_query($connection, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            while($row = mysqli_fetch_array($query_run)){
                                ?>
                                <tr>
                                    <td><?php echo $row['dead_family_name']; ?></td>
                                    <td><?php echo $row['dead_fname']; ?></td>
                                    <td><?php echo $row['dead_mname']; ?></td>
                                    <td><?php echo $row['dead_relative']; ?></td>
                                    <td><?php echo $row['dead_relative_surname']; ?></td>
                                </tr>

                                <?php
                            }
                        }

                        else{
                             ?>
                             <tr>
                                 <td colspan="6">No Record Found</td>
                             </tr>
                             <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<!-- bootstrap js cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>