<html>
<head><title>...script running...</title></head>
<body>
<h1>Danger! Script Page!</h1>
<?php


	include 'students.php';
	
	$link = mysql_connect("solas.phpwebhosting.com", 'summerlabweb', 'lobsterstorm');
	if (!$link)
		{
		die('Could not connect: ' . mysql_error());
  		}
  		
  		echo "connected\n";
  		
  	for ($i = 1; $i < count($students); $i++){
  	
	
		mysql_select_db($students[$i] . "_db", $link) or die("DB select failed");
		echo "selected database: " . $students[$i] . "_db\n";
	
		mysql_query("ALTER TABLE  `adventure` ADD  `link3` INT NULL ,
ADD  `choice3` TEXT NULL ,
ADD  `link4` INT NULL ,
ADD  `choice4` TEXT NULL,
ADD 'link5' TEXT NULL,
ADD 'choice5' TEXT NULL;") or die("Table creation failed");
		echo "table created\n"; 
	}
	
	
	mysql_close($link);
	echo "link closed";

?>
</body>
</html>