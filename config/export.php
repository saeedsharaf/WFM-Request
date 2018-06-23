<?php
session_start();
error_reporting(0);
include'connect.php';

if($_GET['select'] == 'pervious'){	
	$sun_startdate = strtotime("monday 0 week");
	$sun_enddate = strtotime("-2",$sun_startdate); // to back 2 days from monday 
	$x = 2;
	while($x > 0){
		$day[] = date("m-d-Y", $sun_startdate) ; // assign pervoius sunday to array [1]
		$x--;
		$sun_startdate = strtotime("-1 day", $sun_startdate);
	}	

	$startdate=strtotime("monday 0 week ");
	$enddate=strtotime("+6 day", $startdate); // to get the next 6 day from monday
	
	while ($startdate < $enddate) {
	  $days[] = date("m-d-Y", $startdate);	  
	  $startdate = strtotime("+1 day", $startdate);
	}

	$sql="select * from p_sp";

}else {
 	$sun_startdate = strtotime("monday +1 week");
	$sun_enddate = strtotime("-2",$sun_startdate);

	$x = 2;

	while($x > 0){
		$day[] = date("m-d-Y", $sun_startdate) ;
		$x--;
		$sun_startdate = strtotime("-1 day", $sun_startdate);	
	}

		$startdate=strtotime("monday +1 week ");
		$enddate=strtotime("+6 day", $startdate);
		
		while ($startdate < $enddate) {
		  $days[] = date("m-d-Y", $startdate);
		  $startdate = strtotime("+1 day", $startdate);
		}

	$sql="select * from sp";

}	

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
			<th rowspan="2" class="color">Priority</th>
			<th colspan="2" class="color">Team Meeting </th>
		</tr>
		<tr>
			<th class="color">'. $day[1].'</th>
			<th class="color">'. $days[0].'</th>
			<th class="color">'. $days[1].'</th>
			<th class="color">'. $days[2].'</th>
			<th class="color">'. $days[3].'</th>
			<th class="color">'. $days[4].'</th>
			<th class="color">'. $days[5].'</th>
			<th class="color">Day</th>
			<th class="color">Time</th>
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
				<td>' .$row['pr'].'</td>
				<td>' .$row['tdate'].'</td>
				<td>' .$row['ttime'].'</td>
			</tr>
			';
			}
			$output .='
			</table>';
			header("content-type: application/'xls");
			header("content-disposition:attachement; filename=WFM Request.xls") ; 
	}		
	echo $output;

	
	
	
	
			
			
			