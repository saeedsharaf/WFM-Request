<?php
session_start();
include'connect.php';
include'../oto.php';


$sun = $_POST['sun'];
$mon = $_POST['mon'];
$tues =  $_POST['tues'];
$wednes = $_POST['wednes'];
$thurs =  $_POST['thurs'];
$fri =  $_POST['fri'];
$satur = $_POST['satur'];
$sv_id = $_SESSION['id'];
$fr = $_POST['fr'];








if($_POST['submit']){
			
			$teamid = $_SESSION['teamid'];	
				
		

	foreach($_POST['id'] as $ids => $id){

			
			$sql = "UPDATE sp SET o_sunday='$sun[$ids]', o_monday = '$mon[$ids]', o_tuesday = '$tues[$ids]', o_wednesday = '$wednes[$ids]', o_thursday = '$thurs[$ids]', o_friday = '$fri[$ids]', o_saturday = '$satur[$ids]', fr = '$fr[$ids]'  WHERE id='$id' ";
			$connt->query($sql);

		}

	

?>

<script>			document.getElementById('result').innerHTML='<span style="color: black;">Action Done. Thanks </span>';
					document.getElementById('result').style.display='block';
					
					document.getElementById('result').style.backgroundColor='rgba(62, 212, 32, 0.36)';
					document.getElementById('result').style.top='58px';
					
					function redirect(){
						 window.location.href='oto.php';
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
	
	
	


 
