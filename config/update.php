<?php
session_start();
include'connect.php';
include'../main.html';


$sun = $_POST['sun'];
$mon = $_POST['mon'];
$tues =  $_POST['tues'];
$wednes = $_POST['wednes'];
$thurs =  $_POST['thurs'];
$fri =  $_POST['fri'];
$satur = $_POST['satur'];
$sv_id = $_SESSION['id'];
$pr = $_POST['pr'];


if($_POST['submit']){
			
			$teamid = $_SESSION['teamid'];	
				
				$sql1 = "select * from sp where team_id ='$teamid' "; 
				$result1 = $connt->query($sql1);
				$rows = $result1->fetch_assoc();
				$z = $rows['lim'];
				$n = 0;
				$b = 0;
				$a = 0;
				$s = 0;
				$a = 0;
				
				$saeed = array("8 AM", "9 AM", "10 AM", "11 AM", "12 PM", "1 PM", "2 PM", "3 PM", "4 PM", "5 PM", "6 PM", "11 PM");
			
				
				
				foreach($_POST['id'] as $ids => $id){
				if($sun[$ids] == 'Day OFF' or $mon[$ids] == 'Day OFF' or $tues[$ids] == 'Day OFF' or $wednes[$ids] == 'Day OFF' or $thurs[$ids] == 'Day OFF' or $fri[$ids] == 'Day OFF' or $satur[$ids] == 'Day OFF'){
				$a += 1;
				}
				if(in_array($sun[$ids], $saeed) or in_array($mon[$ids], $saeed) or in_array($tues[$ids], $saeed) or in_array($wednes[$ids], $saeed) or in_array($thurs[$ids], $saeed) or in_array($fri[$ids], $saeed) or in_array($satur[$ids], $saeed)){
				$s += 1;
				}
				
				}
			

			//echo $y.'<br>';
				$total = $a + $s;
				$limit = $z - $total;
				
	
			
			
				
		if($limit >= 0 ){
		$lock = "update sp set sunli = '1', monli = '1', tuesli = '1',wednesli = '1', thursli = '1', frili = '1', saturli = '1' WHERE team_id='$sv_id' "; 
			
		$connt->query($lock);	

	foreach($_POST['id'] as $ids => $id){
		

			
		/*
		$omer = "select sunday, monday, tuesday, wednesday, thursday, friday, saturday from sp WHERE id='$id' ";
		$re_omer = $connt->query($omer);
		$ro_row = $re_omer->fetch_assoc();
		
			if($ro_row['sunday'] !== $sun[$ids]){
			$lsun = "update sp set sunli = '1' where id='$id'  ";
			$connt->query($lsun);
			}
			
			if($ro_row['monday'] !== $mon[$ids]){
			$lmon = "update sp set monli = '1' where id='$id'  ";
			$connt->query($lmon);
			}
			
			if($ro_row['tuesday'] !== $tues[$ids]){
			$ltues = "update sp set tuesli = '1' where id='$id'  ";
			$connt->query($ltues);
			}
			
			if($ro_row['wednesday'] !== $wednes[$ids]){
			$lwednes = "update sp set wednesli = '1' where id='$id'  ";
			$connt->query($lwednes);
			}
			
			if($ro_row['thursday'] !== $thurs[$ids]){
			$lthurs = "update sp set thursli = '1' where id='$id'  ";
			$connt->query($lthurs);
			}
			
			if($ro_row['friday'] !== $fri[$ids]){
			$lfri = "update sp set frili = '1' where id='$id'  ";
			$connt->query($lfri);
			}
			
			if($ro_row['saturday'] !== $satur[$ids]){
			$lsatur = "update sp set saturli = '1' where id='$id'  ";
			$connt->query($lsatur);
			}
			
			*/
			
			
			
			
			$sql = "UPDATE sp SET sunday='$sun[$ids]', monday = '$mon[$ids]', tuesday = '$tues[$ids]', wednesday = '$wednes[$ids]', thursday = '$thurs[$ids]', friday = '$fri[$ids]', saturday = '$satur[$ids]', pr = '$pr[$ids]'  WHERE id='$id' ";
			$connt->query($sql);

		}

	

?>

<script>			document.getElementById('result').innerHTML='<span style="color: black;">Action Done. Thanks </span>';
					document.getElementById('result').style.display='block';
					
					document.getElementById('result').style.backgroundColor='rgba(62, 212, 32, 0.36)';
					document.getElementById('result').style.top='58px';
					
					function redirect(){
						 window.location.href='query.php';
					 }                      
				 setTimeout(redirect, 500);
				 
				 
				
</script>
		
<?php 
		}else{
		?>
		<script>
					document.getElementById('result').style.display='block';
					document.getElementById('result').innerHTML='<span style="color: black;">You Xceed the limit</span>';
					document.getElementById('result').style.top='58px';
					document.getElementById('result').style.backgroundColor='#ff00007d';
					
					function redirect(){
						document.getElementById('result').style.display='none';
					 }                      
				 setTimeout(redirect, 1000);
					
				
</script>
<?php

}
}
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
	
	
	


 
