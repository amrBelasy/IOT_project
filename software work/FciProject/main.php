        <?php
        include "header.php";
        include "config/config.php";
        include "handlers/display_data_on_Website/ConnectToJson.php";
        ?>
        <html>
        <head>
        <meta charset="utf-8">
        <script src="jquery/jquery-3.3.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        </head>
        <body>
        <div class="container content mt-5">
        <div class="row justify-content-around">
        <div class="col-md-2 col-sm-2 align-items-center item" id="1">
        <img src="layout/images/pole.png" alt="">  
        <form  method="post">
        <input type="hidden"  id="pole_id_1"  value="1">
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V1</span><input type="text" disabled class="value" value="20" id="volt1-0"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V2</span><input type="text" disabled class="value" value="20" id="volt2-0"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V3</span><input type="text" disabled class="value" value="20" id="volt3-0"></div> 
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">Now</span><input type="text" disabled class="value" value="20" id="now-0"></div>
        <input class="lightrange" type="range" id="pole_intensity_1" name="light_range" min="0" max="255" step="5" onchange='document.getElementById("now-0").value = this.value'/>
        <input type="button" value="Apply Changes" class="apply_button" id="apply_1">
        </form>
        </div>
        <div class="col-md-2 col-sm-2 align-items-center item" id="2">
        <img src="layout/images/pole.png" alt="">     
        <form method="post"> 
        <input type="hidden"  id="pole_id_2" value="2">
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V1</span><input type="text" disabled class="value" value="20" id="volt1-1"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V2</span><input type="text" disabled class="value" value="20" id="volt2-1"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V3</span><input type="text" disabled class="value" value="20" id="volt3-1"></div>            <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">Now</span><input type="text" disabled class="value" value="20" id="now-1"></div>
        <input class="lightrange" type="range" id="pole_intensity_2" name="light_range" min="0" max="255" step="5" onchange='document.getElementById("now-1").value = this.value'/>
        <input type="button" value="Apply Changes" class="apply_button" id="apply_2">
        </form>
        </div>
        <div class="col-md-2 col-sm-2 align-items-center item" id="3">
        <img src="layout/images/pole.png" alt="">
        <form method="post">
        <input type="hidden"  id="pole_id_3"  value="3">
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V1</span><input type="text" disabled class="value" value="20" id="volt1-2"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V2</span><input type="text" disabled class="value" value="20" id="volt2-2"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V3</span><input type="text" disabled class="value" value="20" id="volt3-2"></div>            <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">Now</span><input type="text" disabled class="value" value="20" id="now-2"></div>
        <input class="lightrange" type="range" id="pole_intensity_3" name="light_range" min="0" max="255" step="5" onchange='document.getElementById("now-2").value = this.value'/>
        <input type="button" value="Apply Changes" class="apply_button" id="apply_3">
        </form>
        </div>
        <div class="col-md-2 col-sm-2 align-items-center item" id="4">
        <img src="layout/images/pole.png" alt="">
        <form method="post">
        <input type="hidden"  id="pole_id_4"  value="4">
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V1</span><input type="text" disabled class="value" value="20" id="volt1-3"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V2</span><input type="text" disabled class="value" value="20" id="volt2-3"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V3</span><input type="text" disabled class="value" value="20" id="volt3-3"></div>            <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">Now</span><input type="text" disabled class="value" value="20" id="now-3"></div>
        <input class="lightrange" type="range" id="pole_intensity_4" name="light_range" min="0" max="255" step="5" onchange='document.getElementById("now-3").value = this.value'/>
        <input type="button" value="Apply Changes" class="apply_button" id="apply_4">
        </form>
        </div>
        <div class="col-md-2 col-sm-2 align-items-center item" id="5">
        <img src="layout/images/pole.png" alt="">
        <form method="post">
        <input type="hidden"  id="pole_id_5"  value="5">
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V1</span><input type="text" disabled class="value" value="20" id="volt1-4"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V2</span><input type="text" disabled class="value" value="20" id="volt2-4"></div>
        <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">V3</span><input type="text" disabled class="value" value="20" id="volt3-4"></div>            <div class="volt mt-2 mb-2 align-self-center"><span class="btn-secondary">Now</span><input type="text" disabled class="value" value="20" id="now-4"></div>
        <input class="lightrange" type="range" id="pole_intensity_5" name="light_range" min="0" max="255" step="5" onchange='document.getElementById("now-4").value = this.value'/>
        <input type="button" value="Apply Changes" class="apply_button" id="apply_5">
        </form>
        </div>
        <div>

        <!-- plugg all poles at one step --->

        <form method="POST" style="margin-top: -40px;">
        <input type="hidden" id="plug_all_poles" value="0">
        <input type="button" id="plugall" value="plug all" class="apply_all_button" >
        </form>  

        <!-- unplugg all poles at one step --->

        <form method="POST">
        <input type="hidden" id="unplug_all_poles" value="00">
        <input type="button" id="unplugall" value="unplug all" class="apply_all_button">
        </form>
        </div>
        </div>
        </div>
            
            
        <script type="text/javascript">
        $.ajaxSetup(
        { cache: false 
        }
        );
        function get_data()
        {
        $.getJSON({//get the data automatically from JSON file to be displayed
        url: "js_read.json",
        success: function (jsonData, status, xhr) {
        for (var i = 0; i < jsonData.length; i++) {
        if (jsonData[i].line1volt > 0)
        {
        $("#volt1-" + i).val(jsonData[i].line1volt);
        $("#volt2-" + i).val(jsonData[i].line2volt);
        $("#volt3-" + i).val(jsonData[i].line3volt);
        //  $("#range-" + i ).val(jsonData[i].light_degree);
        }
        else
        {
        $("#volt1-" + i).val(0);
        }
        //  $("#range-" + i ).val(jsonData[i].light_degree);
        }

        }
        });    
        }
        setInterval(function(){
        get_data();
        },
        2000); // set a timer to call the function every 2 second
        </script>
        <div>
        </div>

            <!------- this script send data with AJAX to be handled and stored in DB----->
                <script>
                    $(document).ready(function() { // wait for the page to fully loaded
                     $('#apply_1').click(function() { // function to submit the first pole
                         var pole_id = $('#pole_id_1').val();
                         var pole_intensity = $('#pole_intensity_1').val(); 
                         $.ajax({
                             type:"POST",
                             url:"handlers/communication_with_poles/DBinsert.php",
                             data:{ pole_id : pole_id , pole_intensity : pole_intensity },
                             success:function(resp){
                                alert('data sent succesfully');
                             },
                             error:function(resp){
                                console.log('error in submitting');
                             }
                         });
                     });
                          $('#apply_2').click(function() {// function to submit the second pole
                         var pole_id = $('#pole_id_2').val();
                         var pole_intensity = $('#pole_intensity_2').val(); 
                         $.ajax({
                             type:"POST",
                             url:"handlers/communication_with_poles/DBinsert.php",
                             data:{ pole_id : pole_id , pole_intensity : pole_intensity },
                             success:function(resp){
                                alert('data sent succesfully');
                             },
                             error:function(resp){
                                console.log('error in submitting');
                             }
                         });
                     });      


                         $('#apply_3').click(function() { // function to submit the 3th pole
                         var pole_id = $('#pole_id_3').val();
                         var pole_intensity = $('#pole_intensity_3').val(); 
                         $.ajax({
                             type:"POST",
                             url:"handlers/communication_with_poles/DBinsert.php",
                             data:{ pole_id : pole_id , pole_intensity : pole_intensity },
                             success:function(resp){
                                alert('data sent succesfully');
                             },
                             error:function(resp){
                                console.log('error in submitting');
                             }
                         });
                     });       



                        $('#apply_4').click(function() { // function to submit the 4th pole
                         var pole_id = $('#pole_id_4').val();
                         var pole_intensity = $('#pole_intensity_4').val(); 
                         $.ajax({
                             type:"POST",
                             url:"handlers/communication_with_poles/DBinsert.php",
                             data:{ pole_id : pole_id , pole_intensity : pole_intensity },
                             success:function(resp){
                                alert('data sent succesfully');
                             },
                             error:function(resp){
                                console.log('error in submitting');
                             }
                         });
                     });         


                      $('#apply_5').click(function() { // function to submit the 5th pole
                         var pole_id = $('#pole_id_5').val();
                         var pole_intensity = $('#pole_intensity_5').val(); 
                         $.ajax({
                             type:"POST",
                             url:"handlers/communication_with_poles/DBinsert.php",
                             data:{ pole_id : pole_id , pole_intensity : pole_intensity },
                             success:function(resp){
                                alert('data sent succesfully');
                             },
                             error:function(resp){
                                console.log('error in submitting');
                             }
                         });
                     });


                          $('#plugall').click(function() { // function to plugall poles 

                         // first thing is to set all the ranges to 0

                        var input_range = document.querySelectorAll('.lightrange');
                        for(var i = 0; i <input_range.length; i++)
                        input_range[i].value = "255";

                         // send data set to the database with ajax without reload

                         var plug_all_poles = $('#plug_all_poles').val(); 
                         $.ajax({
                             type:"POST",
                             url:"handlers/communication_with_poles/DBinsert.php",
                             data:{ plug_all_poles : plug_all_poles },
                             success:function(resp){
                                alert('data sent succesfully');
                             },
                             error:function(resp){
                                console.log('error in submitting');
                             }
                         });
                     });


                         $('#unplugall').click(function() { // function to unplugall

                                // first thing is to set all the ranges to 0

                        var input_range = document.querySelectorAll('.lightrange');
                        for(var i = 0; i <input_range.length; i++)
                        input_range[i].value = "0";

                                // send data set to the database with ajax without reload

                         var unplug_all_poles = $('#unplug_all_poles').val(); 
                         $.ajax({
                             type:"POST",
                             url:"handlers/communication_with_poles/DBinsert.php",
                             data:{ unplug_all_poles : unplug_all_poles },
                             success:function(resp){
                                alert('data sent succesfully');
                             },
                             error:function(resp){
                                console.log('error in submitting');
                             }
                         });
                     });




                });

                </script>
</body>
 </html>
