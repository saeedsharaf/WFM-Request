<?php
include 'config/login.php';
?>
<!doctype html>
<html>
<head>
	<link rel="shortcut icon" href="style/icon.png" />
    <link rel="stylesheet" href="style/login.css">
	<title>Login</title>

</head>

<body>

  
    
<div class="container">
    <form action="" method="post">
	<div calss="username"> 
            <img src="style/logo.png" width="" height="">
          
                <label> User name </label>
                <input type="text" name="user" autocomplete="off" placeholder="User name" id="name">
	</div>
    
	<div class="password">
            <label>Password </label>
            <input type="password" name="password" placeholder="Password" > 
            <!--
		<input type="checkbox" name="check" > <span class="whitecolor">Remember Me </span>
		-->
	</div>
    
	<div class="login">
		<input type="submit"  value="Login" name="submit" >
	</div>
	
        <?php echo $error ;?>
	
    </form>
	
</div>
<div class="saeed">
<p> For any suggestion please back to me<a href="mail to:XCC-Saeed Sharaf "> XCC-Saeed Sharaf </a></p>
</div>

</body>

</html>
