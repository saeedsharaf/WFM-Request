<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wfm";


$connt =mysqli_connect($servername,$username,$password,$dbname);

//ceheck conntion 
/*
if($connt->connect_error){
    die("connection falid" .$connt->connect_error);
} else {

    echo "connection successful" ;
}
*/


?>