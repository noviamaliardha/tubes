<?php
include "inp/connect.php";


if(isset($_GET['verif'])):
	if($_GET['verif']=="1"){
		$id = $_GET['id'];
		$query = mysql_query("update tb_resep set status=1 where id_resep='$id'");
		if (!$query) echo "update gagal";	
		}else{
				$id = $_GET['id'];
				$query = mysql_query("update tb_resep set status=2 where id_resep='$id'");
				if (!$query) echo "update gagal";		
			}
?>
	<script type="text/javascript">
	window.location.href="index.php?page=data";
	</script>

<?php endif; ?>