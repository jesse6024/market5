<?
session_start();
include("DBConnection.php");
include("links.php");
$connect = mysqli_connect("localhost", "root", "", "market");
$users = mysqli_query($connect, "SELECT * FROM users WHERE Id = '".$_SESSION["userId"]."' ")
      or die("Failed to query database".mysqli_error());

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Chatbox</title>

    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <p>Hi <?php echo $user["User"]; ?> </p>
                <input type="text" id="FromUser" value= <? echo $users["Id"]; ?> hidden />
                <p>Send message to:</p>
                <ul>
                <? 
                $users = mysqli_query($connect, "SELECT * FROM users WHERE Id = '".$_SESSION["userID"]."' ")
                or die("Failed to querry database" .mysqli_error());
                $user = mysqli_fetch_assoc($users);
                ?>
                </ul>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
    </body>
</html>