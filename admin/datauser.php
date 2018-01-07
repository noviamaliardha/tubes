<fieldset>
<legend>Data - data user</legend>
	<div class="row">
  	<form action="" method="post" role="search" class="navbar-form navbar-right">
        <div class="form-group">
        	<input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Username / Nama User...">
        </div>
            <button type="submit" name="cari_user" value="Cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
    </form>  
 	</div>
	<table class="table table-hover">
    <thead>
      <tr>
        <th style="text-align: center;">Username</th>
        <th style="text-align: center;">Nama</th>
        <th style="text-align: center;">Jenis Kelamin</th>
        <th style="text-align: center;">Alamat</th>
        <th style="text-align: center;">Opsi</th>
      </tr>
    </thead>
	<?php
	$inputan_pencarian = @$_POST['inputan_pencarian'];
	$cari_user = @$_POST['cari_user'];
	if ($cari_user) {
		if($inputan_pencarian != ""){
			$sql = mysql_query("select * from tb_login where username like '%$inputan_pencarian%' or nama like '%$inputan_pencarian%'") or die (mysql_error());
		} else {
			$sql = mysql_query("select * from tb_login where level='user'") or die (mysql_error());
		}
	} else {
		$sql = mysql_query("select * from tb_login where level='user'") or die (mysql_error());
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
				<td align="center"><?php echo $data['username']; ?></td>
				<td align="center"><?php echo $data['nama']; ?></td>
				<td align="center"><?php echo $data['jenis_kelamin']; ?></td>
				<td align="center"><?php echo $data['alamat']; ?></td>
				<td align="center">
				    <a href="?page=user&action=edit&iduser=<?php echo $data['id_user']; ?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
				    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=user&action=hapus&iduser=<?php echo $data['id_user']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
				</td>
			</tr>
			<?php
		}
	}
	?>
</table>
</fieldset>