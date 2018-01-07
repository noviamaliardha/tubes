<?php
$idresep = @$_GET['idresep'];

mysql_query("delete from tb_resep where id_resep = '$idresep'") or die (mysql_error());
?>

<script type="text/javascript">
	window.location.href="";
</script>