
<html>
<header>
  <title>Register</title>
  <link rel="stylesheet" href="style2.css">
  <link rel="stylesheet" href="style2.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</header>
 <body>


<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","root","","market");
// Check connection
if (mysqli_connect_errno())
  {
     echo'<p style="text-align:center; color:red;">You have failed to connect to the database please check your credentials.</p>';
  }else{
       /*
        echo
        
        '<p style="text-align:center; color:green;">You have connected to the database successfully.</p>
        
        ';*/
  }
?>
</body>
</html>