<?php

error_reporting();

$error="";

 if(isset($_POST['cancel'])){ // if user press cancel
	
		 ?>
                               <script>window.location.href='../index.php'</script>
                               <?php
		}

    if(isset($_POST['submit'])){ // if user press submit 
        if(empty($_POST['password'])){ // is password area empty
			$error = '<div class="error"><span id="span">' .'Please write your Old Password' . '</span></div>';
			
		} else if (empty($_POST['new_password'])){ // is new password are empty
			$error = '<div class="error"><span id="span">' .'Please write your New Password' . '</span></div>';
		}else {
		
		
					include'connect.php';
					
					$user = $_SESSION['username']; 
					$password = $_POST['new_password'];
					

					$sql = "select * from member where user_name = '$user' ";
					$result = $connt->query($sql);
					$row = $result->fetch_assoc();
					
					$id = $row['id'];
					$super = $row['super'];

					if ($_POST['password'] == $row['password']){

					$sql = "UPDATE member SET password ='$password' where id = '$id' " ;
					
					if ($connt->query($sql) === true ){
					$error = '<div class="error"><span id="span">' .'Password changed' . '</span></div>';
			
					header( "refresh:1;url=../index.php" );

						} 
			
			
		} else {
		$error = '<div class="error"><span id="span">' .'Invalid Old Password' . '</span></div>';
		}
		
	

		
 }
 }
 

 
 
?>

