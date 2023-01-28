<?php
session_start();
include("DBConnection.php");
$FromUser = $_POST["FromUser"];
$ToUser = $_POST["ToUser"];
$Message = $_POST["Message"];
$output="";
$sql = "INSERT INTO messages (FromUser, ToUser, Message) VALUES ('$FromUser','$ToUser', '$Message')";
if($connect -> query($sql))
{
    $output.="";
}
else 
{
    $output.="Error. Please Try Again.";
}
echo $output;
?>