<?php

$link = mysql_connect("solas.phpwebhosting.com", 'summerlabweb', 'lobsterstorm');
	if (!$link)
		{
		die('Could not connect: ' . mysql_error());
  		}
	
	mysql_select_db("password_db", $link) or die("DB select failed");


?>