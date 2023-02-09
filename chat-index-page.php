<?php
session_start();
include("DBConnection.php");
include("links.php");
$connect = mysqli_connect("localhost", "root", "", "market");
if(isset($_GET["userId"]))
{
    $_SESSION["userId"] = $_GET["userId"];
    $_SESSION["toUser"] = $_GET["toUser"];
    header("location: chatbox2.php");
}
?>

<!DOCTYPE html>
<head>
    <title>

    </title>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Please Select Your Account</h4>
               </div>
               <div class="modal-body">
                <ol>
                <?php
                $users = mysqli_query($connect, "SELECT * FROM users") or die ("Failed to query database".mysqli_error($mysql));
                while($user = mysqli_fetch_assoc($users))
                {
                    echo '<li style="list-style:none;"><a href="chat-index-page.php?userId='.$user["Id"].'&toUser='.$user["User"].'">'.$user["User"].'</a></li> ';
                }
                
                ?>
                </ol>
                <a href="registerUser.php" style="float:right;">Register here.</a>
               </div>
            </div>
        </div>
    </div>
</body>
</html>