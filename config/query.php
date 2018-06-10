<?php
session_start();

//error_reporting(0);
if(empty($_SESSION['username'])){
?>
<script>
window.location.href='../index.php' 
</script>
<?php
} ;





include'../main.html';





?>
	
	
	


 
