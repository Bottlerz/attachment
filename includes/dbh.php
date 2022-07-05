<?php
$host="localhost";
$user="root";
$password="";
$db="products";
$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection error".mysql_connect_error());
}
?>