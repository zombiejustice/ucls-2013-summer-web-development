<?php


	if (array_key_exists('body', $_POST))
		{
		if ($_POST['password'] == "zanzibar"){
			mysql_query("UPDATE adventure SET body='" . addslashes($_POST['body']) . "', link1='" . $_POST['link1'] . "', choice1='" . addslashes($_POST['choice1']) . "', link2='" . $_POST['link2'] . "', choice2='" . addslashes($_POST['choice2']) . "' WHERE page='" . $page . "';") or die("update failed.");
			echo "Page updated.";
			}
			else {
				echo "Incorrect Password.";
			}
		}
		else {		


echo "<h2>Update</h2>\n";
echo "<form action='index.html?page=" . $page . "&fixit=0' method='post'>\n";
echo "<p>Page:<input type='text' name='page' value='" . $page . "' /></p>\n";
echo "<p>Body:<br />\n";
echo "<textarea name='body' rows='25' cols='80'>" . $row['body'] . "</textarea></p>\n";
echo "<p>Choice 1 page#:<input type='text' name='link1' value='" . $row['link1'] . "' /></p>\n";
echo "<p>Choice 1 text:<input type='text' name='choice1' value='" . $row['choice1'] . "' /></p>\n";
echo "<p>Choice 2 page#:<input type='text' name='link2' value='" . $row['link2'] . "' /></p>\n";
echo "<p>Choice 2 text:<input type='text' name='choice2' value='" . $row['choice2'] . "' /></p>\n";
echo "<p>Enter password to edit: <input type='password' name='password' /></p>\n";
echo "<input type='submit' />\n";
echo "</form>\n";

	}
