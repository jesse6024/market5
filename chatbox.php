<?php
session_start();

include("DBConnection.php");
$connect = mysqli_connect("localhost", "root", "", "market");

if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}

echo $_SESSION['toUser'];

$toUser = isset($_SESSION['toUser']) ? mysqli_real_escape_string($connect, $_SESSION['toUser']) : die('toUser is not set');

if (!isset($_SESSION['toUser'])) {
    header("Location: chat-index-page.php");
    exit();
}
$toUser = mysqli_real_escape_string($connect, $_SESSION['toUser']);

$users = mysqli_query($connect, "SELECT * FROM users WHERE Id = '" . $_SESSION["userId"] . "'")
    or die("Failed to query database" . mysqli_error($connect));

while ($user = mysqli_fetch_assoc($users)) {
    $_SESSION["Id"] = $user["Id"];
    $_SESSION["User"] = $user["User"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" />
    <title>Messages</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <p>Hi, <?php echo $_SESSION["User"]; ?></p>
                <p>Send message to:</p>
                <ul style="list-style-type: none;">
                    <?php
                    $msgs = mysqli_query($connect, "SELECT * FROM users")
                        or die("Failed to query database" . mysqli_error($connect));
                    while ($msg = mysqli_fetch_assoc($msgs)) {
                        echo '<li><a href="chatbox.php?toUser=' . $msg["Id"] . '">' . $msg["User"] . '</a></li>';
                    }
                    ?>
                </ul>
                <a href="chat-index-page.php"><-- Back</a>
            </div>
            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>
                                <?php
                                if ($toUser) {
                                    $userName = mysqli_query($connect, "SELECT * FROM users WHERE Id = '$toUser' ")
                                        or die("Failed to query database" . mysqli_error($connect));
                                    $uName = mysqli_fetch_assoc($userName);
                                    echo '<input type="text" value=' . $toUser . ' id="toUser" hidden />';
                                    echo $uName["User"];
                                } else {
                                    $userName = mysqli_query($connect, "SELECT * FROM users LIMIT 1")
                                        or die("Failed to query database" . mysqli_error($connect));
                                    $uName = mysqli_fetch_assoc($userName);
                                    echo '<input type="text" value=' . $uName["Id"] . ' id="toUser" hidden />';
                                    echo $uName["User"];
}
?>

</h4>
<div class="modal-body">
<p>
<?php
                             //query the database to get all messages between the current user and the selected user
                              $messages = mysqli_query($connect, "SELECT * FROM messages WHERE (fromUser = '" . $_SESSION["Id"] . "' AND toUser = '" . $_SESSION["toUser"] . "') OR (fromUser = '" . $_SESSION["toUser"] . "' AND toUser = '" . $_SESSION["Id"] . "')")
                              or die("Failed to query database" . mysqli_error($connect));
                              //display all messages
                             while ($message = mysqli_fetch_assoc($messages)) {
                             echo $message["fromUser"] . ": " . $message["message"] . "<br>";
                                                              }
                                                              ?>
</p>
</div>
</div>
</div>
</div>
</div>
</div>

                        </body>
                        </html>