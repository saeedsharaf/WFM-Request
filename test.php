<?php
/*
$today = date('m-d');
$tuesday = strtotime("tuesday 1 week ");
echo date('m-d',$tuesday);

if(date("m-d") == date("m-d",$tuesday)){
echo 'right';

}else{
	echo 'not';
}
*/

$sun_startdate = strtotime("monday 0 week");
$sun_enddate = strtotime("-2",$sun_startdate);
	$x = 2;
	$s = 2;

	
while($x > 0){
	
	$day[] = date("m-d-Y", $sun_startdate) ;
	$s++; 
	$x--;

	$sun_startdate = strtotime("-1 day", $sun_startdate);
	//echo $s . '<br>';
}

		?>
		  <th class="column100 column<?php echo $s ; ?>" data-column="column<?php echo $s ; ?>"><?php echo $day[1]; ?> </th>
		<?php



	$s= 4;

		$startdate=strtotime("monday 0 week ");
		$enddate=strtotime("+6 day", $startdate);
		

		while ($startdate < $enddate) {
		  $days = date("m-d-Y", $startdate);
		 $s++; 

		?>
		  <th class="column100 column<?php echo $s ; ?>" data-column="column<?php echo $s ; ?>"><?php echo $days; ?> </th>
		<?php
		 // echo $days.'<br>';
		  //echo $s . '<br>';
		  
		  
		  
		  $startdate = strtotime("+1 day", $startdate);
		}

		
?>