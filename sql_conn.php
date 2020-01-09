<?php
//querying mysql
$server="localhost";
$user="root";
$pass="";
$db="db_project";

$conn=new mysqli($server,$user,$pass,$db);

if($conn->connect_error)
{
    die("Connection failed");
}
?>
