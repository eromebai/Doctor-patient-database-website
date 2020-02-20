<?php 
	//File for deleting a given doctor
	if(isset($_REQUEST['delete'])){
		$lic = $_POST['del'];

		$query = "SELECT * FROM treats WHERE doctorLicense = '$lic'";		
		$result = mysqli_query($connection,$query);
		
		//If the doctor treats a patient
		if(!(mysqli_num_rows($result)==0)){
			echo "<form method='post' id ='form5'>";
			echo "<label>This doctor treats patients, would you like to delete? </label>";
			echo "<input type=hidden name=lic2 value=$lic>";
			echo "<button tpye='submit' value='submit' name='yes' form='form5'>YES</button>";
			echo "</form>";		
		}
		//If the doctor does not treat a patient
		else{
			$query = "DELETE FROM doctors WHERE license = '$lic'";
			$result = mysqli_query($connection,$query);
			echo "Deleted!";
		}
		
			
	}
	else{}


 ?>