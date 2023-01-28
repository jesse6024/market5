<?
include("DBConnection.php");
$FromUser = $_POST["FromUser"];
$ToUser = $_POST["ToUser"];
$output="";
$chats = mysqli_query($connect, "SELECT * FROM messages where (FromUser = `".$FromUser."` AND ToUser = `".$Touser."`) 
OR (FromUser = `".$ToUser."` AND Touser = `".$FromUser."`) ") or die ("Failed to query database".mysqli_error());
while($chat = mysqli_fetch_assoc($chats))
{
    if($chat["FromUser"] == $_SESSION["userID"])
    $output .= "<div style=`text-align:right;`>
    <p style=`background-color:lightblue: word-wrap:break-wordl display:inline-block; padding:5px; border-radius:10px; max width:70%;`>
    ".$chat["Message"]."
    </p>
    </div>";
    else $output.="<div style=`text-align:left;`>
    <p style=`background-color:yellow; word-wrap:break-word; display:inline-block; padding:5px border-radius:10px;
    max width: 70%;`>
    ".$chat["Message"]."
    </p>
    </div";
}

echo $output;


?>