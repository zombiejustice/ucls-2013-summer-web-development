<?php
	include 'adventure-connect.php'; //This file will connect to your database

	
	if (array_key_exists('page', $_GET)) {
		$page = $_GET['page'];
		$prev = $_GET['prev'];
		$choice = $_GET['choice'];
	}
	else {
		$page = '1';
		$prev = '1';
		$choice = '1';
	}
	
	if($page == 0){
	
		include 'adventure-add.php';	
	
	}
	else {
		$results = mysql_query("SELECT * FROM adventure WHERE page='" . $page . "';") or die("Select failed.");
		$row = mysql_fetch_array($results);

		if (array_key_exists('fixit', $_GET)) {
			
			include 'adventure-update.php';

		}
		else {
	
			include 'adventure-play.php';
		
		}
	}
?>