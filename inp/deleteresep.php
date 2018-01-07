<?php
$idmenu = @$_GET['idmenu'];

mysql_query("delete from tb_menu where id_menu = '$idmenu'") or die (mysql_error());
?>

<script type="text/javascript">
	window.location.href="?page=resep";
</script>