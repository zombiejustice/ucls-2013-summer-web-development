<?php
	$link = mysql_connect('solas.phpwebhosting.com', 'summerlabweb', 'lobsterstorm');
	if (!$link)
		{
		die('Connection failed');
		}
		
	mysql_select_db($myname . '_db', $link) or die("DB select failed");
?>