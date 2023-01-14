<?php include ('process.php') ?>

<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    .error {
      color: red;
      display:inherit;
    }
</style>

<body>
<div class="" style="

">
<div class="login-head-container" style="
    

">

<div class="header-title" style="
    text-align: center;
    "><h1>MARKET</h1></div>
    </div>

</div>
<div class="form" style=" 
    width: 300px;
    margin: 0 auto;
    border: solid 1px black;
    text-align: center;
    margin-top: 15%;
    height:60%;
    overflow: hidden;
">
    <form method="post" action="registration2.php" id="register_form">
  	<h1>Register</h1>

  	<div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?> >
	  <input  style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="text" name="username" placeholder="Username" value="" id="username" required>
	  <?php if (isset($name_error)): ?>
     
	  <?php endif ?>
  	</div>
  	<div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
      <input  style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="email" name="email" placeholder="Email" id="email" value="" >
      <?php if (isset($email_error)): ?>
      	<span class="error"><?php echo $email_error; ?></span>
      <?php endif ?>
  	</div>
   

    
    <div> 
    <div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
      <input  style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="password" name="password" placeholder="Password" id="password" value="" >
      <?php if (isset($password_error)): ?>
      	<span class="error"><?php echo $password_error; ?></span>
      <?php endif ?>
  	</div>


    <div> 
    <div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
      <input  style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="password" name="confirmPassword" placeholder="Confirm Password" id="confirmPassword" value="" >
      <?php if (isset($password_error)): ?> 
      	<span class="error"><?php echo $password_error; ?></span>
      <?php endif ?>
  	</div>

    <div <?php if (isset($pin_error)): ?> class="form_error" <?php endif ?> >
      <input  style="width: 200px;
    border-radius: 2px;
    border: 1px solid #CCC;
    padding: 10px;
    color: #333;
    font-size: 14px;
    margin-top: 10px;
    text-align: center;" type="text" name="pin" placeholder="pin" id="pin" value="" >
      <?php if (isset($pin_error)): ?> 
      	<span class="error"><?php echo $pin_error; ?></span>
      <?php endif ?>
  	</div>



    <!-- <div>
  		<input type="password"  placeholder="Password" name="password">
  	</div> -->
    
    
    <script type="text/javascript">
    $('form').on('submit', function(e){
        e.preventDefault();
        var text = $('#role').find(":selected").text();
        $('input[name="option_text"]').val(text);
        $('form').submit();
    });
    </script>
<div>
<div class="custom-select" style="width:200px;">
  <select id="account_role" name="account_role" style="
    position:absolute;
    width: 10%;
    margin-left:-102px;
    border: 1px solid lightgrey;
    padding-left: 15px;
    outline: none;
    border-radius: 5px;
    font-size: 15px;
    transition: all 0.3s;
    margin-top:70px;
     ">
    <option value="Buyer">Buyer</option>
    <option value="Vendor">Vendor</option>
    </select>
    <input type='hidden' name="option_text" value=''>
   
    <div>

<button 
  type="submit" 
  name="register" 
  id="reg_btn" 
  style="
       padding: 10px 25px 8px;
    position: absolute;
    background-color: #0067ab;
    text-shadow: rgb(0 0 0 / 24%) 0 1px 0;
    font-size: 16px;
    box-shadow: rgb(255 255 255 / 24%) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    color: #fff;
    margin-top: 199px;
    cursor: pointer;
    /* margin-top: 40%; */
    margin-top: 165px;
    margin-left: 30px;
    float: left;
    display: flex;
    border-radius: 2px;
   ">
    Register
</button>
  </div>
<div>
  <a href="login.php"><button type="button" name="login" id="login_btn" style="
    padding: 10px 25px 8px;
    margin-left: 50px;
    position: absolute;
    color: #fff;
    background-color: #0067ab;
    text-shadow: rgb(0 0 0 / 24%) 0 1px 0;
    font-size: 16px;
    box-shadow: rgb(255 255 255 / 24%) 0 2px 0 0 inset, #fff 0 1px 0 0;
    border: 1px solid #0164a5;
    border-radius: 2px;
    margin-top: 165px;
    margin-left: 140;
    cursor: pointer;
    display: inline-block;
    position: absolute;
    ;">Login</button></a>

  </div>

  </body>
</html>


    
      

  </form>
   

      </body>
</html>