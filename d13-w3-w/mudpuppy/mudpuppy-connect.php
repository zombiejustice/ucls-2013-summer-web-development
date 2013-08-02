<script type='text/javascript'>
//set our variables with PHP magic
<?php

	if (array_key_exists('pup_id', $_POST)){

		$link = mysql_connect("solas.phpwebhosting.com", 'summerlabweb', 'lobsterstorm');
		if (!$link)
			{
			die('Could not connect: ' . mysql_error());
  			}
	
		mysql_select_db("mudpuppy_db", $link) or die("DB select failed");
	
		$query = "SELECT * FROM puppies WHERE pup_id=" . $_POST['pup_id'] . ";";
	 	
		foreach (mysql_fetch_array(mysql_query($query)) as $key => $value){
			$$key = $value;
			}
			
		echo "var pup_id = $pup_id;\n";
		echo "var name = '$name';\n";
		echo "var hunger = $hunger;\n";
		echo "var fat = $fat;\n";
		echo "var love = $love;\n";
		echo "var energy = $energy;\n";
		echo "var time = " . strtotime($time) . ";\n";
		echo "var curtime = " . time() . ";\n";
	}
?>
//end magic
</script>
