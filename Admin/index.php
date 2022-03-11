
<!DOCTYPE html>
<html lang="en">
<head>
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
  <title>Log In | Divine Life Memorial Park</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

  <link rel="stylesheet" href="../Assets/css/style.css">
  <link rel="stylesheet" href="../Assets/css/admin_login.css">

  <script src="../Assets/js/main.js" defer></script>
  <script src="../Assets/js/jquery.min.js"></script>
  
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <script src="../Assets/js/sweetalert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="notif">
    </div>

    <div class="main-cont">
        <div class="container1">

            <div class="content first">
                <img src="../Assets/image/logopngplain.png" alt="">
            </div>

            <div class="content second">
                <h1>Admin Login</h1>
                <form class="login-form mt-2 p-5 form" method="post" action="" enctype="multipart/form-data">

                    <div class="main-input">
                        <div class="input-cont input-group has-validation">
                            <i class='bx bx-user'></i>
                            <input type="text" class="" placeholder="Username" name="user" aria-describedby="inputGroupPrepend" id="user" required>
                        </div>
                    </div>
                    
                    <div class="main-input">
                        <div class="input-cont input-group has-validation">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" class="" placeholder="Password" name="pwd" aria-describedby="inputGroupPrepend" id="pwd" required>
                        </div>
                    </div>
                    
                    <div class="submit-btn">
                        <button class="btn w-80 mt-3" type="" id="btn-login" name="btn-login">LOG IN</button>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="container2">
            <img src="../Assets/image/logopngplain.png" alt="">
            <p>Copyright © 2022 Divine Life Memorial Park. All rights reserved.</p>
        </div>
    </div>


    <!-- <div class="container">
        <div class="sectionlogin">
            <section class="section1 close">
                <div class="img">
                    <img src="../Assets/image/logopngplain.png" alt="Logo" class="img-logo">
                </div>
            </section>
            <section class="section2">
                <div class="sec-title">
                    <h1>ADMINISTRATOR</h1>
                </div>
                
                <div class="sec-form text-center">
                    <form class="login-form mt-2 p-5" method="post" action="" enctype="multipart/form-data">
                        <div class="col d-flex mb-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user login-icon"></i></span>
                                <input type="text" class="form-control" placeholder="Username" name="user" aria-describedby="inputGroupPrepend" id="user" required>
                            </div>
                        </div>
                       
                        <div class="col d-flex mb-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-lock login-icon"></i></span>
                                <input type="password" class="form-control" placeholder="Password" name="pwd" aria-describedby="inputGroupPrepend" id="pwd" required>
                            </div>
                        </div>

                        <button class="btn btn-lg w-100 mt-3 btn-login" type="" id="btn-login" name="btn-login">LOG IN</button>
                        <div class="text-end">
                            <small><a href="#" class="text-white">Forgot password?</a></small>
                        </div>
                        <br>
                    </form>
                    <p id="signup">Create an Account</p>     
                </div>
                
            </section>
        </div>
    </div> -->
</body>
<script>
    // ---------------------------------LOG IN----------------------------------------------
  $('.login-form').on('submit', function(e){
    e.preventDefault();
  
    $.post("queries/login.php", $(this).serialize(), function(data){
      $("#notif").html(data);
      window.history.replaceState( null, null, window.location.href );
    })
  });
</script>
</html>