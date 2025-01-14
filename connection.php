<?php

$host="localhost";
$user="root";
$password="";
$db="gym";

session_start();


$conn=mysqli_connect($host,$user,$password,$db);

if(mysqli_connect_error())
{
    echo"cannot connect";
}

?>