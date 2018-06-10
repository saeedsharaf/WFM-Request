<?php
session_start();
include'connect.php';
?>
<style type="text/css" >

table, th, td {
    border: 0.5pt solid gray;
    border-collapse: collapse;
    text-align:center;
}
.color{

	background-color:#24318e;
	color:white;
}
</style>

<?php

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
			<th rowspan="2" class="color">Name</th>
			<th rowspan="2" class="color">Orcal</th>	
			<th rowspan="2" class="color"> SV</th>		
			<th class="color">Sunday</th>
			<th class="color">Monday</th>
			<th class="color">Tuesday</th>
			<th class="color">Wednesday</th>
			<th class="color">Thursday</th>
			<th class="color">Friday</th>
			<th class="color">Saturday</th>
		</tr>
		<tr>
			<th class="color">'. $day[0].'</th>
			<th class="color">'. $day[1].'</th>
			<th class="color">'. $day[2].'</th>
			<th class="color">'. $day[3].'</th>
			<th class="color">'. $day[4].'</th>
			<th class="color">'. $day[5].'</th>
			<th class="color">'. $day[6].'</th>
		</tr>';	
		
		
	
	
			while($row = $result->fetch_array()){
			$output .='
			<tr>
				<td>' .$row['name'].'</td>
				<td>' .$row['id'].'</td>
				<td>' .$row['sv'].'</td>
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
			header("content-disposition:attachement; filename=WFM Request.xls") ; 
	}		echo $output;
	
	
	$reset = "UPDATE `sp` SET `sunday`='------------',`sunli`='0',`monday`='------------',`monli`='0',`tuesday`='------------',`tuesli`='0',`wednesday`='------------',`wednesli`='0',`thursday`='------------',`thursli`='0',`friday`='------------',`frili`='0',`saturday`='------------',`saturli`='0' ";
	$connt->query($reset);
	if($connt->query($reset) === true){
		?>
		<script>
			window.location.href="query.php"
		</script>
		<?php
}
			
			
			