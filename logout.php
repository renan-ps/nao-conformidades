<?php
	include "header.php";
	session_start();
	session_destroy();
	
	header('location: login.php');
	include "footer.php";
?>