<fieldset>
<legend>Edit Resep!</legend>

	<?php
	$idmenu = @$_GET['idmenu'];
	$sql = mysql_query("select * from tb_menu where id_menu = '$idmenu'") or die (mysql_error());
	$data = mysql_fetch_array($sql);
	?>

	<link rel="stylesheet" type="text/css" id="theme" href="css/main.css"/>
		<form action="#" method="post" enctype="multipart/form-data"> 
		<div class="form_settings">
			<p><span>Kode Menu</span>
			<input type="text" name="id_menu" value="<?php echo $data['id_menu']; ?>" disabled="disabled"/></p>
			<p><span>Nama</span><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required/></p>
			<p><span>Hari</span><input type="text" name="hari" value="<?php echo $data['hari']; ?>" required/></p>
			<p><span>Deskripsi</span><textarea rows="8" cols="50" name="deskripsi" required><?php echo $data['deskripsi']; ?> </textarea></p>
			<p><span>Menu</span><textarea rows="8" cols="50" name="menu" required><?php echo $data['menu']; ?> </textarea></p>
			<p><span>Gambar</span><input type="file" name="gambar"></p>
			<p style="padding-top: 15px">
			<input class="submit" type="submit" name="edit" value="Edit"/>
			<input class="submit" type="reset" value="Batal"/>
			</p>
			</div>
	</form>

	<?php
	$nama = @$_POST['nama'];
	$hari = @$_POST['hari'];
	$deskripsi = @$_POST['deskripsi'];
	$menu = @$_POST['menu'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'img/';
	$nama_gambar = @$_FILES['gambar']['name'];

	$edit = @$_POST['edit']; 

	if ($edit) {
		if($nama == "" || $hari == "" || $deskripsi == "" || $menu == "") {
			?>
			<script type="text/javascript">
			alert ("Inputan tidak boleh kosong!");
			</script>
			<?php
		} else {
			if ($nama_gambar == "") {
				mysql_query("update tb_menu set nama = '$nama', hari = '$hari', deskripsi= '$deskripsi', menu = '$menu' where id_menu= '$idmenu'") or die (mysql_error());
				?>
					<script type="text/javascript">
					alert ("Data berhasil diperbaharui");
					window.location.href="?page=resep";
					</script>
					<?php			
			} else {
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if ($pindah) {
					mysql_query("update tb_menu set nama = '$nama', hari = '$hari', deskripsi = '$deskripsi', menu = '$menu', gambar = '$nama_gambar' where id_menu = '$idmenu'") or die (mysql_error());
					?>
					<script type="text/javascript">
					alert ("Data berhasil diperbaharui !");
					window.location.href="?page=resep";
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