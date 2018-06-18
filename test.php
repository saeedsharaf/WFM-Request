<?php
include'config/connect.php';
$sql = "insert into p_sp select * from q_sp";
$test = $connt->query($sql) ; 
if ($test == true ){
	echo 'done';
} else {
	echo 'not done';
}


?>