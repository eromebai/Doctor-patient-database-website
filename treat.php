<?php 
//File for adding or removing a treament from the treats table;
	if(isset($_REQUEST['treatsinpt'])){
		$addOrD = $_POST['addOrDel'];
		$doc = $_POST['docTreat'];
		$pat = $_POST['patTreat'];

//Adding treatment
		if($addOrD == 'add'){

			$query ="INSERT INTO treats(patientOHIP, doctorLicense) VALUES ('$pat', '$doc')";
			mysqli_query($connection,$query);

			echo "Patient $pat is now treated by doctor license: $doc";
		}
//Deleting treatment
		else{
			$query ="DELETE FROM treats WHERE patientOHIP = '$pat' AND doctorLicense ='$doc'";
			mysqli_query($connection,$query);
			echo "Patient $pat is not treated by doctor license: $doc";
		}

	}

	else{}

?>