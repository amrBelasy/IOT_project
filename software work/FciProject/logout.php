<?php 
session_start();
session_destroy();
header("Location: handlers/login_handler/login.php")
 ?>