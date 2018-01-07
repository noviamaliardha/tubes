<fieldset>
<legend>Data Resep User</legend>
	<div class="row">
		<a href="?page=resep&action=add" class="btn btn-info" role="button" style="margin-left: 20px;"><span class="glyphicon glyphicon-edit"></span>Tambah Resep!
		</a>
  	<form action="" method="post" role="search" class="navbar-form navbar-right">
        <div class="form-group">
        	<input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Search...">
        </div>
            <button type="submit" name="cari_resep" value="Cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
    </form>  
 	</div>
	<table class="table table-hover">
    <thead>
      <tr>
        <th style="text-align: center;">Username</th>
		<th style="text-align: center;">Judul</th>
        <th style="text-align: center;">Bahan</th>
        <th style="text-align: center;">Deskripsi</th>
        <th style="text-align: center;">Gambar</th>
        <th style="text-align: center;">Status</th>
		<th style="text-align: center;">Opsi</th>        
      </tr>
    </thead>
	<?php
	$inputan_pencarian = @$_POST['inputan_pencarian'];
	$cari_resep = @$_POST['cari_resep'];
	if ($cari_resep) {
		if($inputan_pencarian != ""){
			$sql = mysql_query("select * from tb_resep where judul like '%$inputan_pencarian%' or bahan like '%$inputan_pencarian%'") or die (mysql_error());
		} else {
			$sql = mysql_query("select * from tb_resep where status !=2") or die (mysql_error());
		}
	} else {
		$sql = mysql_query("select * from tb_resep  where status !=2") or die (mysql_error());
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
				<td align="justify"><?php echo $data['id_user'];?></td>
				<td align="justify"><?php echo $data['judul']; ?></td>
				<td align="justify"><?php echo $data['bahan']; ?></td>
				<td align="justify"><?php echo $data['deskripsi']; ?></td>
				<td align="center"><img src="img/<?php echo $data['gambar']; ?>" width="120px"></td>
				<td align="justify">
					<?php 
			        if ($data['status'] == 0){ 
			        	echo "Menunggu"; 
			        }else if ($data['status'] == 1){
			        	echo "Diterima";
			        }else{
			        	echo "Ditolak";
			        } ?>
				</td>
				<td align="center">
					 <a href="verifikasi.php?id=<?=$data['id_resep']?>&amp;verif=1" class="btn btn-success btn-lg">
          				<span class="glyphicon glyphicon-ok-circle"></span> Terima
        			</a>
        			<br>
        			<br>
        			<a href="verifikasi.php?id=<?=$data['id_resep']?>&amp;verif=2" class="btn btn-danger btn-lg">
          				<span class="glyphicon glyphicon-remove-circle"></span> Tolak
        			</a>
				</td>
			</tr>
			<?php
		}
	}
	?>
</table>
</fieldset>