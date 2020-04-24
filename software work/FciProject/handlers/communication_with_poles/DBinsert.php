<?php
$con = mysqli_connect("localhost", "root", "", "project"); //Connection variable
if(isset($_POST['pole_id'] , $_POST['pole_intensity']))

{
$pole_intensity = $_POST['pole_intensity']; // get the light range value and store it within the variable
$pole_id = $_POST['pole_id']; // get the pole ID value and store it within the variable to target the pole
$sql = mysqli_query($con , " UPDATE poles_info SET intensity = '$pole_intensity' , done = 'no'  WHERE id='$pole_id' "); //update the DB values
}




if (isset($_POST['plug_all_poles'])){
	$sql = mysqli_query($con , "UPDATE poles_info SET intensity = '255' , done = 'no' " );


}

if (isset($_POST['unplug_all_poles'])){
	$sql = mysqli_query($con , "UPDATE poles_info SET intensity = '0' , done = 'no' " );

}



?>