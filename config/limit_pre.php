<?php
session_start();
include'connect.php';

$omer = $_POST['limitation'];
//$annual_limit = $_POST['annual_limit'];
				$update = "update sp set lim = '$omer' where queue = 'pre' ";
				$connt->query($update);
				?>
<script>window.location.href='query.php'</script>
<?php 
/*

if ($connt->query($sql) === true){
	echo 'done';
	?>
	<script>window.location.href='query.php'</script>
	
	<?php
	
	
}else{
	
	
	echo 'notdone';
	
}

*/


?>