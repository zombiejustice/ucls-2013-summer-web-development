<form id='pupform' method='post' action='mudpuppy.html'>
<ul id='puplist'>
<?php


	$link = mysql_connect("solas.phpwebhosting.com", 'summerlabweb', 'lobsterstorm');
	if (!$link)
		{
		die('Could not connect: ' . mysql_error());
  		}
	
	mysql_select_db("mudpuppy_db", $link) or die("DB select failed");
	
	if (array_key_exists('alive', $_POST)){
		//echo 'CHECK IT ';
        if ($_POST['alive']){
            mysql_query("UPDATE puppies SET hunger='" . $_POST['hunger'] . "', fat='" . $_POST['fat'] . "', love='" . $_POST['love'] . "', time=NOW(), energy='" . $_POST['energy'] . "' WHERE pup_id='" . $_POST['pup_id'] . "';") or die("update failed.");
        	//echo "ALIVE";
        }
        else {
            mysql_query("DELETE FROM puppies WHERE pup_id='" . $_POST['pup_id'] . "';") or die("Puppy death error.");
            //echo "DEAD";
       }
	}

	$query = "SELECT pup_id, name FROM puppies;";
	 
	$results = mysql_query($query) or die("Query failed");
	
	while($row = mysql_fetch_array($results)){
		echo "<li><input type='radio' name='pup_id' value='" . $row['pup_id'] . "' /> " . $row['name'] . "</li>\n";
	}
	
?>
</ul>
<input type='submit' />
</form>