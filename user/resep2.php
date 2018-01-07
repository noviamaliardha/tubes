<fieldset>
<legend>Kumpulan Menu Diet!</legend>
	<div class="row" style="margin-bottom:15px;">
  	<form action="" method="post" role="search" class="navbar-form navbar-right">
        <div class="form-group">
        	<input type="text" name="inputan_pencarian" class="form-control form-top" placeholder="Cari nama / bahan...">
        </div>
            <button type="submit" name="cari_menu" value="Cari" class="btn btn-default btn-link btn-search-top text-btn-top"><span class="glyphicon glyphicon-search"></span></button>
    </form>  
	</div>
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
		<div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="padding:0px; overflow: hidden;">
            	<a href="?page=reseps&action=lihat&idmenu=<?=$data['id_menu']?>" style="text-decoration: none;">
            	<center>
                <img style="width: auto;height: 250px" src="img/<?php echo $data['gambar']; ?>">
                </center> 	
                <br>
                <center>
                <b><font size="3px" style="margin-top:20px; text-align: center; margin-bottom: 10px; color: #000;"><?php echo $data['nama']; ?></font></b></center>
            </a>
            </div>
            <div class="panel-body" style="min-height: 0px;"><p style="text-align: center;"><span class="glyphicon glyphicon-heart"></span> Menu ini dibuat oleh LazyCooking</p>
              </div>	   
            </div>
          </div>
		<?php
		}
	}
	?>
</fieldset>