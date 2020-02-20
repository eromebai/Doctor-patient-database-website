<?php 
	
	//File for changing the name of a hospital
	if(isset($_REQUEST['change'])){
		$to = $_POST['nName'];
		$code = $_POST['hospCode'];

		$query = "UPDATE hospitals SET name = '$to' WHERE code = '$code'";		
		mysqli_query($connection,$query);

		echo "Changed!";

	}

	else{}
 ?>