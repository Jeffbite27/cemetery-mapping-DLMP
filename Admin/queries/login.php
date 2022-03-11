<?php 

    if(!isset($_SESSION)){
        session_start();    
    }

    include("../../config.php");
    $con=connect();
    extract($_POST);
    $user=mysqli_real_escape_string($con, $_POST["user"]);
    $pwd=mysqli_real_escape_string($con, $_POST["pwd"]);

    $sql=$con->query("SELECT * FROM `admin_acc` WHERE `username`='$user'");
    $row=$sql->fetch_assoc();
    
    if(($sql->num_rows!=0)&&($row["username"]=="$user"&&$row["password"]=="$pwd")){
      $_SESSION["username"]=$row["username"];
      echo 
        "<script>
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Successfully Logged In',
            text: 'Welcome $_SESSION[username]!',
            showConfirmButton: false,
            timer: 2000
          })
          setTimeout(function () {
            location.href='dashboard.php';
            }, 2000);
          
        </script>";
    }else{
      echo 
      "<script>
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Invalid Email and Password',
          text: 'Please enter valid email and password',
          confirmButtonColor: '#0d6efd'
        })
      </script>";
    }
?>