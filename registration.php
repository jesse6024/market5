
<?php 
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //$confirmPassword = $_POST['confirmPassword'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        //$confirmPassword_hash = password_hash($confirmPassword, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM register WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The username is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO register(username,password) VALUES (:username,:password_hash");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            //$query->bindParam("confirmPassword_hash ", $confirmPassword_hash, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '\033[K';
                echo '<p class="success">Your registration was successful!</p>';
                
                
            } else {
                echo '<p class="error">Something went wrong!</p>';
            }
        }
    }
?>

