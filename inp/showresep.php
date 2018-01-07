<fieldset>
<legend class="hidden-print">Kumpulan Menu Diet</legend>

	<div style="margin-bottom:15px;">
		<form action="" method="post">
			<?php
		$idmenu = @$_GET['idmenu'];
		$sql = mysql_query("select * from tb_menu where id_menu = '$idmenu'") or die (mysql_error());
		$data = mysql_fetch_array($sql);
		?>
		<form action="#" method="post" enctype="multipart/form-data"> 
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<center><img src="img/<?php echo $data['gambar']; ?>" width="500px"></center>
			      </tr>
				</div>
				<div class="col-sm-6">
					<table class="table">
			    <tbody>
			      <tr>
			      	<td align="justify"><p>Nama : </p><?php echo $data['nama']; ?></td>
			      </tr>
			      <tr>
			      	<td align="justify"><p>Rentang Hari :</p>
			      		<?php echo $data['hari']; ?> hari</td>
			      </tr>
			      <tr>
			      	<td align="justify"><p>Deskripsi : </p><?php echo $data['deskripsi']; ?></td>
			      </tr>
			      <tr>
			      	<td align="justify"><p>Menu : </p><?php echo $data['menu']; ?></td>
			      </tr>
			      <tr class="hidden-print">
			      	<td>
			      		<p style="padding-top: 15px"><a href="?page=reseps" class="btn btn-info">Kembali</a>&nbsp<a href="#" target="blank" onClick="window.print();" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> Print
   						</a>
			      	</td>
			      </div>
			      </tr>
			    </tbody>
			  </table>
			  </div>
			</div>
		</div>
	</form>
</fieldset>