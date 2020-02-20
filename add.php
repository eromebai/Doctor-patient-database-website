<?php 
	//This file is for adding new doctors to the database

	if(isset($_REQUEST['add'])){
		$fname = $_POST['docfName'];
		$lname = $_POST['doclName'];
		$licenseN = $_POST['licenseNum'];
		$spec = $_POST['speciality'];
		$date = $_POST['licenseDate'];
		$hosp = $_POST['hosp'];

		//If user didnt select a hospital
		if(!($hosp == 'BBC') && !($hosp == 'ABC') && !($hosp == 'DDE') ){
			echo "Please Select a Hospital and try again";
		}

		else{

			include "connect.php"; 
			$query = "SELECT * FROM doctors";		
			$result = mysqli_query($connection,$query);
			$check = "false";

			while ($row = mysqli_fetch_assoc($result)) {
	 			if($row[license] == $licenseN){
	 				$check = "true";
	 			}
	 		}

	 		//If there is already a doctor with the given license
	 		if($check == "true"){
	 			echo "A doctor with that license number is already registered!";
	 		}

	 		//formatting licensed date and adding to doctors table
	 		else{
	 			$date = strtotime($date);
				$date = date('Y-m-d', $date);

	 			$query = "INSERT INTO doctors(fname, lname, license, becameLicensed, speciality, worksAt) VALUES ('$fname', '$lname', '$licenseN', '$date', '$spec', '$hosp')";

	 			mysqli_query($connection,$query);

	 			echo "Doctor entered successfully!";

	 		}

		}

	}
	else{}
		

 ?>