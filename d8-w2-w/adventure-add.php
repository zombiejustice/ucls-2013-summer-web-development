<?php

	if (array_key_exists('body', $_POST))
		{
		mysql_query("INSERT INTO adventure (body, link1, choice1, link2, choice2) VALUES ('" . addslashes($_POST['body']) . "','" . $_POST['link1'] . "','" . addslashes($_POST['choice1']) . "','" . $_POST['link2'] . "', '" . addslashes($_POST['choice2']) . "');") or die("insert failed.");
		mysql_query("UPDATE adventure SET link" . $choice . "=LAST_INSERT_ID() WHERE page='" . $prev . "';");
		echo "<p>New page added! <a href='index.html'>Start over.</a></p>";
	}
	else {		
echo <<<EOD

<form action='#' method='post'>
<p>Body:<br />
<textarea name='body' rows='25' cols='80'></textarea></p>
<p>Choice 1 page#:<input type='text' name='link1' value='0' /></p>
<p>Choice 1 text:<input type='text' name='choice1' /></p>
<p>Choice 2 page#:<input type='text' name='link2' value='0' /></p>
<p>Choice 2 text:<input type='text' name='choice2' /></p>
<input type='submit' />

</form>
EOD;
	}
?>
