<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'market');
// include("DBConnection.php");

$FromUser = $_POST["FromUser"];
$ToUser = $_POST["ToUser"];
$Message = $_POST["Message"];
$output="";
$sql = "INSERT INTO messages (FromUser, ToUser, Message) VALUES ('$FromUser','$ToUser', '$Message')";

$results = mysqli_query($db, $sql);

// if($connect -> query($sql))
// {
//     $output="";
// }
// else 
// {
//     $output="Error. Please Try Again.";
// }
// echo $output;
?>