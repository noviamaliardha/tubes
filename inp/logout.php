<?php
@session_start();

session_destroy();

header("location: /LazyCooking/public.php");
?>
