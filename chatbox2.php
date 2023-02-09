<?php
session_start();
include("DBConnection.php");
include("links.php");
$connect = mysqli_connect("localhost", "root", "", "market");

if (isset($_SESSION["User"])) {
    $query = "SELECT * FROM users WHERE Id = '" . $_SESSION["Id"] . "'";
    $users = mysqli_query($connect, $query) or die("Failed to query database: " . mysqli_error($connect));
    $user = mysqli_fetch_assoc($users);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Chatbox</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION["User"])) : ?>
                    <p>Hi <?php echo $user["User"]; ?> </p>
                    <input type="text" id="FromUser" value="<?php echo $user["Id"]; ?>" hidden />
                    <p> Send message to:</p>
                    <ul>
                        <?php
                        $query = "SELECT * FROM users";
                        $msgs = mysqli_query($connect, $query) or die("Failed to query database: " . mysqli_error($connect));
                        while ($msg = mysqli_fetch_assoc($msgs)) {
                            echo "<li><a href='?ToUser=" . $msg["Id"] . "'>" . $msg["User"] . "</a></li>";
                        }
                        ?>
                    </ul>
                    <a href="chat-index-page.php"><---Back </a>
                        <?php endif; ?>
            </div>
            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <h4><?php
                            if (isset($_GET["ToUser"])) {
                                $userName = mysqli_query($connect, "SELECT * FROM users WHERE Id = '" . $_GET["ToUser"] . "'")
                                    or die("Failed to querry database" . mysqli_error($mysql));
                                $uName = mysqli_fetch_assoc($userName);
                                echo '<input type="text" value=' . $_GET["ToUser"] . ' id="ToUser" hidden/>';
                                echo $uName["User"];
                            } else {
                                $userName = mysqli_query($connect, "SELECT * FROM users")
                                    or die("Failed to querry database" . mysqli_error($mysql));
                                $uName = mysqli_fetch_assoc($userName);
                                $_SESSION["ToUser"] = $uName["Id"];
                                echo '<input type="text" value=' . $_SESSION["ToUser"] . ' id="ToUser" hidden/>';
                                echo $uName["User"];
                            }
                            ?>
                        </h4>
                    </div>
                    <div class="modal-body" id="msgBody" style="height:400px; overflow-y:scroll; overflow-x:hidden; border:1px solid black;">
                        <?php
                        if (isset($_GET["ToUser"])) {
                            $toUser = $_GET['ToUser'] == "";
                            $chats = mysqli_query($connect, "SELECT * FROM messages WHERE (FromUser = '" . $_SESSION["userId"] . "' AND ToUser = '" . $_GET["ToUser"] . "') OR (FromUser = '" . $_GET["ToUser"] . "' AND 
                            ToUser = '" . $_GET["ToUser"] . "') OR (FromUser = '" . $_GET["ToUser"] . "' AND ToUser = '" . $_SESSION["userId"] . "')")
                                or die("Failed to query database" . mysqli_error($mysql));
                            $chat = mysqli_fetch_assoc($chats);
                        } else {
                            $toUser = $_SESSION['ToUser'];
                            $chats = mysqli_query($connect, "SELECT * FROM messages WHERE (FromUser = '" . $_SESSION["userId"] . "' AND ToUser = '" . $_SESSION["ToUser"] . "') OR (FromUser = '" . $_SESSION["ToUser"] . "' AND 
                            ToUser = '" . $_SESSION["ToUser"] . "') OR (FromUser = '" . $_SESSION["ToUser"] . "' AND ToUser = '" . $_SESSION["userId"] . "')")
                                or die("Failed to query database" . mysqli_error($mysql));
                        }
                        while ($chat = mysqli_fetch_assoc($chats)) {
                            if ($chat["FromUser"] == $_SESSION["userId"])
                               
                               echo $chats["Message"];
                            
                              
                            
                            else
                                echo "<div style = 'text-align:left;'>
                               <p style= 'background-color:yellow; word-wrap:break-word; display:inline-block; padding:5px; border-radius:10px; max width:70%;'>
                               " . $chat["Message"] . "
                               </p>
                               </div>
                               ";
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <textarea id="Message" class="form-control" style="height: 200px; width: 80%;"></textarea>
                        <button id="Submit" type="submit" class="btn btn-primary" style="    
                    height: 5%;
                    position: absolute;
                    margin-top: 152px;
                    width: 15%;">Send</button>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {

        $("#Submit").click(function() {
            $.ajax({
                type: "POST",
                url: "insertMessage.php",
                data: {
                    FromUser: $("#FromUser").val(),
                    ToUser: $("#ToUser").val(),
                    Message: $("#Message").val()
                },
                dataType: "text",
                success: function(data) {
                    alert(data)
                    $("#Message").val("");
                  
                },
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
            
            console.log($("#Message").val())
        });
    });
</script>

</html>