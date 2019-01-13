<?php
session_start();
include'connect.php';
error_reporting(0);




$date = date("Y-m-d h:i:sa");





if($_POST['submit']){

	$sun = $_POST['sun'];
$mon = $_POST['mon'];
$tues =  $_POST['tues'];
$wednes = $_POST['wednes'];
$thurs =  $_POST['thurs'];
$fri =  $_POST['fri'];
$satur = $_POST['satur'];
$sv_id = $_SESSION['id'];

			
			$teamid = $_SESSION['teamid'];	

			$main_sql = "select * from sp";
			$main_result = $connt->query($main_sql);
			$rows = $main_result->fetch_assoc();
			

			$sql_sun = "select * from sp where av_sunday = 'Available Annual'";
			$sql_mon = "select * from  sp where av_monday = 'Available Annual'";
			$sql_tues = "select * from  sp where av_tuesday = 'Available Annual'";
			$sql_wednes = "select * from  sp where av_wednesday = 'Available Annual'";
			$sql_thurs = "select * from  sp where av_thursday = 'Available Annual'";
			$sql_fri = "select * from  sp where av_friday = 'Available Annual'";
			$sql_satur = "select * from  sp where av_saturday = 'Available Annual'";

			$result_sun = $connt->query($sql_sun);
			$result_mon = $connt->query($sql_mon);
			$result_tues = $connt->query($sql_tues);
			$result_wednes = $connt->query($sql_wednes);
			$result_thurs = $connt->query($sql_thurs);
			$result_fri = $connt->query($sql_fri);
			$result_satur = $connt->query($sql_satur);


			$row_sun = $result_sun->fetch_assoc();
			$row_mon = $result_mon->fetch_assoc();
			$row_tues = $result_tues->fetch_assoc();
			$row_wednes = $result_wednes->fetch_assoc();
			$row_thurs = $result_thurs->fetch_assoc();
			$row_fri = $result_fri->fetch_assoc();
			$row_satur = $result_satur->fetch_assoc();




			foreach($_POST['id'] as $ids => $id){
				$sql_sun1='';
				$sql_mon1='';
				$sql_tues1 = '';
				$sql_wednes1 = '';
				$sql_thurs1 = '';
				$sql_fri1 = '';
				$sql_satur1 = '';

			if($result_sun->num_rows < $rows['av_limit_sun']){
				$sql_sun1 = "UPDATE sp SET av_sunday ='$sun[$ids]', an_date = '$date' WHERE id='$id' ";
				$connt->query($sql_sun1);
				
			}


			if($result_mon->num_rows < $rows['av_limit_mon']){
				$sql_mon1 = "UPDATE sp SET av_monday = '$mon[$ids]', an_date = '$date' WHERE id='$id' ";
				$connt->query($sql_mon1);
				

			}

			if($result_tues->num_rows < $rows['av_limit_tues']){
				$sql_tues1 = "UPDATE sp SET av_tuesday = '$tues[$ids]', an_date = '$date' WHERE id='$id' ";
				$connt->query($sql_tues1);
				

			}

			if($result_wednes->num_rows < $rows['av_limit_wednes']){
				$sql_wednes1 = "UPDATE sp SET av_wednesday = '$wednes[$ids]', an_date = '$date' WHERE id='$id' ";
				$connt->query($sql_wednes1);
				

			}

			if($result_thurs->num_rows < $rows['av_limit_thurs']){
				$sql_thurs1 = "UPDATE sp SET av_thursday = '$thurs[$ids]', an_date = '$date' WHERE id='$id' ";
				$connt->query($sql_thurs1);
				

			}

			if($result_fri->num_rows < $rows['av_limit_fri']){
				$sql_fri1 = "UPDATE sp SET av_friday = '$fri[$ids]', an_date = '$date' WHERE id='$id' ";
				$connt->query($sql_fri1);
				

			}

			if($result_satur->num_rows < $rows['av_limit_satur']){
				$sql_satur1 = "UPDATE sp SET av_saturday = '$satur[$ids]', an_date = '$date' WHERE id='$id' ";
				$connt->query($sql_satur1);
				

			}




		
		
		
		
		
		
		

	

			
			//$sql = "UPDATE sp SET av_sunday ='$sun[$ids]', av_monday = '$mon[$ids]', av_tuesday = '$tues[$ids]', av_wednesday = '$wednes[$ids]', av_thursday = '$thurs[$ids]', av_friday = '$fri[$ids]', av_saturday = '$satur[$ids]' WHERE id='$id' ";
			

		}
}
	
?>


		 
				 
				 
				

<?php







if($_POST['up_limit']){

$up_sun = $_POST['up_sunday'];
$up_mon = $_POST['up_monday'];
$up_tues = $_POST['up_tuesday'];
$up_wednes = $_POST['up_wednesday'];
$up_thurs = $_POST['up_thursday'];
$up_fri = $_POST['up_friday'];
$up_satur = $_POST['up_saturday'];

	$sunup_sql = "update sp set av_limit_sun ='$up_sun' , 	av_limit_mon = '$up_mon', av_limit_tues = '$up_tues', av_limit_wednes = '$up_wednes' , av_limit_thurs = '$up_thurs', av_limit_fri = '$up_fri' , av_limit_satur = '$up_satur'  ";
	$connt->query($sunup_sql);

}


?>
<script>	
			/*document.getElementById('result').innerHTML='<span style="color: black;">Action Done. Thanks </span>';
			document.getElementById('result').style.display='block';
			
			document.getElementById('result').style.backgroundColor='rgba(62, 212, 32, 0.36)';
			document.getElementById('result').style.top='58px';
			*/
			function redirect(){
				 window.location.href='avaliable_annual.php';
			 }                      
		 setTimeout(redirect, 50);
		</script>
<?php




	
	
	


 
