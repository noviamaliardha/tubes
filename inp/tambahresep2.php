<fieldset>
<legend> Tambah Resep</legend>
	<link rel="stylesheet" type="text/css" id="theme" href="css/main.css"/>
		<form action="#" method="post" enctype="multipart/form-data"> 
		<div class="form_settings">
		<?php
		if (@$_SESSION['admin'])
		 	{
				$user= @$_SESSION['admin'];
				}

				$sql_user = mysql_query("select * from tb_login where id_user = '$user'") or die (mysql_error());
				$data_user = mysql_fetch_array($sql_user);
      			$id_user = $data_user['id_user'];
				?>
				<p><span>Username</span><input type="text" name="id_user" value="<?php echo $data_user['username'];?>" readonly/></p>
				<p><span>Judul</span><input type="text" name="judul" required/></p>
				<p><span>Bahan - bahan</span><textarea rows="8" cols="50" name="bahan" required></textarea></p>
				<p><span>Langkah pembuatan</span><textarea rows="8" cols="50" name="deskripsi" required></textarea></p>
				<p><span>Gambar</span><input type="file" name="gambar"/></p>
				<p style="padding-top: 15px"><input class="submit" type="submit" name="tambah" value="Tambah"/><input class="submit" type="reset" value="Reset" style="margin-right: 20px;" /></p>
			</tr>
		</table>
	</form>
	<?php
	$id_resep = @$_POST['id_resep'];
	$judul = @$_POST['judul'];
	$bahan = @$_POST['bahan'];
	$deskripsi = @$_POST['deskripsi'];

	$sumber = @$_FILES['gambar']['tmp_name'];
	$target = 'img/';
	$nama_gambar = @$_FILES['gambar']['name'];


	$tambah_resep = @$_POST['tambah']; 

	if ($tambah_resep)
	{

		if( $judul == "" || $bahan == "" || $deskripsi == "" || $nama_gambar == "" )
		{
			?> 	
			<script type="text/javascript"> 
			alert("Inputan tidak boleh kosong");
			</script> 
			<?php
		} else {
			$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
			if ($pindah) {
				mysql_query("insert into tb_resep values(' ','$id_user','$judul','$bahan','$deskripsi','$nama_gambar','1')") or die (mysql_error());
				?>
				<script type="text/javascript">
				alert ("Resep berhasil dibuat !");
				window.location.href="?page=data";
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