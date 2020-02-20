<?php 	
	//File for checking which doctors were licensed before a given date
	if(isset($_REQUEST['date'])){
			include "connect.php"; 

			//Date formatting
			$date = $_POST['doctorDate'];
			$date = strtotime($date);
			$date = date('Y-m-d', $date);

 			$query = "SELECT * FROM doctors WHERE becameLicensed < '$date'";		
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)) {
	 		echo "<li>$row[fname] $row[lname], $row[speciality], licensed on $row[becameLicensed]. </li>";
	 		}
	}

	else{}

 ?>