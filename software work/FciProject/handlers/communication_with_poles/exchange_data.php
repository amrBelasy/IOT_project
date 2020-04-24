<?php 
$con = mysqli_connect("localhost", "root", "", "project");//DataBase Connection

	if (isset($_GET['Data'])) // hold the request coming from arduion
	{
	$data_recieved = $_GET['Data']; //store it into a variable so that i can make use of the GET request
	$data_recieved_santizied = str_replace("'" , '"' , $data_recieved); // the request coming with sigle quote , here we replace single quote with double to be a valid JSON format
	}

												/* note   ****

			
			when we submit the data from the control page , we assign a default value for each pole

			we assign a value of status = no ... that mean the control values that i submit haven't

			 applied yet by the hardware side , once applied we update it to yes , that mean already this 

			 value has been applied */

			$query = mysqli_query($con , "SELECT * FROM poles_info WHERE done = 'no' ");
			//here we select all values that haven't applied yet >>>> status = no 

			$query_count = mysqli_num_rows($query); 
			//count the query than have status no


			if($query_count == 5 ) // 5 here indicate to total number of poles until now , if we find the all five pole their value havn't applied yet , then it mean that i will control ALL POLES IN ONE TIME  
			{
			$arr_data = json_decode($data_recieved_santizied, true); // store the json data unto a array
			foreach($arr_data as $rows){ // looping over the data
				$line1volt = $rows['v1']; 
				$line2volt = $rows['v2'];
				$line3volt = $rows['v3'];
				$temperature = $rows['temp'];
				$battery = $rows['B'];
				$solar_cell = $rows['sc'];
				$led_sensor = $rows['ls'];


			$id = $rows['pn']; // the recorded ID of the target pole

			// the first query .... storing the recieved data

			$storing_data = mysqli_query($con , " UPDATE poles_info  SET line1volt = '$line1volt' , line2volt = '$line2volt' , line3volt = '$line3volt' , temperature = '$temperature' , battery = $battery , solar_cell = $solar_cell , led_sensor = $led_sensor where id = '$id'");	


			$select_all_poles = mysqli_query($con , "SELECT * FROM poles_info  WHERE id = 1 ");
			// here we put id = 1 or 2 or any number it will not cause difference as all the value are the same , either 0 or 255 >>> only if i will control all poles one time , but if i will control pole by pole , the value may differ from pole to pole 

			$poles_array = mysqli_fetch_array($select_all_poles);
			$intensity = $poles_array['intensity'];

		}//end foreach
			echo "d#{pole_number:0,intensity:" .$intensity . "}" ;
			$updating = mysqli_query($con , "UPDATE poles_info SET done = 'yes' ");
			}


			else if ($query_count == 0 )

			{
	$arr_data = json_decode($data_recieved_santizied, true); // store the json data unto a array
	foreach($arr_data as $rows){ // looping over the data
		$line1volt = $rows['v1']; 
		$line2volt = $rows['v2'];
		$line3volt = $rows['v3'];
		$temperature = $rows['temp'];
		$battery = $rows['B'];
		$solar_cell = $rows['sc'];
		$led_sensor = $rows['ls'];


		$id = $rows['pn']; // the recorded ID of the target pole

		// the first query .... storing the recieved data

		$storing_data = mysqli_query($con , " UPDATE poles_info  SET line1volt = '$line1volt' , line2volt = '$line2volt' , line3volt = '$line3volt' , temperature = '$temperature' , battery = $battery , solar_cell = $solar_cell , led_sensor = $led_sensor where id = '$id'");	


		// here we only store the data , and doesn't  

		}//end foreach
			echo "done" ;
			$updating = mysqli_query($con , "UPDATE poles_info SET done = 'yes' ");			}


		else //  the following condition will run a control query for a single pole

		{

	$arr_data = json_decode($data_recieved_santizied, true); // store the json data unto a array
	foreach($arr_data as $rows){ // looping over the data
		$line1volt = $rows['v1']; 
		$line2volt = $rows['v2'];
		$line3volt = $rows['v3'];
		$temperature = $rows['temp'];
		$battery = $rows['B'];
		$solar_cell = $rows['sc'];
		$led_sensor = $rows['ls'];


		$id = $rows['pn']; // the recorded ID of the target pole

		// the first query .... storing the recieved data

		$storing_data = mysqli_query($con , " UPDATE poles_info  SET line1volt = '$line1volt' , line2volt = '$line2volt' , line3volt = '$line3volt' , temperature = '$temperature' , battery = $battery , solar_cell = $solar_cell , led_sensor = $led_sensor where id = '$id'");	


		// responding to the request ... sent the data according to the recived ID

		$send_to_arduuino = mysqli_query($con , "SELECT poles_number , intensity FROM poles_info WHERE done='no'");


		// the second query .... updating the status of data from pending excution to done


		
		$json_arr = array() ; //Store the selected data into array for further encoding it to JSON

		while ($row = mysqli_fetch_assoc($send_to_arduuino))
		{
			$json_arr = $row ; 
		}
		$data = json_encode($json_arr); // endoding thr array to json
		$data = str_replace('"', '', $data);


	}//end foreach
	echo "d#" . $data;
	$update_query = mysqli_query($con , " UPDATE poles_info SET done = 'yes' ");



			}
 	

?>