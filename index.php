 <?php
@session_start();
include "inp/connect.php";
ob_start();

if (@$_SESSION['admin'] || @$_SESSION['user']) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Lazy Cooking!</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	  <script src="bootstrap/jquery.js"></script>
	  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div id="canvas">	
<nav class="navbar navbar-default" style="background-color:  #FFCCCC; color: #fff;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/LazyCooking"><span class="glyphicon glyphicon-cutlery"></span>&nbsp LazyCooking!</a>
    </div>
    <ul class="nav navbar-nav">
    	<?php
		if (@$_SESSION['user']) { ?>
    	<li class="dropdown">
      	<a href="#" data-toggle="dropdown" class="dropdown-toggle">Menu
      		<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="?page=reseps">Kumpulan Menu Diet</a></li>
                <li><a href="?page=reseps&action=all">Kumpulan Resep</a></li>
            </ul>
      	</li>
      	<?php } ?>
      	<?php if (@$_SESSION['admin']) { ?>
      	<li class="dropdown">
      	<a href="#" data-toggle="dropdown" class="dropdown-toggle">Data
      		<b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="?page=resep">Data Menu</a></li>
                <li><a href="?page=user">Data User</a></li>
                <li><a href="?page=data">Data Resep User</a></li>
            </ul>
      	</li>
      	<?php } ?>
      	<li><a href="?page=stream">Tutorial Masak</a></li>
	    <li><a href="?page=profil">Profil</a></li>
	    <li><a href="?page=about">Tentang Kami</a></li>
	</ul>
	 <ul class="nav navbar-nav navbar-right"> 
      	<li class="dropdown">
      		<?php
				if(@$_SESSION['admin']){
					$user_terlogin = @$_SESSION['admin'];
				} else if (@$_SESSION['user']) {
					$user_terlogin = @$_SESSION['user'];
				}

				$sql_user = mysql_query("select * from tb_login where id_user = '$user_terlogin'") or die (mysql_error());
				$data_user = mysql_fetch_array($sql_user);
				?>
      		<a href="#" data-toggle="dropdown" class="dropdown-toggle">
      			<span class="glyphicon glyphicon-user"></span>&nbsp <?php echo $data_user['nama'];?><b class="caret"></b></a>
      			<ul class="dropdown-menu">
                <li><a href="?page=editprofil">Edit Profil</a></li>
                <li><a href="?page=reseps&action=show">Resep Saya</a></li>
            </ul>
      	</li>
     	<li><a href="inp/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

	<div id="isi">
	<?php
	$page = @$_GET['page']; 
	$action = @$_GET['action'];
	if ($page == "resep") {
		if (@$_SESSION['admin']) {
			if ($action == ""){
				include "inp/resep.php";
			} else if ($action == "edit") {
				include "inp/editresep.php";		
			} else if ($action == "tambah") {
				include "inp/tambahresep.php";
			} else if ($action == "hapus") {
				include "inp/deleteresep.php";
			} else if ($action == "add") {
				include "inp/tambahresep2.php";
			}
		} else  {
			echo "Anda tidak punya hak akses pada halaman ini!";
		}
	}
	elseif ($page=="data") {
	 	if (@$_SESSION['admin']) {
	 		if ($action == "") {
	 			include "admin/dataresep.php";
	 		} elseif ($action == "edit") {
	 			include "admin/editdataresep.php";
	 		} elseif ($action == "delete") {
	 			include "admin/deletedataresep.php";
	 		}
	 	}
	 } 
	else if ($page == "user") {
		if (@$_SESSION['admin']) {
			if ($action == ""){
				include "admin/datauser.php";
			} else if ($action == "edit") {
				include "admin/edituser.php";		
			} else if ($action == "tambah") {
				include "admin/tambahuser.php";
			} else if ($action == "hapus") {
				include "admin/deleteuser.php";
			}	
		} else  {
			echo "Anda tidak punya hak akses pada halaman ini!";
		}
	} 
	else if ($page == "reseps") {
		if (@$_SESSION['user'] || @$_SESSION['admin']) {
			if($action == ""){
				include "user/resep2.php";
			} else if ($action == "all") {
				include "user/resep3.php";	
			} elseif ($action == "detail") {
				include "user/show.php";
			} elseif ($action == "show") {
				include "user/resepuser.php";
			} else if ($action == "edit") {
				include "user/editresep2.php";	
			} else if ($action == "tambah") {
				include "user/tambahresep2.php";
			} else if ($action == "hapus") {
				include "user/deleteresep2.php";
			} else if ($action == "lihat") {
				include "inp/showresep.php";
			}			
		}
	}		
	else if ($page == "profil") {
		include "user/profil.php";
	} 
	else if ($page=="stream") {
      	include "stream.php";
    }
	else if ($page == "editprofil") {
		include "inp/editprofil.php";
	} 
	else if ($page == "about") {
		include "about.php";
	} 
	 else if ($page == "") {
		include "section.php";
	} else {
		echo "404 Page Not Found!";
	}
	?>
	</div>
	</div>
   <marquee  class="hidden-print" style="background-color:  #3c3c3c; color: #fff;"><b>Lazy Cooking | Tulis dan cari kumpulan resep masakan sehari-hari</b></marquee>
	
<div class="footer-bottom hidden-print"  style="background-color:  #FFCCCC; color:  	#606060;">
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

<?php
} else {
	header("location: login.php");
}
?>