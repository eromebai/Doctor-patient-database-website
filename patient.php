<?php 
	//File for listing patients

	if(isset($_REQUEST['patient'])){
		$num = $_POST['ohip'];

		$query = "SELECT * FROM patients WHERE OHIPnum = '$num'";

		$result = mysqli_query($connection,$query);
		
		if(!(mysqli_num_rows($result)==0)){
			$row = mysqli_fetch_assoc($result);
			echo "<br>First name is: $row[fname]<br>Last name is:$row[lname]<br><br>They are treated by:<br>";
			$query = "SELECT DISTINCT * FROM treats WHERE patientOHIP = '$num'";
			$result = mysqli_query($connection,$query);


			//Finding doctors which treat them
			while ($row = mysqli_fetch_assoc($result)) {
				$query = "SELECT * FROM doctors WHERE license = '$row[doctorLicense]'";
				$result2 = mysqli_query($connection,$query);
				$row2 = mysqli_fetch_assoc($result2);
				echo "Dr.$row2[fname] $row2[lname]<br>";
			}

		}
		else{
			echo "No patients found with that OHIP number";
		}

	}
	else{}



?>