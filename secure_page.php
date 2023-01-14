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
<div class="container" style="        
       position: absolute;
    /* margin-top: -836px; */
    /* width: 100%; *
        margin-left: -31px;
        
">
<h1>REUP MARKET</h1>
    </div>
    <div class="container" style="   
    position: absolute;
    /* margin-top: -836px; */
    /* width: 100%; */
    margin-left: -31px;
    background: #fff;
    padding: 20px 30px;
    width: 420px;
    top: 310px;
    /* right: 6px; */
    margin-left: 9px;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);
    
    ">
     

     <header></header>
     <form style="">
     
        
<!--<div class="form">-->
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
</br>
<a href="homepage.php">Home</a>
<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
/*
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



*/
?>
<p><a href="login.php">Logout</a></p>


</form>
</div>
</div>

</body>
</html>