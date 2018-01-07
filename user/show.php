<?php
	$idresep = @$_GET['id_resep'];
	$sql = mysql_query("select a.*,b.username as username from tb_resep a join tb_login b on a.id_user=b.id_user where id_resep = '$idresep'") or die (mysql_error());
	$data = mysql_fetch_array($sql);
	?>

	<link rel="stylesheet" type="text/css" id="theme" href="css/main.css"/>
		<form action="#" method="post" enctype="multipart/form-data"> 
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<center><img src="img/<?php echo $data['gambar']; ?>" width="300px"></center>
			      </tr>
				</div>
				<div class="col-sm-6">
					<table class="table">
			    <tbody>
			      <tr>
			        <td align="justify"><p><span class="glyphicon glyphicon-heart"></span> Resep ini dibuat oleh <?php echo $data['username']; ?></p></td>
			      </tr> 
			      <tr>
			      	<td align="justify"><p>Judul : </p><?php echo $data['judul']; ?></td>
			      </tr>
			      <tr>
			      	<td align="justify"><p>Bahan - bahan yang dibutuhkan : </p><?php echo $data['bahan']; ?></td>
			      </tr>
			      <tr>
			      	<td align="justify"><p>Langkah pembuatan : </p><?php echo $data['deskripsi']; ?></td>
			      </tr>
			      <tr class="hidden-print">
			      	<td>
			      		<p>
			      		<a href="?page=reseps&action=all" class="btn btn-info">Kembali
    					</a>
			      		&nbsp
			      		<a href="javascript:window.print()" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print
   						</a>
   					</td>
			      </tr>
			    </tbody>
			  </table>
				</div>
			</div>
		</div>
	</form>