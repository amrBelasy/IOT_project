<?php
$dsn="mysql:host=localhost;dbname=Project";
$user="root";
$pass="";

try {
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Failed To Connect To DATABASE".$e->getMessage();
}

?>