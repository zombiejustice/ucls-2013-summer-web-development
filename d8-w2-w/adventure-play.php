<?php
		
	echo $row['body'];
	echo "<p><a href='index.html?page=" . $row['link1'] . "&prev=" . $page . "&choice=1'>" . $row['choice1'] . "</a></p>\n";
	echo "<p><a href='index.html?page=" . $row['link2'] . "&prev=" . $page . "&choice=2'>" . $row['choice2'] . "</a></p>\n";
	echo "<p id='fix'><a href='index.html?page=" . $page . "&fixit=1'>Edit this page.</a></p>\n";
				
?>
