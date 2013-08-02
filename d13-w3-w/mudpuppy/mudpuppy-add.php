<?php
	$link = mysql_connect("solas.phpwebhosting.com", 'summerlabweb', 'lobsterstorm');
	if (!$link)
		{
		die('Could not connect: ' . mysql_error());
  		}
	
	mysql_select_db("mudpuppy_db", $link) or die("DB select failed");
	
	if (array_key_exists('newpup', $_POST)){
		mysql_query("INSERT INTO puppies (name, hunger, fat, love, energy) VALUES ('" . $_POST['newpup'] . "', 45, 45, 10, 80);") or die("insert failed.");
	}
?>
<script type='text/javascript'>
function addpupform(){
	document.getElementById('pupform').innerHTML = "Pup Name: <input type='text' name='newpup' />";
	document.getElementById('pupform').innerHTML += "<input type='submit' />";
	document.getElementById('pupform').action = 'index.html';
}
</script>