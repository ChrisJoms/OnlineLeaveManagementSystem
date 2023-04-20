<?php

$host="localhost";
$user="root";
$pwd="";
$dbname="simpleave";

$conn=mysqli_connect($host,$user,$pwd,$dbname);

if(!$conn){
    echo "Server not found".mysql_error();
}else{
    echo "Connected";
}


?>