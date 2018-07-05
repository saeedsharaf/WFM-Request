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
	foreach($oracle as $ids => $oracles ){
	$sql1 = " UPDATE sp SET r_oracle ='$id[$ids]' , r_name = '$r_name[$ids]', r_sv = '$r_sv[$ids]' WHERE id = '$oracles' ";
	$connt->query($sql1);
}


foreach($id as $ids){

$sql2 = "select * from sp where id = '$ids'";
$result = $connt->query($sql2);
$row = $result->fetch_assoc();
$name[] = $row['r_name'];
$id[] = $row['r_oracle'];
$sv[] = $row['r_sv'];
}

}




?>
	
	
	


 
