<?php

session_start();
include("DBConnection.php");
include("links.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "chatbox");


/*$connect = mysqli_connect("localhost", "root", "", "chatbox");*/
if(isset($_POST["uName"])){

    $sql = "INSERT INTO users (User) VALUE ('".$_POST["uName"]."')";
    if ($mysqli->query($sql)){
    
    header('Location: chat-index-page.php');
    }else{ 
    echo "Error, please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet"  href="style.css">
        <title>Chat</title>
    </head>
    <body>
    <div class="container" style="
    
    border: none;
    height: 800px;
    width: 800px;
    display: flex;
    justify-content: center;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);
    padding-top: 30px;
    margin-left: 500px;
    
    ">
    <div class="container" style="display:flex;">
        <div class="modal-content">
            <h4 class="modal-title">Register your name </h4>
        </div>
        <form action="registerUser.php" method="POST" style="    display: flex;
    margin-top: 80px;
    margin-left: -158px;">
            <br>
            <ul style="list-style:none;">
           <li> <p>Name:</p></li>
            <input type="text" name="uName" id="uName" autocomplete="off" class="form-control"></input>
            <br>
            <li><input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Ok"></input></li>
</ul>
        </form>
        </div>
</div>
</body>
</html>