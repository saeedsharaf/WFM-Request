<?php
session_start();

error_reporting(0);



if(empty($_SESSION['username'])){
?>
<script>
window.location.href='../../../user.php' 
</script>
<?php
}

include 'change_password.php';
?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../style/change_password.css">

</head>

<body>

  
    
<div class="container">
    <form action="" method="post">
	<div class="username"> 
            
          
                <label> User name </label>
                <input type="text" name="user" autocomplete="off" placeholder="<?php echo $_SESSION['username'] ?>" id="name" readonly>
	</div>
    
	<div class="password">
            <label style="margin-right:6px; ">Old Password </label>
            <input type="password" name="password" placeholder="Password" > 
			
            <!--
		<input type="checkbox" name="check" > <span class="whitecolor">Remember Me </span>
		-->
	</div>
    <div>
		<label > New password </label>
			<input type="password" name="new_password" placeholder="New Password" > 
	</div>
	<div class="login" >
		<input style="margin-top:15px;" type="submit"  value="Submit" name="submit" >
		<input style="margin-top:15px;" type="submit"  value="Cancel" name="cancel" >
		
	</div>
	
	
        <?php echo $error ;?>
	
    </form>
     </div>
	
   
	
</div>
<div class="saeed">
<p> If any suggestion please back to me XCC-Saeed Sharaf </p>
</div>

</body>

</html>
