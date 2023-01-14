<<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style2.css" />
</head>
<body>
<div class="login-banner" style="">
<div class="login-head-container" style="">
<div class="header-title" style="text-align: center;">
<h1>MARKET</h1></div></div>
<div class="form-registration">
<div class="form">
<h1>Registration</h1>
<div
<?php if (isset($name_error)): ?>
    class="form_error"
    <?php endif?>
    >
    <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>
    >     
         <?php if(isset($name_error)):?>
            <span><?php '<br> echo $name_error;'?></span>
            <?php endif?>
         </div>
         <div
         <?php if(isset($name_error)):?>
            class="form_error"
            <?php endif ?>
         >

         <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
         <?php if (isset ($email_error)):?>
            <span><?php echo $email_error; ?></span>
            <?php endif ?>
         </div>
         <div> 
            <input type="password" name="password placeholder="Password value="">
         
		 </body>
		 </html>