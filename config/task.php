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
		
		$reset ="UPDATE `sp` SET `sunday`='------------',`sunli`='0',`monday`='------------',`monli`='0',`tuesday`='------------',`tuesli`='0',`wednesday`='------------',`wednesli`='0',`thursday`='------------',`thursli`='0',`friday`='------------',`frili`='0',`saturday`='------------',`saturli`='0' , st = '0' , pr = '', tdate='' , ttime= '', o_sunday='', o_monday = '' , o_tuesday = '', 
		o_wednesday = '', o_thursday = '' , o_friday = '', o_saturday = '', fr = '',t_sunday='',t_monday='',t_tuesday='',t_wednesday='',t_thursday='',t_friday='',t_saturday='',t_from='',t_to='' ";
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
	include'../task.php';
} 








?>
	
	
	


 
