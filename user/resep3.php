<fieldset>
<legend>Kumpulan Resep!</legend>
	<div class="row" style="margin-bottom:15px;">
  	<a href="?page=reseps&action=all" class="btn" style="background-color: #3c3c3c; color: #fff; text-decoration: none; margin-left: 20px;">Lihat Kumpulan Resep!
    </a>
    	<a href="<?=isset($_SESSION['user'])?'?page=reseps&action=tambah':'login.php'?>" class="btn btn-success" role="button" style="margin-left: 20px;"><span class="glyphicon glyphicon-edit"></span> Tulis Resep!</a>
  	<form action="" method="get" role="search" class="navbar-form navbar-right">
  	<input type="hidden" name="page" value="reseps">
	<input type="hidden" name="action" value="all">
        <div class="form-group">
        	<input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Cari nama / bahan...">
        </div>
            <button type="submit" name="cari_resep" value="Cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
    </form>  
	</div>
	<?php
	$inputan_pencarian = @$_GET['inputan_pencarian'];
	$cari_resep = @$_GET['cari_resep'];
	if ($cari_resep) {
		if($inputan_pencarian != ""){
			$sql = mysql_query("select a.*,b.username as username from tb_resep a join tb_login b on a.id_user=b.id_user where judul like '%$inputan_pencarian%' or bahan like '%$inputan_pencarian%'") or die (mysql_error());
		} else {
			$sql = mysql_query("select a.*,b.username as username from tb_resep a join tb_login b on a.id_user=b.id_user where status != ") or die (mysql_error());
		}
	} else {
		$sql = mysql_query("select a.*,b.username as username from tb_resep a join tb_login b on a.id_user=b.id_user where status != 2") or die (mysql_error());
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
              	<a href="?page=reseps&action=detail&id_resep=<?=$data['id_resep']?>" style="text-decoration: none;">
                  <center><img style="width: auto;height: 250px; margin-bottom: 20px;margin-top: 20px;" src="img/<?php echo $data['gambar']; ?>"></center> 	
                  <center><b><font size="3px" style="margin-top:20px; text-align: center; margin-bottom: 10px; color: #000;"><?php echo $data['judul']; ?></font></b></center>
              	</a>
              </div>
              <div class="panel-body" style="min-height: 0px;"><p style="text-align: center;"><span class="glyphicon glyphicon-heart"></span> Resep ini dibuat oleh <?php echo $data['username']; ?></p>
              </div>	       
             </div>
        </div>
		<?php
		}
	}
	?>
</fieldset>