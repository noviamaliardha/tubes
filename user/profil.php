<fieldset>
<legend>Profil</legend>

	<div style="margin-bottom:15px;">
		<form action="" method="post">

		<?php
		if (@$_SESSION['admin']) {
			$sesi = $_SESSION['admin'];
		} else if (@$_SESSION['user']) {
			$sesi = $_SESSION['user'];
		}
		$sql_profil = mysql_query("select * from tb_login where id_user='$sesi'") or die(mysql_error());
		$data = mysql_fetch_array($sql_profil);
		?>
		<tr>
				<td>Username</td>
				<td>:</td>
				<td><?php echo  $data['username'];?></td>
			</tr>
			<br>
			<br>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><?php echo $data['nama']; ?></td>
			</tr>
			<br>
			<br>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
			</tr>
			<br>
			<br>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $data['alamat']; ?></td>
			</tr>
</fieldset>