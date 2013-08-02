<?php
		
	echo stripslashes($row['body']);
	if ( $row['choice1'] != '' ){
		echo "<p><a href='index.html?page=" . $row['link1'] . "&prev=" . $page . "&choice=1'>" . stripslashes($row['choice1']) . "</a></p>\n";
	}
	if ( $row['choice2'] != '' ){
		echo "<p><a href='index.html?page=" . $row['link2'] . "&prev=" . $page . "&choice=2'>" . stripslashes($row['choice2']) . "</a></p>\n";
	}
	if ( $row['choice3'] != '' ){
		echo "<p><a href='index.html?page=" . $row['link3'] . "&prev=" . $page . "&choice=3'>" . stripslashes($row['choice3']) . "</a></p>\n";
	}

	
	echo "<p id='fix'><a href='index.html?page=" . $page . "&fixit=1'>Edit this page.</a></p>\n";
				
?>
