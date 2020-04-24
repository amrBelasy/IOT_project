<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="lib/swiper/css/swiper.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body style="overflow-y:hidden;">
<div id="map" style = "height:50% ; margin:0"></div>
        <script>

            function initMap() {
                let map = new google.maps.Map(document.getElementById("map"), {
                    center: {lat:30.586074, lng: 31.523477},
                    zoom: 18
                });
                new google.maps.Marker({
                    map: map,
                    position: {lat: 30.585917, lng: 31.521685}
                    
                });
  

                new google.maps.Marker({
                    map: map,
                    position: {lat: 30.586425, lng: 31.522372}
                });
                new google.maps.Marker({
                    map: map,
                    position: {lat: 30.585419, lng: 31.521310}
                });
                new google.maps.Marker({
                    map: map,
                    position: {lat: 30.585428, lng: 31.523005}
                });
            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD060HFRs8E27SDasFfhGqMiD5cKrzau74&callback=initMap"></script>
                                                <div class="card" style="margin-top:20px;">
                                                    <div class="card-block">
                                                        <div class="swiper-container">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                  <a href="control.php"><img class="img-fluid width-100" src="assets/images/str1.jpg" alt="Card image cap"></a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-fluid width-100" src="assets/images/str1.jpg" alt="Card image cap">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-fluid width-100" src="assets/images/str2.jpg" alt="Card image cap">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-fluid width-100" src="assets/images/str3.jpg" alt="Card image cap">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-fluid width-100" src="assets/images/str4.jpg" alt="Card image cap">
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <img class="img-fluid width-100" src="assets/images/str2.jpg" alt="Card image cap">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<script type="text/javascript" src="lib/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="lib/swiper/js/swiper.min.js"></script>
<script type="text/javascript" src="assets/js/swiper-custom.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
    <!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
</body>
</html>
