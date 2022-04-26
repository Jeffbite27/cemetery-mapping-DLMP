<?php

if(isset($_POST["btn-del-slideshow"])){
  $id=$_POST["slide-show-id"];
  $sql=$con->query("DELETE FROM `slideshow` WHERE `slideshow_id`='$id'");
  echo "<script>
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Successfully Deleted',
          text: 'You deleted a slideshow',
          timer: 2000
        })
    window.history.replaceState( null, null, window.location.href );
    </script>";
    header("refresh: 1;");
}

if(isset($_POST["btn-del-news"])){
  $id=$_POST["news-id"];
  $sql=$con->query("DELETE FROM `news_events` WHERE `news_id`='$id'");
  echo "<script>
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Successfully Deleted',
          text: 'You deleted a news/event',
          timer: 2000
        })
    window.history.replaceState( null, null, window.location.href );
    </script>";
    header("refresh: 1;");
}
