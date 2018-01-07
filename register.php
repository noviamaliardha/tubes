<!DOCTYPE html>
<html>
<head>
	<title>Daftar | LazyCooking!</title>
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>

<div id="utama" style="margin-top:80px;">
	<div id="judul">
		Halaman Register
	</div>

	<div id="input">
		<form action=""  method="post">
		<div>
			<input type="text" name="user" placeholder="Username" class="lg"/>
		</div>
		<div style="margin-top:10px;">
			<input type="password" name="password" placeholder="Password" class="lg"/>
		</div>
		<div style="margin-top:10px;">
			<input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="lg"/>
		</div>
		<div style="margin-top:10px;">
			<select name="jenis_kelamin">
				<option value="">- Pilih Jenis Kelamin -</option>
				<option value="Laki-Laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>			
			</select>
		</div>
		<div style="margin-top:10px;">
			<textarea name="alamat" class="lg" placeholder="Alamat"></textarea>
		</div>
		<div style="margin-top:10px;">
			<input type="submit" name="register" value="Register" class="btn"/>
			<span style="margin-left:120px;">
				<a href="login.php" class="btn-right">Login</a>
			</span>
		</div>
		</form>
		<?php
		include "inp/connect.php";
		if (@$_POST['register']) {
			$user = @$_POST['user']; 
			$password = @$_POST['password']; 
			$nama_lengkap = @$_POST['nama_lengkap']; 
			$jenis_kelamin = @$_POST['jenis_kelamin']; 
			$alamat = @$_POST['alamat'];

			if ($user == "" || $password == "" || $nama_lengkap == "" || $jenis_kelamin == "" || $alamat == "") {
			 	?> <script type="text/javascript"> alert("Inputan tidak boleh kosong");</script> <?php
			 } else {
			 	$sql_insert = mysql_query("insert into tb_login values ('','$user', '$nama_lengkap', '$password', '$jenis_kelamin', '$alamat', 'user')") or die (mysql_error());
			 	if ($sql_insert) {
			 		?> <script type="text/javascript"> alert("Pendaftaran berhasil, silahkan login.");</script> <?php
			 	}
			 } 

		}
		?>
	</div>
</div>

</body>
</html> 