<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 0.1px solid #d9d9d9;
  text-align: left;
  float: left;
    padding-right: 30px;
    padding-left: 18px;
    padding-top: 15px;
    padding-bottom: 15px;
    width: 320px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
                    <!----- select queries fro DB that match our targeted voltages ------>

<?php 
    $alarm_sound = "alarm.wav"; 
    $con = mysqli_connect("localhost", "root", "", "project"); //Connection variable

    $check_datebase_query = mysqli_query($con, "SELECT * from `poles_info` WHERE line1volt > 240 OR line1volt < 190 OR line2volt > 240 OR line2volt < 190 OR line3volt > 240 OR line3volt < 190 order by `last_change` DESC");
    $number_of_query = mysqli_num_rows($check_datebase_query);

    if($number_of_query > 0) {

       // echo "<audio autoplay='true' src = 'assets/audio/alarm.wav' type= 'audio/wav' ></audio>" ;
        echo  '<span style="font-size:20px;margin-left:120px;padding-bottom:50px;">'.'there are '. $number_of_query .' poles that have problem , more details see below table' . '</span>';
             echo '
                <table style="margin-top:30px;">
                  <tr style="background-color:#868e96;color:#fff;">
                    <th>Pole Number</th>
                    <th>problem</th>
                    <th>Time</th>
                  </tr>
                </table> ';
             ?>

    <?php
    foreach ($check_datebase_query as $i){

        if($i['line1volt'] > 240)
            {   
                $problem = "line 1 is :  " . $i['line1volt'] . " volt";
                $date = date('F j, Y, g:i a',strtotime($i['last_change']));
                $num = $i['poles_number'];

        echo 

            "<table>".
             " <tr>".
                "<th>$num</th>".
                "<th style='color:#D70F0F;'>$problem <img src='assets/images/arrow-up.png' style='width:15px;height:15px;margin-left:80px;' ></th>".
                "<th>$date</th>".
              "</tr>".
            "</table> ";
                }
                 if ($i['line1volt'] < 190)
                {
                $problem = "line 1 is :  " . $i['line1volt'] . " volt";
                $date = date('F j, Y, g:i a',strtotime($i['last_change']));
                $num = $i['poles_number'];
         echo
               "<table>".
             " <tr>".
                "<th>$num</th>".
                "<th style='color:#0D8D1B;'>$problem <img src='assets/images/arrow-down.png' style='width:15px;height:15px;margin-left:80px;' ></th>".
                "<th>$date</th>".
              "</tr>".
            "</table> ";
                  }
                 if ($i['line2volt'] > 240)
                {
               $problem = "line 2 is :  " . $i['line2volt'] . " volt";
                $date = date('F j, Y, g:i a',strtotime($i['last_change']));
                $num = $i['poles_number'];
         echo
               "<table>".
             " <tr>".
                "<th>$num</th>".
                "<th style='color:#D70F0F;'>$problem <img src='assets/images/arrow-up.png' style='width:15px;height:15px;margin-left:80px;' ></th>".
                "<th>$date</th>".
              "</tr>".
            "</table> ";
                }
                 if ($i['line2volt'] < 190)
                {
                $problem = "line 2 is :  " . $i['line2volt'] . " volt";
                $date = date('F j, Y, g:i a',strtotime($i['last_change']));
                $num = $i['poles_number'];
         echo
               "<table>".
             " <tr>".
                "<th>$num</th>".
                "<th style='color:#0D8D1B;'>$problem <img src='assets/images/arrow-down.png' style='width:15px;height:15px;margin-left:80px;' ></th>".
                "<th>$date</th>".
              "</tr>".
            "</table> ";
                }
                 if ($i['line3volt'] > 240)
                {
                $problem = "line 3 is :  " . $i['line3volt'] . " volt";
                $date = date('F j, Y, g:i a',strtotime($i['last_change']));
                $num = $i['poles_number'];

         echo
               "<table>".
             " <tr>".
                "<th>$num</th>".
                "<th style='color:#D70F0F;'>$problem <img src='assets/images/arrow-up.png' style='width:15px;height:15px;margin-left:80px;' ></th>".
                "<th>$date</th>".
              "</tr>".
            "</table> ";
                                      
                }
                 if ($i['line3volt'] < 190)
                {
                $problem = "line 3 is :  " . $i['line3volt'] . " volt";
                $date = date('F j, Y, g:i a',strtotime($i['last_change']));
                $num = $i['poles_number'];
         echo
               "<table>".
             " <tr>".
                "<th>$num</th>".
                "<th style='color:#0D8D1B;'>$problem <img src='assets/images/arrow-down.png' style='width:15px;height:15px;margin-left:80px;' ></th>".
                "<th>$date</th>".
              "</tr>".
            "</table> ";
                }

            }
            }
         else {
            echo "All poles is well right now , but always keep looking here ! ";
         }



?>