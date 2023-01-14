<?php 
session_start();
//include('auth.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Homepage - Secured Page</title>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="password-strength-indicator.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="    
       position: absolute;
    top: 2%;
    width: 98%;
    height: 20%;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);">
  

        <h1>REUP MARKET</h1>
        <!--<h5>Dashboard</h5>-->
        <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashboard.php">REUP MARKET</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="landing_page.php">Secured Page</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
</nav>
  
</div>
<header></header>
 <div class="" style= " 
   border: none;
    width: 97%;
    margin: 0 auto;
    text-align: center;
    margin-top: 15%;
    overflow: hidden;
    position: absolute;
    height: 60%;
    top: 1%;
    background: #fff;
    padding: 20px 30px;
    border-radius: 5px;
    box-shadow: 0 0 15px rgb(0 0 0 / 20%);
">
<!--<h2>DASHBOARD</h2>--> 
<div class="form" style="border:none; position:absolute; top:-32%;">
<p>Profile</p>
<img src="default-profile-pic.jfif" ><br>
<?php echo "Username: " . $_SESSION["username"] . "<br>"; ?>
<?php echo "Date Joined: " . $_SESSION["dateJoined"] . "<br>"; ?>
<?php echo "Account Role: " . $_SESSION["account_role"] . "<br>"; ?>
<?php echo "Trust Level: " . $_SESSION["trust_level"] . "<br>"; ?>
<p>This is another secured page.</p>
<a href="landing_page.php">Landing Page</a>
<a href="logout.php">Logout</a>

</div>
</body>
</html>