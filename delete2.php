<?php 

//File which is executed when deleting doctor with patients

if(isset($_REQUEST['yes'])){
				$lic = $_POST['lic2'];
				$query = "DELETE FROM doctors WHERE license = '$lic'";
				$result = mysqli_query($connection,$query);
				$query = "DELETE FROM treats WHERE doctorLicense = '$lic'";
				$result = mysqli_query($connection,$query);

				echo "Deleted!";
			}
else{}			

 ?>