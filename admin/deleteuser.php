<?php
$iduser = @$_GET['iduser'];

mysql_query("delete from tb_login where id_user = '$iduser'") or die (mysql_error());
?>

<script type="text/javascript">
	window.location.href="?page=user";
</script>