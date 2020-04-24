    <?php 
    $con = mysqli_connect("localhost", "root", "", "project"); //Connection variable
    $check_datebase_query = mysqli_query($con, "SELECT * from `poles_info` WHERE line1volt > 240 OR line1volt < 190 OR line2volt > 240 OR line2volt < 190 OR line3volt > 240 OR line3volt < 190 order by `last_change` DESC");
    $number_of_query = mysqli_num_rows($check_datebase_query);

    if($number_of_query > 0) {

        echo "<audio autoplay='true' id='alarmsound' src = 'assets/audio/alarm.wav' type= 'audio/wav' ></audio>" ;
    }
    ?>