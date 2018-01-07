<fieldset>
<legend>Kumpulan Menu Diet!</legend>
	<div class="row">
		 <a href="?page=resep&action=tambah" class="btn btn-info" role="button" style="margin-left: 20px;"><span class="glyphicon glyphicon-edit"></span>Tambah Menu!</a>
  	<form action="" method="post" role="search" class="navbar-form navbar-right">
        <div class="form-group">
        	<input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Search...">
        </div>
            <button type="submit" name="cari_menu" value="Cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
    </form>  
 	</div>
 	<table class="table table-hover">
    <thead>
      <tr>
		<th style="text-align: center;">Nama</th>
        <th style="text-align: center;">Hari</th>
        <th style="text-align: center;">Deskripsi</th>
        <th style="text-align: center;">Menu</th>
        <th style="text-align: center;">Gambar</th>
		<th style="text-align: center;">Opsi</th>        
      </tr>
    </thead>
	<?php
	$inputan_pencarian = @$_POST['inputan_pencarian'];
	$cari_menu = @$_POST['cari_menu'];
	if ($cari_menu) {
		if($inputan_pencarian != ""){
			$sql = mysql_query("select * from tb_menu where id_menu like '%$inputan_pencarian%' or nama like '%$inputan_pencarian%'") or die (mysql_error());
		} else {
			$sql = mysql_query("select * from tb_menu") or die (mysql_error());
		}
	} else {
		$sql = mysql_query("select * from tb_menu") or die (mysql_error());
	}
	
	$cek = mysql_num_rows($sql);
	if ($cek < 1){
		?>
		<tr>
			<td colspan="7" align="center" style="padding:10px;">Data tidak ditemukan!</td>
		</tr>
		<?php
	} else {

		while ( $data = mysql_fetch_array($sql)) {
		?>
		<tr>
				<td align="justify"><?php echo $data['nama']; ?></td>
				<td align="justify"><?php echo $data['hari']; ?></td>
				<td align="justify"><?php echo $data['deskripsi']; ?></td>
				<td align="justify"><?php echo $data['menu']; ?></td>
				<td align="center"><img src="img/<?php echo $data['gambar']; ?>" width="120px"></td>
				<td align="center">
					<center>
               		<a href="?page=resep&action=edit&idmenu=<?php echo $data['id_menu']; ?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
               		<br>
				    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=resep&action=hapus&idmenu=<?php echo $data['id_menu']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
					</center>
				</td>
			</tr>
			<?php
		}
	}
	?>
</table>
</fieldset>
              