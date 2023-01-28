<?php

class Private_messaging_system {
    private $conn;

    public function __construct($server, $user, $password, $database) {
        $this->conn = new mysqli($server, $user, $password, $database);

        if ($this->conn->connect_error) {
            die("Mysql was unable to connect to a database using provided information!");
        }
    }

    public function send_message($to, $message, $subject, $respond = 0) {
        $from = $_SESSION['user_id']; // ID of a user sending a message

        $message = $this->_validate_message($message); // validate message to see if it safe, to be passed to the database

        if ($respond == 0) {
            $query = "INSERT INTO messages (FromUser, ToUser, subject, message) VALUES(?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("iiss", $from, $to, $subject, $message);
        } else {
            $query = "INSERT INTO messages (FromUser, ToUser, subject, message, respond) VALUES(?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("iissi", $from, $to, $subject, $message, $respond);
        }
        if ($this->validate_message($message)) {
            $stmt->execute();
            // uncomment this function out if you want to email a user of a new message
            //$this->_email_user_of_new_message($to,$from,$subject);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_number_of_unread_messages() {
        $id = $_SESSION['user_id'];
        $query = "SELECT COUNT(opened) AS unread FROM messages WHERE ToUser = ? AND respond = 0 AND opened = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all();
    }

    public function get_all_messages() {
        $id = $_SESSION['user_id'];
        $query = "SELECT * FROM messages WHERE (ToUser = ? OR FromUser = ?) AND respond = 0 AND (sender_delete != 'n' OR receiver_delete != 'n')";
$stmt = $this->conn->prepare($query);
$stmt->bind_param("ii", $id, $id);
$stmt->execute();
$result = $stmt->get_result();
return $result->fetch_all();
}
public function delete_message($message_id) {
$query = "UPDATE messages SET sender_delete = 'y' WHERE id = ? AND FromUser = ".$_SESSION['user_id'];
$stmt = $this->conn->prepare($query);
$stmt->bind_param("i", $message_id);
$stmt->execute();
$query = "UPDATE messages SET receiver_delete = 'y' WHERE id = ? AND ToUser = ".$_SESSION['user_id'];
$stmt = $this->conn->prepare($query);
$stmt->bind_param("i", $message_id);
$stmt->execute();
}
public function display_messages() {
$messages = $this->get_all_messages();
if (!empty($messages)) {
echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>Subject</th>';
echo '<th>From</th>';
echo '<th>To</th>';
echo '<th>Message</th>';
echo '<th>Actions</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($messages as $message) {
echo '<tr>';
echo '<td>' . $message['subject'] . '</td>';
echo '<td>' . $this->get_username_by_id($message['FromUser']) . '</td>';
echo '<td>' . $this->get_usernameby_id($message['ToUser']) . '</td>';
echo '<td>' . $message['message'] . '</td>';
echo '<td><a href="private_messaging_system.php?action=delete&id=' . $message['id'] . '">Delete</a></td>';
echo '</tr>';
}
echo '</tbody>';
echo '</table>';
} else {
echo '<p>You have no messages.</p>';
}
}

public function get_username_by_id($id) {
$query = "SELECT username FROM users WHERE id = ?";
$stmt = $this->conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
return $data['username'];
}

}

$pms = new Private_messaging_system("localhost", "root", "", "market");

// send message example
$pms->send_message($to_user_id, $message, $subject, $respond);

// get unread message count example
$unread_count = $pms->get_number_of_unread_messages();

// get all messages example
$all_messages = $pms->get_all_messages();

// delete message example
$pms->delete_message($message_id);

// display messages example
$pms->display_messages();

?>

<!DOCTYPE html>
<html>
<head>
<title>Private Messaging System</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">Private Messaging System</h1>
        <div class="row">
            <div class="col-md-4">
                <form action="private_messaging_system.php" method="post">
                    <div class="form-group">
                        <label for="to">To:</label>
                        <select class="form-control" id="to" name="to">
                            <?php
                                $users = $this->get_all_users();
                                foreach ($users as $user) {
                                    if ($user['id'] != $id) {
                                        echo '<option value="' . $user['id'] . '">' . $user['username'] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="respond" name="respond" value="1">
                        <label for="respond">Reply</label>
                        </div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Send">
</div>
</form>
</div>
</div>
</div>

</body>
</html>
<?php

$pms = new Private_messaging_system("localhost", "root", "", "market");

if (isset($_POST['to']) && isset($_POST['message']) && isset($_POST['subject'])) {
    $to = $_POST['to'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $respond = 0;
    if (isset($_POST['respond'])) {
        $respond = 1;
    }

    if ($pms->send_message($to, $message, $subject, $respond)) {
        echo "Message sent successfully!";
    } else {
        echo "Error sending message!";
    }
}

if (isset($_GET['delete_message_id'])) {
    $pms->delete_message($_GET['delete_message_id']);
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Inbox</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>From</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $messages = $pms->get_all_messages();
                    if (!empty($messages)) {
                        foreach ($messages as $message) {
                        echo '<tr>';
                        echo '<td>' . $message['subject'] . '</td>';
                        echo '<td>' . $this->get_username_by_id($message['FromUser']) . '</td>';
                        echo '<td>' . $this->get_username_by_id($message['ToUser']) . '</td>';
                        echo '<td>' . $message['message'] . '</td>';
                        echo '<td>';
                        echo '<a href="?delete=' . $message['id'] . '" class="btn btn-danger">Delete</a>';
                        echo '</td>';
                        echo '</tr>';
                        }
                        } else {
                        echo '<tr>';
                        echo '<td colspan="5">You have no messages.</td>';
                        echo '</tr>';
                        }
                        ?>
                        </tbody>
                        </table>
                        </div>
                        </body>
                        
                        </html>
                        <?php
                        $pms->close_conn();
                        
                        function get_username_by_id($id) {
                            // Function to get username by ID
                        }
                        
                        if (isset($_GET['delete'])) {
                            $pms->delete_message($_GET['delete']);
                            header("Location: private_messaging_system.php");
                        }
                        
                        ?>