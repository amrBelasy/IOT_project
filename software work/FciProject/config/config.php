<?php

//this file contains database connection , we will then include it in our other pages that need connection

$con = mysqli_connect("localhost","root","","project") ;// connection variable is $con

// here we check if there is any error on the connection dispay an error message

if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>