<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>eromebai - Asn3</title>
</head>
<body>
	<?php 
	include "connect.php"; 
	?>
	<!-- Section for searching doctors -->
	<h2>Search Doctors</h2>

	<form method="post" id ="form1">
		 <input type="radio" name="firstOrLast" value="first"> By First
		 Name
		 <input type="radio" name="firstOrLast" value="last"> By Last Name
		 <br>
		 <br>
		 <input type="radio" name="asOrDe" value="ascending"> Order A-Z
		 <input type="radio" name="asOrDe" value="decending"> Order Z-A
		 <br>
		 <br>
		 <button type="submit" value="submit" form="form1" name="docSearch">Search</button>
	</form>

	<?php include "get.php";
	?>
	<br>	
	<?php 	
		include "details.php";
	 ?>
	 <br>	
	 <hr>	
	 <br>

	 <!-- Section for searching finding doctors licensed before a given date -->
	 <h2>Doctors by Date</h2>	

	 <form method="post" id ="form2">
	 	<label>Check which doctors were licensed before the entered date</label>
		 <input type="date" name="doctorDate">
		 <button type="submit" value="submit" form="form2" name="date">Search</button>
	</form>

	<ul>	
	<?php 	
		include "date.php";
	 ?>
	</ul>

	<br>	
	<hr>	
	<br>


	<!-- Section for inserting doctors -->
	<h2>Insert a doctor</h2><br>

	<form method="post" id ="form3">
	 	<label></label>
		 First Name:<input type="text" name="docfName" required>
		 <br>
		 <br>
		 Last Name:<input type="text" name="doclName" required>
		 <br>
		 <br>
		 License Number:<input type="text" name="licenseNum" required>
		 <br>
		 <br>
		 Speciality:<input type="text" name="speciality" required>
		 <br>
		 <br>
		 Date of acquiring license:<input type="date" name="licenseDate" required>
		 <br>
		 <br>
		 <select name="hosp">
		 	<option selected disabled hidden value="no">Choose Hospital</option>
		 	<option value = "ABC">Vitoria Hospital London</option>
		 	<option value = "BBC">St. Joseph's Hospital London</option>
		 	<option value = "DDE">Vitoria Hospital British Columbia</option>
		 </select>
		 <br><br>
		 
		 <button type="submit" value="submit" form="form3" name="add">Add</button>
	</form>

	<br>
	<p>
		<?php 
			include "add.php";
		?>
	</p>

	<br>	
	<hr>	
	<br>


	<!-- Section for deleting doctors -->
	<h2>Delete a doctor</h2><br>
	<form method="post" id ="form4">
	<select name="del">
		<?php 
		$query = "SELECT * FROM doctors";		
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)) {
	 		echo "<option value=$row[license]>$row[fname] $row[lname]</option>";
	 		}
		 ?>
	</select>
	<button type="submit" value="submit" form="form4" name="delete">Delete</button>
	</form>
	<br>
	<p>
		<?php 
		include "delete.php";
		?>
	</p>

	<br>	
	<hr>	
	<br>


	<!-- Section for changing a hospital's name -->
	<h2>Change Hospital's Name</h2><br>
	<form method="post" id ="form6">
	<select name="hospCode">
		<?php 
		$query = "SELECT * FROM hospitals";		
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)) {
	 		echo "<option value=$row[code]>$row[name], $row[city]</option>";
	 		}
		 ?>
	</select>
	<br><br>
	Change to:<input type="text" name="nName" required>

	<button type="submit" value="submit" form="form6" name="change">Change</button>
	</form>
	<br>

	<p>
		<?php 
		include "change.php";
		?>
	</p>

	<br>	
	<hr>	
	<br>


	<!-- Section for listing hospitals -->
	<h2>Hospitals</h2>

	<ul>
		<?php 
			$query = "SELECT * FROM hospitals ORDER BY name";
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)) {
				$query = "SELECT * FROM doctors WHERE license = '$row[headLicense]'";
				$result2 = mysqli_query($connection,$query);
				$row2 = mysqli_fetch_assoc($result2);
	 			echo "<li>$row[name], Head Doctor is: $row2[fname] $row2[lname], Licensed on $row2[becameLicensed]</li>";
	 		}
		 ?>
	</ul>

	<br>	
	<hr>	
	<br>


	<!-- Section for finding patients -->
	<h2>Find Patients</h2>

	<form method="post" id ="form7">

		Find Patient by OHIP number:<input type="text" name="ohip">
		<button type="submit" value="submit" form="form7" name="patient">Search</button>
	</form>
	<div>
		<?php 
			include "patient.php";
		?>
	</div>


	<br>	
	<hr>	
	<br>

	<!-- Section for adding or removing treatments -->
	<h2>Add Treatments</h2>

	<form method="post" id ="form8">
	<input type="radio" name="addOrDel" value="add"> Add
	<input type="radio" name="addOrDel" value="del"> End
	<br><br>
	Doctor:<select name="docTreat">
		<?php 
		$query = "SELECT * FROM doctors";		
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)) {
	 		echo "<option value=$row[license]>$row[fname] $row[lname]</option>";
	 		}
		 ?>
	</select>
	Patient:<select name="patTreat">
		<?php 
		$query = "SELECT * FROM patients";		
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)) {
	 		echo "<option value=$row[OHIPnum]>$row[fname] $row[lname]</option>";
	 		}
		 ?>
	</select>
	<br><br>

	<button type="submit" value="submit" form="form8" name="treatsinpt">Change</button>
	</form>
	<br>
	<p>
		<?php 
			include "treat.php";
		?>
	</p>


	<br>	
	<hr>	
	<br>

	<!-- Section for listing doctors who do not have patients -->
	<h2>Doctors Without Patients</h2>
	<ul>
		<?php 
			$query = "SELECT DISTINCT * FROM doctors WHERE license NOT IN(SELECT DISTINCT doctorLicense FROM treats)";
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)) {
	 		echo "<li>$row[fname] $row[lname]</li>";
	 		}
		?>
	</ul>

	<br>	
	<hr>	
	<br>

	<!-- Section for doctors' images -->
	<h2>Doctors Images</h2>

	<form method="post" id ="form9">
		<?php 
			$query = "SELECT * FROM doctors";
			$result = mysqli_query($connection,$query);
			while ($row = mysqli_fetch_assoc($result)) {
	 			if(!is_null($row[docimage])){
	 				echo "<img src='$row[docimage]' alt='Photo of Dr.$row[lname]'style='width:128px;height:128px;'><br>";
	 			}
	 			else{
	 				echo "$row[fname] $row[lname]<input value=$row[license] type='radio' name='photos'><br>";
	 			}
	 		}

		?>

	Image Source:<input type="text" name="source" required>		

	<button type="submit" value="submit" form="form9" name="images">Add Photo</button>
	</form>

	<?php 
		include "image.php";
	?>


</body>
</html>