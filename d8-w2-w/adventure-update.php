<?php


	if (array_key_exists('body', $_POST))
		{
		mysql_query("UPDATE adventure SET body='" . addslashes($_POST['body']) . "', link1='" . $_POST['link1'] . "', choice1='" . addslashes($_POST['choice1']) . "', link2='" . $_POST['link2'] . "', choice2='" . addslashes($_POST['choice2']) . "' WHERE page='" . $page . "';") or die("update failed.");
		}
				
?>


<h2>Update</h2>
<form action='index.html' method='post'>
<p>Page:<input type='text' name='page' value='<?php echo $page; ?>' /></p>
<p>Body:<br />
<textarea name='body' rows='25' cols='80'><?php echo $row['body']; ?></textarea></p>
<p>Choice 1 page#:<input type='text' name='link1' value='<?php echo $row['link1']; ?>' /></p>
<p>Choice 1 text:<input type='text' name='choice1' value='<?php echo $row['choice1']; ?>' /></p>
<p>Choice 2 page#:<input type='text' name='link2' value='<?php echo $row['link2']; ?>' /></p>
<p>Choice 2 text:<input type='text' name='choice2' value='<?php echo $row['choice2']; ?>' /></p>
<input type='submit' />

</form>

