<?php
session_start();
include'connect.php';
include'../task.php';


$sun = $_POST['sun'];
$mon = $_POST['mon'];
$tues =  $_POST['tues'];
$wednes = $_POST['wednes'];
$thurs =  $_POST['thurs'];
$fri =  $_POST['fri'];
$satur = $_POST['satur'];
$sv_id = $_SESSION['id'];
$from = $_POST['from'];
$to = $_POST['to'];







if($_POST['submit']){
			
			$teamid = $_SESSION['teamid'];	
				
		

	foreach($_POST['id'] as $ids => $id){

			
			$sql = "UPDATE sp SET t_sunday='$sun[$ids]', t_monday = '$mon[$ids]', t_tuesday = '$tues[$ids]', t_wednesday = '$wednes[$ids]', t_thursday = '$thurs[$ids]', t_friday = '$fri[$ids]', t_saturday = '$satur[$ids]', t_from = '$from[$ids]', t_to = '$to[$ids]'  WHERE id='$id' ";
			$connt->query($sql);

		}

	

?>

<script>			document.getElementById('result').innerHTML='<span style="color: black;">Action Done. Thanks </span>';
					document.getElementById('result').style.display='block';
					
					document.getElementById('result').style.backgroundColor='rgba(62, 212, 32, 0.36)';
					document.getElementById('result').style.top='58px';
					
					function redirect(){
						 window.location.href='task.php';
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
	
	
	


 
