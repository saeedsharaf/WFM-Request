<?php


session_start();
//error_reporting(0);
include'connect.php';

$today = date("l");




if($today == 'Sunday' or $today == 'Monday' ){
	$sql="select st from sp";
	$result = $connt->query($sql);
	$row = $result->fetch_assoc();
	if($row['st'] == 0 ){

	$sql="update sp set st = '1' ";
	$connt->query($sql);
} 

}


if ($today == 'Tuesday' or $today == 'Wednesday' or $today == 'Thursday' or $today == 'Friday' or $today == 'Saturday' ){
	$check = "select st from sp"; // select data base previous data bas to check edit 
	$ch_result = $connt->query($check);
	$rows = $ch_result->fetch_assoc();
	if( $rows['st'] == 1){
		$del = "delete from p_sp";
		$connt->query($del); // delete previous table

		$sql = "insert into p_sp select * from sp";
		$connt->query($sql);
		
		$reset = "UPDATE `sp` SET `sunday`='------------',`sunli`='0',`monday`='------------',`monli`='0',`tuesday`='------------',`tuesli`='0',`wednesday`='------------',`wednesli`='0',`thursday`='------------',`thursli`='0',`friday`='------------',`frili`='0',`saturday`='------------',`saturli`='0' , st = '0' ";
		$connt->query($reset);

			}
		}









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
	
	
	


 
