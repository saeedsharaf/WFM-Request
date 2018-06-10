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

$id = $_POST['id'];



	
		if($_POST['submit']){
			
			
		
			$sql = "UPDATE sp SET sunday='$sun', monday = '$mon', tuesday = '$tues', wednesday = '$wednes', thursday = '$thurs', friday = '$fri', saturday = '$satur' WHERE id='$id' ";
			$connt->query($sql);
			if ($connt->query($sql) === true){
			?>
				<script>
					//window.location.href='query.php';
					
					
					
					document.getElementById('result').style.display='block';
					document.getElementById('result').innerHTML='<span style="color: black;">Successfully </span>';
					document.getElementById('result').style.backgroundColor='rgba(62, 212, 32, 0.36)';
					document.getElementById('result').style.top='73px';
					
					function redirect(){
						 window.location.href='query.php'
					 }                      
				 setTimeout(redirect, 1500);
				
				</script>
			
			<?php
			}
		} 
	
		
		

	
/*
?>
<script>window.location.href='query.php'</script>
<?php 

if ($connt->query($sql) === true){
	
	?>
	<script>window.location.href='query.php'</script>
	
	<?php
	
	
}

*/
?>
	
	
	


 
