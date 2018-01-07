<fieldset>
<legend>Edit Data User</legend>

	<?php
	$iduser = @$_GET['iduser'];
	$sql = mysql_query("select * from tb_login where id_user = '$iduser'") or die (mysql_error());
	$data = mysql_fetch_array($sql);
	?>
	 <link rel="stylesheet" type="text/css" id="theme" href="css/main.css" />
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="form_settings">
              <p><span>Username</span><input type="text" name="username" value="<?php echo $data['username'];?>" required/></p>
              <p><span>Password</span><input type="text" name="password" value="<?php echo $data['password'];?>" required/></p>
              <p><span>Nama</span><input type="text" name="nama" value="<?php echo $data['nama'];?>" required/></p>
			  <p><span>Jenis Kelamin</span><input type="text" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin'];?>" disabled="disabled"/></p>
              <p><span>Alamat</span><textarea rows="8" cols="50" name="alamat" required><?php echo $data['alamat'];?></textarea></p>

			 <p style="padding-top: 15px"><input class="submit" type="submit" name="edit" value="Edit" /></p>
            </div>
          </form>

	<?php
	if (@$_POST['edit']) {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$nama = mysql_real_escape_string($_POST['nama']);
		$alamat = mysql_real_escape_string($_POST['alamat']);
		mysql_query("update tb_login set username = '$username', password = '$password', nama = '$nama', alamat = '$alamat' where id_user= '$iduser'") or die (mysql_error());
		header("location: ?page=user");
	}
	
?>
</fieldset>