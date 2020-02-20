<?php 	

//File for getting more details from listed doctors

if(isset($_REQUEST['docDetails'])){
			$clickedDoc = $_POST['docs'];
			$search = $_POST['firstOrL'];
			$query = "SELECT * FROM doctors WHERE $search = '$clickedDoc'";		
			$result = mysqli_query($connection,$query);
			$row = mysqli_fetch_assoc($result);
			echo "First name is $row[fname]."."<br>";
			echo "Last name is $row[lname]."."<br>";
			echo "Thier license number is $row[license]."."<br>";
			echo "They became licensed on $row[becameLicensed]."."<br>";
			echo "Thier speciality is $row[speciality]."."<br>";
			$query = "SELECT * FROM hospitals WHERE code = '$row[worksAt]'";
			$result = mysqli_query($connection,$query);
			$row = mysqli_fetch_assoc($result);
			echo "They work at $row[name] hospital in $row[city]."."<br>";

}	

else{}


 ?>