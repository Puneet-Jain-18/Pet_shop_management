
<?php
$host="localhost";
$user="root";
$pass="";

$conn=new mysqli($host,$user,$pass);

if($conn->connect_error)
{
    die ("Unsucessful");
}
echo "Connection made";
$query="create database db_project";
if($conn->query($query)==TRUE)
{
    echo ("Query Executed Sucessfully");
}
else
{
    echo("Error in the query");
}