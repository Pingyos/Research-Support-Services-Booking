<?php

	// Connect to database
	$con=mysqli_connect("localhost","root","","booking");

	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['booking_id'])){

		// Store the value from get to a
		// local variable "course_id"
		$booking_id=$_GET['booking_id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `bookingall` SET
			`designation`= 1 WHERE booking_id='$booking_id'";

		// Execute the query
		mysqli_query($con,$sql);
	}

	// Go back to course-page.php
	header('location: bookingtable.php');
?>