<?php



error_reporting(0);
include'connect.php';

$id = $_POST['id'];

$r_name = $_POST['name'];
$r_sv = $_POST['sv'];
$oracle = $_POST['oracle'];





foreach($id as $ids){

$sql = "select * from sp where id = '$ids'";
$result = $connt->query($sql);
$row = $result->fetch_assoc();
$name[] = $row['name'];
$id[] = $row['id'];
$sv[] = $row['sv'];
}


if($_POST['submit']){
	$sql2 = "update sp set r_oracle = '', r_name = '', r_sv = ''";
	$connt->query($sql2);

	foreach($oracle as $ids => $oracles ){
	$sql1 = " UPDATE sp SET r_oracle ='$id[$ids]' , r_name = '$r_name[$ids]', r_sv = '$r_sv[$ids]' WHERE id = '$oracles' ";
	$connt->query($sql1);
}
}





?>
	
	
	


 
