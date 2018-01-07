<?php
@session_start();
include "inp/connect.php";

if (@$_SESSION['admin'] || @$_SESSION['user']) {
	header("location: index.php");
} else {
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" href="css/style.css"/>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	  <script src="bootstrap/jquery.js"></script>
	  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
<div id="utama">
	<div id="judul"><span class="glyphicon glyphicon-cutlery"></span>&nbsp
		Lazy Cooking!  
	</div>

	<div id="input">
	<form action="" method="post">
		<div>
			<input type="text" name="user" placeholder="username" class="lg"/>
		</div>
		<div style="margin-top:10px;">
			<input type="password" name="pass" placeholder="password" class="lg"/>
		</div>
		<div style="margin-top:10px;">
			<input type="submit" name="login" value="Login" class="btn"/>
			<span style="margin-left:110px;">
				<a href="register.php" class="btn-right">Register</a>
			</span>
		</div>
			
	</form>

	<?php
	$user = @$_POST['user'];
	$pass = @$_POST['pass'];
	$login = @$_POST['login'];

	if($login) {
		if($user == "" || $pass == "") {
			?> <script type="text/javascript">alert("Username atau Password tidak boleh kosong!");</script> <?php
		} else {
			$sql = mysql_query("select * from tb_login where username = '$user' and password= '$pass'") or die (mysql_error());
			$data = mysql_fetch_array($sql);
			$cek = mysql_num_rows($sql);
			if ($cek >= 1){ 
				if ($data['level'] == "admin"){
					@$_SESSION['admin'] = $data['id_user'];
					header("location: index.php");
				} else if ($data['level'] == "user"){
					@$_SESSION['user'] = $data['id_user'];
					header("location: index.php");
				}
			} else {
				?><script type="text/javascript">alert("Login gagal, username / password salah. Silahkan coba lagi!");</script><?php
			}
		}
	}
	?>
	</div>
</div>

</body>
</html>

<?php
}
?>