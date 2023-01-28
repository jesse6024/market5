<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "market");

// Retrieve messages from the database
$query = "SELECT * FROM messages ORDER BY id DESC";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Private Chat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="chat-container">
        <div class="header">
            Welcome, <?php echo $_SESSION['username']; ?>
            <a href="logout.php">Logout</a>
        </div>
        <div class="messages">
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='message'><strong>" . $row['username'] . ":</strong> " . $row['message'] . "</div>";
                }
            ?>
        </div>
        <div class="input-container">
            <form>
                <input type="text" id="message-input" placeholder="Enter your message...">
                <button id="send-button">Send</button>
                <div id="message-container"></div>
                <script>
                var messageInput = document.getElementById("message-input");
                var sendButton = document.getElementById("send-button");
                var messageContainer = document.getElementById("message-container");

            sendButton.addEventListener("click", function() {
                // Get the message from the input
                var message = messageInput.value;
                
                // Send the message to the server using AJAX
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "send-message.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Clear the message input
                            messageInput.value = "";
                            
                            // Display the message in the message container
                            var messageNode = document.createElement("div");
                            messageNode.classList.add("message");
                            messageNode.innerHTML = "<b>" + response.username + "</b>: " + response.message;
messageContainer.appendChild(messageNode);
} else {
alert("Error: " + response.error);
}
}
};
xhr.send("uName=" + "<?php echo $uName; ?>" + "&message=" + message);
});
</script>

</form>
</div>
  </div>
</body>
</html>
<?php
// Close the connection
mysqli_close($conn);
?>
