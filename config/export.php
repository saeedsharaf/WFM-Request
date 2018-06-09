<?php
session_start();
include'../../../config/connect.php';





$startdate=strtotime("sunday +1 week ");
		$enddate=strtotime("+7 day", $startdate);
		

		while ($startdate < $enddate) {
		  $day[] = date("m-d-Y", $startdate);
		 
		  
		  '<th><?php echo $day; ?> </th>' .
		  
		  
		  $startdate = strtotime("+1 day", $startdate);
		}
		;


$sql="select * from sp";
$result =$connt->query($sql);




$output="";

if($result->num_rows > 0){



		
		
		
$output .='
	<table>
		<tr>
			<th rowspan="2" >Name</th>
			<th rowspan="2">Orcal</th>			
			<th>Sunday</th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
			<th>Friday</th>
			<th>Saturday</th>
		</tr>
		<tr>
			<th>'. $day[0].'</th>
			<th>'. $day[1].'</th>
			<th>'. $day[2].'</th>
			<th>'. $day[3].'</th>
			<th>'. $day[4].'</th>
			<th>'. $day[5].'</th>
			<th>'. $day[6].'</th>
		</tr>';	
		
		
	
	
			while($row = $result->fetch_array()){
			$output .='
			<tr>
				<td>' .$row['name'].'</td>
				<td>' .$row['id'].'</td>
				<td>' .$row['sunday'].'</td>
				<td>' .$row['monday'].'</td>
				<td>' .$row['tuesday'].'</td>
				<td>' .$row['wednesday'].'</td>
				<td>' .$row['thursday'].'</td>
				<td>' .$row['friday'].'</td>
				<td>' .$row['saturday'].'</td>
			</tr>
			';
			}
			$output .='
			
			</table>';
			
			header("content-type: application/'xls");
			header("content-disposition:attachement; filename=download.xls") ; 
	}		echo $output;
	
	
	$reset = "UPDATE `sp` SET `sunday`='------------',`sunli`='0',`monday`='------------',`monli`='0',`tuesday`='------------',`tuesli`='0',`wednesday`='------------',`wednesli`='0',`thursday`='------------',`thursli`='0',`friday`='------------',`frili`='0',`saturday`='------------',`saturli`='0' ";
$connt->query($reset);

?>
<script>
	window.location.href='query.php';
</script>

			
			
			