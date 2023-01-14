<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome...</title>
<link rel="stylesheet" href="style2.css" />
</head>
<body>
<div class="login-banner" >
<div class="login-head-container">
<div class="header-title" style="text-align: center;"><h1>MARKET</h1>
</div>
</div>
<div class="form" style= "width: 300px;margin: 0 auto;border: solid 1px black;text-align: center;margin-top: 15%;overflow: hidden;">
<h1>Welcome</h1>  
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p></p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>