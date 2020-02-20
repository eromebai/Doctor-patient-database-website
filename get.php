<?php

	//File for getting the doctors in the database with the format that the user wants

 	if($_POST['docSearch'] == 'submit' && isset($_POST['firstOrLast'])){
 		$fOrL = $_POST['firstOrLast'];
 		if(isset($fOrL)){
 		$search;
 		switch($fOrL){
 			//Check if the want first or last name
 			case "first": $search = fname; break;
 			case "last": $search = lname; break;

 		}

 		switch($_POST['asOrDe']){
 			//Check A-Z or Z-A
 			case "ascending": $query = "SELECT * FROM doctors ORDER BY $search"; break;
 			case "decending": $query = "SELECT * FROM doctors ORDER BY $search desc"; break;
 		}

 		$result = mysqli_query($connection,$query);

 		echo "<form method='post'>";
	 	while ($row = mysqli_fetch_assoc($result)) {
	 		$current = $row[$search];
	 		echo "<input type='radio' name='docs' value=$current>" . $current . "</input>". "<br>";
	 	}
	 	echo "<button type='submit' value='submit' name='docDetails'>Get Details</button>";

	 	echo "<input type=hidden name=firstOrL value=$search>";

		echo "</form>";

		mysqli_free_result($result); 
		}	
 	}	
	
	else{
		
	}
?>