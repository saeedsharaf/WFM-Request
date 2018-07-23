<?php


include'../config/connect.php';
include 'structure.php';

$super = $_POST['super'];
$manger = $_POST['manger'];
$lob = $_POST['lob'];
$status = $_POST['status'];
$team_id = $_POST['team_id'];
$cur_time = date("d/m/y - h:i A ");
$oracle = $_POST['oracle'];
$tel_opti = $_POST['tel_opti'];
$avaya = $_POST['avaya'];
$name = $_POST['name'];
$wiki_user = $_POST['wiki_user'];
$gender = $_POST['gender'];



$sql= "INSERT INTO `structure` (`oracle`, `tel_opti`, `avaya`, `name`, `sv`, `manger`, `lob`, `wiki_user`, `gender`, `status`, `date`) VALUES  ('$oracle','$tel_opti', '$avaya', '$name', '$super', '$manger', '$lob', 'wiki_user', '$gender', '$status', '$cur_time')";

$sql1 = "update sp set sv = '$super' , team_id = '$team_id' where id = '$tel_opti' ";


if($connt->query($sql) === true and $connt->query($sql1) === true){
	
	?>
	<script>
		document.getElementById("saeed").innerHTML=
		'<div id="status"><div style="padding-top: 8px;">Successfully</div></div>';

		function redirect(){
		window.location.href='structure.php'
		}
		setTimeout(redirect,2000)

	</script>

	<?php
}else{
	echo 'not done';
	
}






