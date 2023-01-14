<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome...</title>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="password-strength-indicator.css">
</head>
<body>
<div class="container" style="position: absolute;
    margin-top: -800px;">
        <h1>REUP MARKET</h1>

    </div>
    <div class="container" style="">
     

     <header></header>
     <form style="">
     
        
<!--<div class="form">-->
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
</br>
<p><a href="dashboard.php">Dashboard</a></p>
<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}




?>
<a href="login.php">Logout</a>


</div>
</div>
</form>
</body>
</html>