<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("localhost","id19771737_root","8)UQtUYw7nO(=3?Y","id19771737_icarus");
// Check connection
if (mysqli_connect_errno())
  {
     echo'<p style="text-align:center; color:red;">You have failed to connect to the database please check your credentials.</p>';
  }else{
        echo '
        <p style="text-align:center; color:red;">You have connected to the database successfully.</p>
        
        ';
  }
?>