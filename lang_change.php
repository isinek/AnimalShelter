<?php
	session_start();
	if(isset($_GET['lang']) && strlen($_GET['lang']) == 2) {
		$_SESSION['lang'] = strtolower($_GET['lang']);
		header( "Location: /" );
	}
?>