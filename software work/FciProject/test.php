<?php

$con = mysqli_connect("localhost", "root", "", "project");


$query = mysqli_query($con , "SELECT poles_number , line1volt , line2volt , line3volt , intensity , temperature , battery , solar_cell FROM poles_info ");
//$poles_datails_array = mysqli_fetch_array($query);

$json_arr = array() ;

while ($row = mysqli_fetch_assoc($query));

{
	$json_arr = $row;
}
$data = json_encode($json_arr);

echo $data;

?>