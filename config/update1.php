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

	$sql = "select * from sp where id = '$id' ";
	$result = $connt->query($sql); 
	$row = $result->fetch_assoc();
	$team_id = $row['team_id'];

	
		if($team_id < 1000 ){ // pre
			
			
		
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
		}else {

				$sql1 = "select * from sp where team_id ='$teamid' "; 
				$result1 = $connt->query($sql1);
				//$roww = $result1->fetch_assoc();
				
		
				$q = 0 ;
				if($result1->num_rows > 0){

					while ($rows = $result1->fetch_assoc()){
						$limit = $rows['annual_limit'];

							if($rows['sunday'] == 'Annual'){
								$q += 1;
							}

							if($rows['monday'] == 'Annual'){
								$q += 1;
							}


							if($rows['tuesday'] == 'Annual'){
								$q += 1;
							}


							if($rows['wednesday'] == 'Annual'){
								$q += 1;
							}


							if($rows['thursday'] == 'Annual'){
								$q += 1;
							}

							if($rows['friday'] == 'Annual'){
								$q += 1;
							}

							if($rows['saturday'] == 'Annual'){
								$q += 1;
							}

							
			}
			
			$total = $limit - $q ;
			echo $total;

			if($total >= 0){

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
						 //window.location.href='query.php'
					 }                      
				 setTimeout(redirect, 1500);
				
				</script>
			
			<?php
			}


			} else {

				?>
				<script>
					//window.location.href='query.php';
					
					
					
					document.getElementById('result').style.display='block';
					document.getElementById('result').innerHTML='<span style="color: silver;">No Slots  Found  </span>';
					document.getElementById('result').style.backgroundColor='rgba(0, 0, 0, 0.7)';
					document.getElementById('result').style.top='73px';
					
					function redirect(){
						 //window.location.href='query.php'
					 }                      
				 setTimeout(redirect, 1500);
				
				</script>
			
			<?php


			}

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
	
	
	


 
