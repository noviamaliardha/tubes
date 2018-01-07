<fieldset>
<legend>Kumpulan Resep Saya!</legend>
	<div class="row">
		 <a href="?page=reseps&action=tambah" class="btn btn-success" role="button" style="margin-left: 20px;"><span class="glyphicon glyphicon-edit"></span> Tulis Resep!</a>
  	<form action="" method="post" role="search" class="navbar-form navbar-right">
        <div class="form-group">
        	<input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Search...">
        </div>
            <button type="submit" name="cari_menu" value="Cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
    </form>  
 	</div>
	<?php
	if (@$_SESSION['user']) {
				$user= @$_SESSION['user'];
				}
	$inputan_pencarian = @$_POST['inputan_pencarian'];
	$cari_menu = @$_POST['cari_menu'];
	if ($cari_menu) {
		if($inputan_pencarian != ""){
			$sql = mysql_query("select * from tb_resep where id_resep like '%$inputan_pencarian%' or judul like '%$inputan_pencarian%'") or die (mysql_error());
		} else {
			$sql = mysql_query("select * from tb_resep where id_user='$user' ") or die (mysql_error());
		}
	} else {
		$sql = mysql_query("select * from tb_resep where id_user='$user'") or die (mysql_error());
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
          <div class="col-sm-4">
              <div class="panel panel-default">
              <div class="panel-heading" style="padding:0px;overflow: hidden;">
                  <center><img style="width: auto;height: 250px; margin-bottom: 20px;margin-top: 20px;" src="img/<?php echo $data['gambar']; ?>"></center> 	
                  <center><b><font size="3px" style="margin-top:20px; text-align: center; margin-bottom: 10px;"><?php echo $data['judul']; ?></font></b></center>
              </div>
              <?php
				if (@$_SESSION['user']) {
				$user= @$_SESSION['user'];
				}

				$sql_user = mysql_query("select * from tb_login where id_user = '$user'") or die (mysql_error());
				$data_user = mysql_fetch_array($sql_user);
      			$id_user = $data_user['id_user'];
				?>
              <div class="panel-body" style="min-height: 0px"><p>Resep ini dibuat oleh <?php echo $data_user['username']; ?></p>
              	<br>Status :
					<?php 
			        if ($data['status'] == 0){ 
			        	echo "Menunggu"; 
			        }else if ($data['status'] == 1){
			        	echo "Diterima";
			        }else{
			        	echo "Ditolak";
			        } ?>
			   </div>
               <div class="panel-footer">
               		<center>
               		<a href="?page=reseps&action=edit&idresep=<?php echo $data['id_resep']; ?>"  class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
				    <a onclick="return confirm('Yakin ingin menghapus data ?')" href="?page=reseps&action=hapus&idresep=<?php echo $data['id_resep']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a>
					</center>
				</div>
            </div>
        </div>
		<?php
		}
	}
	?>
</fieldset>