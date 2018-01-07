<fieldset>
<legend> Tambah Resep</legend>
	<?php
	$carikode = mysql_query("select max(id_menu) from tb_menu") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if ($datakode){
		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1; 		
		$hasilkode = "M".str_pad($kode, 3, "0", STR_PAD_LEFT);
	} else {
		$hasilkode = "M001";
	}
	?>

	
	<link rel="stylesheet" type="text/css" id="theme" href="css/main.css"/>
		<form action="#" method="post" enctype="multipart/form-data"> 
		<div class="form_settings">
			<p><span>Kode Menu</span><input type="text" name="id_menu" value="<?php echo $hasilkode; ?>"/></p>
			<p><span>Nama</span><input type="text" name="nama" required/></p>
			<p><span>Hari</span><input type="text" name="hari" required/></p>
			<p><span>Deskripsi</span><textarea rows="8" cols="50" name="deskripsi" required></textarea></p>
			<p><span>Menu</span><textarea rows="8" cols="50" name="deskripsi" required></textarea></p>
			<p><span>Gambar</span><input type="file" name="gambar"/></p>
			<p style="padding-top: 15px"><input class="submit" type="submit" name="tambah" value="Tambah"/><input class="submit" type="reset" value="Reset" style="margin-right: 20px;" /></p>
			</tr>
		</table>
	</form>

	<?php
	$id_menu = @$_POST['id_menu'];
	$nama = @$_POST['nama'];
	$hari = @$_POST['hari'];
	$deskripsi = @$_POST['deskripsi'];
	$menu = @$_POST['menu'];
	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'img/';
	$nama_gambar = @$_FILES['gambar']['name'];

	$tambah_menu = @$_POST['tambah']; 

	if ($tambah_menu)
	{
		if($id_menu == "" || $nama == "" || $hari == "" || $deskripsi == "" || $menu == "" || $nama_gambar == "" )
		{
			?>
			<script type="text/javascript">
			alert ("Inputan tidak boleh kosong!");
			</script>
			<?php
		} else {
			$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
			if ($pindah) {
				mysql_query("insert into tb_menu values('$id_menu','$nama','$hari','$deskripsi','$menu','$nama_gambar')") or die (mysql_error());
				?>
				<script type="text/javascript">
				alert ("Tambah data menu baru berhasil !");
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
?>
</fieldset> 