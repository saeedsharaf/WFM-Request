<?php


session_start();
//error_reporting(0);
include'connect.php';

if(empty($_SESSION['username'])){
?>
<script>
window.location.href='../index.php' 
</script>
<?php
}else {
	include'../oto.php';
} 








?>
	
	
	


 
