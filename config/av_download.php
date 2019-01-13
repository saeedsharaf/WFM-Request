<?php
session_start();
//error_reporting(0);
include'connect.php';

$sun_startdate = strtotime("monday -1 week");
	$sun_enddate = strtotime("-2",$sun_startdate);

	$x = 2;

	while($x > 0){
		$day[] = date("m-d-Y", $sun_startdate) ;
		$x--;
		$sun_startdate = strtotime("-1 day", $sun_startdate);	
	}

		$startdate=strtotime("monday -1 week ");
		$enddate=strtotime("+6 day", $startdate);
		
		while ($startdate < $enddate) {
		  $days[] = date("m-d-Y", $startdate);
		  $startdate = strtotime("+1 day", $startdate);
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
$sql="select * from sp where av_sunday = 'Available Annual' or 	av_monday = 'Available Annual'  or av_tuesday = 'Available Annual' or av_wednesday = 'Available Annual' or av_thursday = 'Available Annual' or av_friday = 'Available Annual' or av_saturday = 'Available Annual' ";
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
			<th rowspan="2" class="color">Date edit</th>
		</tr>
		<tr>
			<th class="color">'. $day[1].'</th>
			<th class="color">'. $days[0].'</th>
			<th class="color">'. $days[1].'</th>
			<th class="color">'. $days[2].'</th>
			<th class="color">'. $days[3].'</th>
			<th class="color">'. $days[4].'</th>
			<th class="color">'. $days[5].'</th>
		</tr>';	
			while($row = $result->fetch_array()){
			$output .='
			<tr>
				<td>' .$row['name'].'</td>
				<td>' .$row['id'].'</td>
				<td>' .$row['sv'].'</td>
				<td>' .$row['av_sunday'].'</td>
				<td>' .$row['av_monday'].'</td>
				<td>' .$row['av_tuesday'].'</td>
				<td>' .$row['av_wednesday'].'</td>
				<td>' .$row['av_thursday'].'</td>
				<td>' .$row['av_friday'].'</td>
				<td>' .$row['av_saturday'].'</td>
				<td>' .$row['an_date'].'</td>

			</tr>
			';
			}
			$output .='
			</table>';
			header("content-type: application/'xls");
			header("content-disposition:attachement; filename=WFM Request.xls") ; 
			

	}		

	else{
		?>
		<div style="width:100%;height: 200px ;margin:0 auto;text-align: center;line-height: 100px;">No result found</div>

		<script>
			 
			function redirect (){
				window.location.href='avaliable_annual.php';

			}
			setTimeout(redirect, 1000);
		</script>

	<?php	
	}
	echo $output ;
	