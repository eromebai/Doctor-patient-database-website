<?php 
//File for adding a new image into docimage for the bonus question
if(isset($_REQUEST['images'])){

	$doc = $_POST['photos'];

	$source = $_POST['source'];

	$query ="UPDATE doctors SET docimage = '$source' WHERE license = '$doc'";
	mysqli_query($connection,$query);

}

?>