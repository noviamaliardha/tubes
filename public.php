<?php
include "inp/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title class="hidden-print">LazyCooking!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .footer-bottom {
    border-top-width: 1px;
    border-top-color: #000;
    background-color: #e8e8e8;
    min-height: 60px;
    width: 100%;
}
.copyright {
    color: #505050;
    line-height: 30px;
    min-height: 30px;
    padding: 7px 0;
}
.design {
    color: #D3D3D3;
    line-height: 30px;
    min-height: 80px;
    padding: 7px 0;
    text-align: right;
}
.design a {
    color: blue;
}
.btn-search {
    background: #424242;
    border-radius: 0;
    color: #fff;
    border-width: 1px;
    border-style: solid;
    border-color: #1c1c1c;
  }
  .btn-search:link, .btn-search:visited {
    color: #fff;
  }
  .btn-search:active, .btn-search:hover {
    background: #1c1c1c;
    color: #fff;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-default" style="background-color:  #FFCCCC; color: #fff;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="public.php"><span class="glyphicon glyphicon-cutlery"></span> LazyCooking!</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="?page=stream">Tutorial Masak</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  <?php
  $page = @$_GET['page']; 
  $action = @$_GET['action'];
  if ($page == "reseps"){
      if ($action == "") {
        include "user/resep3.php";
      } else if ($action == "detail") {
        include "user/show.php";    
      } else if ($action == "all") {
        include "user/resep3.php";
      } 
    } else if ($page=="") {
      include "section.php";
    } else if ($page=="stream") {
      include "stream.php";
    } else {
        ?>
        <script>
        alert ('Anda harus melakukan login terlebih dahulu!');
        window.location.href="login.php";
        </script>";
        <?php
        }
?>


<marquee class="hidden-print" style="background-color:  #3c3c3c; color: #fff;"><b>Lazy Cooking | Tulis dan cari kumpulan resep masakan sehari-hari</b></marquee>
  
<div class="footer-bottom hidden-print" style="background-color:  #FFCCCC; color:    #606060;">
  <div class="container">
  <div class="row">
    <div class="col-sm-3">
      <h3>Lazy Cooking!</h3>
          <p>Tulis dan cari kumpulan resep masakan sehari-hari dengan mudah dan rapi. Nikmati dan bagikan pengalaman memasak di LazyCooking. Masak makin menyenangkan!</p>
    </div>
    <div class="col-sm-6" style="margin-top: 20px;">
      <center>© 2017 | Lazy Cooking, All rights reserved</center>
    </div>
    <div class="col-sm-3" style="float: right;">
          <table class="table">
          <tbody>
            <tr>
              <td><img src="img/facebook.png" style="width:35px; margin-right: 10px; ">Lazy Cooking</td>
            </tr> 
            <tr>
              <td><img src="img/line.png" style="width:35px; margin-right: 10px; ">@lazycooking</td>
            </tr>
            <tr>
              <td><img src="img/whatsapp.png" style="width:35px; margin-right: 10px; ">083893622011</td>
            </tr>
          </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>
