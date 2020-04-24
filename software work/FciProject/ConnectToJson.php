<?php
// database cpnnection for establishing connection with database using PDO 
$connection = mysqli_connect("localhost", "root","","Project") or die ('Database Not Connected.');
mysqli_select_db($connection,"project");
// getting the json file decoded then fetch the date therefrom
$arr_data = json_decode(file_get_contents("js_read.json"), true);
foreach($arr_data as $i =>$values){
  //  echo "$i". "<br>";
    foreach($values as $key => $value){
       // echo "$key" . " = " . "$value" . "<br>";
    }        if ($arr_data["$i"]["led_status"] == "1"){
            //write My code to turn it on or call the function to turn it on with JS 
    } else{
        //write the code to turn it off or call the funvtion to turn it off with JS code
    }
}
?>