
<!DOCTYPE html>
<html lang="en">
<head>
  <script href="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
  <title>Log In | Divine Life Memorial Park</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="../Assets/css/style.css">

  <script src="../Assets/js/main.js" defer></script>
  <script src="../Assets/js/jquery.min.js"></script>
  
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <script src="../Assets/js/sweetalert.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="notif">
    </div>
    <div class="container">
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
                <!-- <div class="login-logo-container bg-white">
                    <img src="Assets/image/logopngplain.png" alt="Logo" class="login-logo">
                </div> -->
                
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
    </div>
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