<?

session_start();
include("DBConnection.php");
include("link.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>chat</title>
    </head>
    <body>
        <div class="modal-dialog">
        <div class="modal-dialog">
        <div class="modal-dialog">
           <h4>Please Select Your Account</h4>
        </div>
        <div class="modal-dialog">
         <?
          
          $users=mysqli_query($connect,"SELECT * FROM users")
          or die("Failed to query database" mysqli_error());
          while($user = mysqli_fetch_assoc($users));
          {
            echo '<li><a href="chat-page.php?userId=' .$user["Id"].'"'.$user["User"].'</a></li>';}?>
         </ol>
         <a href="registerUser.php" styles="float:right;">Register here.</a>
         </div>
        </div>
        </div>
    </body>
</html>