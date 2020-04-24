<?php 
$con = mysqli_connect("localhost", "root", "", "project");//DataBase Connection

	if (isset($_GET['Data'])) // hold the request coming from arduion
	{
	$data_recieved = $_GET['Data']; 
	$data_recieved_santizied = str_replace("'" , '"' , $data_recieved); // the request coming with sigle quote , here we replace single quote with double to be a valid JSON format
	}

			$query5 = mysqli_query($con , "SELECT * FROM poles_info WHERE done = 'no' ");

			$queries = mysqli_num_rows($query5);

			if($queries == 5 )
			{

			$query700 = mysqli_query($con , "SELECT * FROM poles_info  WHERE id = 1 ");
			$query500 = mysqli_fetch_array($query700);
			$ggg = $query500['intensity'];
		//	$data1 = "000";
			echo "d#{pole_number:0,intensity:" .$ggg . "}" ;

			$updating = mysqli_query($con , "UPDATE poles_info SET done = 'yes' ");

			}


			else if ($queries == 0 )

			{
				echo "done";
			}


		else

		{

	$arr_data = json_decode($data_recieved_santizied, true); // store the json data unto a array
	foreach($arr_data as $rows){ // looping over the data
		$line1volt = $rows['line1volt']; 
		$line2volt = $rows['line2volt'];
		$line3volt = $rows['line3volt'];
		$temperature = $rows['temperature'];


		$id = $rows['pole_number']; // the recorded ID of the target pole

		// the first query .... storing the recieved data

		$storing_data = mysqli_query($con , " UPDATE poles_info  SET line1volt = '$line1volt' , line2volt = '$line2volt' , line3volt = '$line3volt' , temperature = '$temperature' where id = '$id'");	


		// responding to the request ... sent the data according to the recived ID

		$send_to_arduuino = mysqli_query($con , "SELECT poles_number , intensity FROM poles_info WHERE done='no' ");


		// the second query .... updating the status of data from pending excution to done

		$update_query = mysqli_query($con , " UPDATE poles_info SET done = 'yes' ");

		
		$json_arr = array() ; //Store the selected data into array for further encoding it to JSON

		while ($row = mysqli_fetch_assoc($send_to_arduuino))
		{
			$json_arr = $row ; 
		}
		$data = json_encode($json_arr); // endoding thr array to json
		$data = str_replace('"', '', $data);



		

	}

	echo "d#" . $data;

			}

	

?>