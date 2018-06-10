<?php
session_start();
include'connect.php';

$omer = $_POST['limitation'];
				$update = "update sp set lim = '$omer' ";
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