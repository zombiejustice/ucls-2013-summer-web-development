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
	
		mysql_query("CREATE TABLE adventure (
			page INT NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(page),
			body LONGTEXT,
			link1 INT,
			choice1 TEXT,
			link2 INT,
			choice2 TEXT
			);") or die("Table creation failed");
		echo "table created\n"; 
	}
	
	
	mysql_close($link);
	echo "link closed";

?>
</body>
</html>