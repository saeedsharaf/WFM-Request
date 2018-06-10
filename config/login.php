<?php

error_reporting(0);

/*
ob_start(); 
*/
$error="";
    if(isset($_POST['submit'])){
        if(empty($_POST['user'])){
			$error = '<div class="error"><span id="span">' .'Please write your Name' . '</span></div>';
			
		} else if(empty($_POST['password'])){
			$error = '<div class="error"><span id="span">' .'Please write your Password' . '</span></div>';
		} else {
                    
                    include'connect.php';

                       if(isset($_POST['user']) && isset($_POST['password'])){
                           $username = $_POST['user'];
                           $password = $_POST['password'];
						   
                           $saeed = $connt->query("SELECT * FROM member WHERE user_name='$username' AND password='$password'");
                           $row = $saeed->fetch_assoc();
                           $user = $row['user_name'];
                           $pass = $row['password'];
						   
                           if($username == $user && $password == $pass){
								session_start();
								$use = $row['user_name'];
								$_SESSION['username'] = $use;  // global variable hold the user name
								$_SESSION['super'] = $row['super']; // global variable hold the password
								$_SESSION['id'] = $row['id'];
								$_SESSION['teamid'] = $row['team_id'];
								$row['team_id'] = $_SESSION['teamid'];
								
                               ?>
                               <script>window.location.href='config/query.php'</script>
                               <?php
                
		  } else {
                               $error = '<div class="error"><span id="span">' .'Invalid User Name or Password' . '</span></div>';

                       }  
                       }
						
                       $connt->close();
					   
                  }
    }   
	
 ?>
