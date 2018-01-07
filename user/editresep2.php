<fieldset>
<legend>Edit Resep!</legend>

	<?php
	$idresep = @$_GET['idresep'];
	$sql = mysql_query("select * from tb_resep where id_resep = '$idresep'") or die (mysql_error());
	$data = mysql_fetch_array($sql);
	?>

	<link rel="stylesheet" type="text/css" id="theme" href="css/main.css"/>
		<form action="#" method="post" enctype="multipart/form-data"> 
		<div class="form_settings">
		<?php
		if (@$_SESSION['user']) {
					$user= @$_SESSION['user'];
				}

				$sql_user = mysql_query("select * from tb_login where id_user = '$user'") or die (mysql_error());
				$data_user = mysql_fetch_array($sql_user);
      			$id_user = $data_user['id_user'];
			?>
			<p><span>Username</span><input type="text" name="id_user" value="<?php echo $data_user['username'];?>" readonly/></p>
			<p><span>Judul</span><input type="text" name="judul" value="<?php echo $data['judul']; ?>" required/></p>
			<p><span>Bahan</span><textarea rows="8" cols="50" name="bahan" required><?php echo $data['bahan']; ?> </textarea></p>
			<p><span>Deskripsi</span><textarea rows="8" cols="50" name="deskripsi" required><?php echo $data['deskripsi']; ?> </textarea></p>
			<p><span>Gambar</span><input type="file" name="gambar"></p>
			<p style="padding-top: 15px">
			<input class="submit" type="submit" name="edit" value="Edit"/>
			<input class="submit" type="reset" value="Batal"/>
			</p>
			</div>
	</form>

	<?php
	$judul = @$_POST['judul'];
	$bahan = @$_POST['bahan'];
	$deskripsi = @$_POST['deskripsi'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'img/';
	$nama_gambar = @$_FILES['gambar']['name'];

	$edit = @$_POST['edit']; 

	if ($edit) {
		if($judul == "" || $bahan == "" || $deskripsi == "") {
			?>
			<script type="text/javascript">
			alert ("Inputan tidak boleh kosong!");
			</script>
			<?php
		} else {
			if ($nama_gambar == "") {
				mysql_query("update tb_resep set judul = '$judul', bahan = '$bahan', deskripsi= '$deskripsi' where id_resep= '$idresep'") or die (mysql_error());
				?>
					<script type="text/javascript">
					alert ("Data berhasil diperbaharui");
					window.location.href="?page=reseps&action=show";
					</script>
					<?php			
			} else {
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if ($pindah) {
					mysql_query("update tb_resep set  judul = '$judul', bahan = '$bahan', deskripsi= '$deskripsi', gambar = '$nama_gambar' where id_resep = '$idresep'") or die (mysql_error());
					?>
					<script type="text/javascript">
					alert ("Data berhasil diperbaharui !");
					window.location.href="?page=reseps&action=show";
					</script>
					<?php
			} else {
				?>
				<script type="text/javascript">
				alert ("Upload gambar gagal");
				</script>
				<?php
			}
		}
	}
}
?>
</fieldset>