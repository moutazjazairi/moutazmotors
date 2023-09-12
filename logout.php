<?php 
	session_start();
	session_destroy();
	echo "<script>onclick(window.location.href='index.php');</script>";
 ?>