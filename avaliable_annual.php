<!DOCTYPE html>
<html>
<head>
	<title>Special Request</title>
	<link rel="shortcut icon" href="../style/icon.png">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
	
	



<style>


body{
background-color:#d1d1d1;

}

.head1{
display: flex;
width: 100%;
height : 50px;
margin-bottom : 20px;
box-shadow:-3px 4px 15px 4px #00000047;
min-width: 200px;
background-color: #252d3a; 
}

.bbb{
width: 100%;

}
.left1{
float: right;

}


th {
    text-align: center;
	
   }

td {
    text-align: center;
	padding-right: 0px;
}
.row100.head th{
	padding-top:10px;
padding-bottom:5px;

}

table100.ver3 td{
font-size: 13px;


}

.row100 td{
padding-top: 2px;
padding-bottom: 2px; 
}
.column100 {
    width: 130px;
    padding-left: 13px;
}

.table100.ver3 th {

text-transform: none; 
    background-color: #24318e;
}
.column100 {
    /* width: 130px; */
    padding-left: 5px;
    padding-right: 5px;
}

.submit{
margin: 0 auto;
width:100px;
height:30px;
margin-bottom:5px;

background-color: #2979FF;
    border: 6;
    /* border: 0px; */
    border-color: #fffefe;
    border-radius: 5px;
    color: white;
	 outline: none;
}

.submit:hover {
background-color: #4FC3F7; /* Green */
color: white;
box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

}

.text{
text-align:center;
height: 30px; 
width: 100%;

}

.dim{
text-align:center;
height: 45px; 
width: 100%;
color:#808080;

}

#result{
    width: 20%;
    display:none;
    position: fixed;
    left: 39%;
    top: -100px;
    text-align: center;
    border-radius: 8px;
    height: 29px;
    line-height: 30px;

}

.tmeeting{
	width:25%;
	margin-top: 50px;
}

.up{
	background-color: #24318e;
	color: white;
	border:1px solid black;
}

.border{
	border:1px solid black;
	width: 5px;
}

.center{
	text-align: center;
	width: 100px;
	height: 25px;

}


input{
	text-align: center;
	font-size: 14px;
}

</style>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
	<div class="head1" >
			
			<img src="../style/user.jpg" height="40px" style="margin-top: 4px; margin-left: 10px; border-radius: 25px;" />
			<span style="margin-left: 10px; color: white; margin-top: 15px;"> <?php echo $_SESSION['username']; ?> </span>
			
			<div class="bbb">
			<img class="left1" src="../style/flogout.png" width="30px" height="25px" style="margin:10px; margin-right:25px;" usemap="#logout" />
			<map name="logout">
			<area shape ="circle" coords="1301,78,1316,93" href="../config/logout.php" title="Logout" >
			</map>
			
			<img class="left1" src="../style/set6.png" width="25px" height="25px" style="margin:10px;" usemap="#setting"/> 
			<map name="setting" >
			<area shape="circle"  coords="1259,76,1280,95"  href="../config/change_pass.php" title="Change Password">
			<?php 
			if($_SESSION['super'] == 1){
			?>
					<a href="task.php" title="Task"><img class="left1" src="../style/task.png" width="25px" height="25px" style="margin:5px;margin-top:12px" /></a>
					<a href="oto.php" title="One to One"><img class="left1" src="../style/coaching1.png" width="30px" height="35px" style="margin:5px;" /></a>
					<a href="../structure/structure.php" title="Structure"><img class="left1" src="../style/struc.png" width="25px" height="30px" style="margin:9px;" /></a>
					<a href="avaliable_annual.php" title="Avaliable Annual"><img class="left1" src="../style/928424.png" width="25px" height="30px" style="margin:9px;" /></a>  
					<?php
					if($_SESSION['id'] == 9){
						?>
					<a href="refund.php" title="Refund Team"><img class="left1" src="../style/refund.png" width="30px" height="30px" style="margin:5px;margin-top:8px" /></a>
					<?php
					}
					?>
					<a href="query.php" title="Home"><img class="left1" src="../style/home1.png" width="25px" height="25px" style="margin:5px; margin-top:11px; margin-right: 10px; " /></a> 
					
					<?php
				} ?>
			</map>
			</div>
			<!--
			<div class="page">
			<div class="f" id=""><ul style="list-style-type:none"><li><a href="daily.php"> Daily Dashboard </a></li></div>
			<div class="f" id="active"><ul style="list-style-type:none"><li><a href="daily.php"> Monthly Dashboard </a></li> </ul></div>
			</div>
			-->
		</div>
		
		<div class="container-table100" style="align-items: unset;">
		
			<div class="wrap-table100" style="width:100%" >
			
			
			
		
			
				<div class="table100 ver3 m-b-110">
				
					<table data-vertable="ver3">
						<thead >
							<tr class="row100 head" >
								<th class="column100 column1" data-column="column1" rowspan="3" style="padding:0px ">Name</th>
								<th class="column100 column2" data-column="column2" rowspan="2">Oracle</th>
								<th class="column100 column3" data-column="column3">Sunday</th>
								<th class="column100 column4" data-column="column4">Monday</th>
								<th class="column100 column5" data-column="column5">Tuesday</th>
								<th class="column100 column6" data-column="column6">Wednesday</th>
								<th class="column100 column7" data-column="column7">Thursday</th>
								<th class="column100 column8" data-column="column8">Friday</th>
								<th class="column100 column9" data-column="column9">Saturday</th>
							
							</tr>


							<tr class="row100 head">
						<?php
					//error_reporting(0);
						

	
	
	
		$sun_startdate = strtotime("Saturday -1 week");
$sun_enddate = strtotime("-2",$sun_startdate);
	$x = 2;
	$s = 1;

	
while($x > 0){
	
	$day[] = date("m-d-Y", $sun_startdate) ;
	$s++; 
	$x--;

	$sun_startdate = strtotime("+1 day", $sun_startdate);
	//echo $s . '<br>';
}

		?>
		  <th class="column100 column<?php echo $s ; ?>" data-column="column<?php echo $s ; ?>"><?php echo $day[1]; ?> </th>
		<?php



	$s= 3;

		$startdate=strtotime("Monday -1 week");
		
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
						

			include'connect.php';
			
			
				$teamid = $_SESSION['teamid'];	

				$sql1 = "select * from sp where team_id ='$teamid' ";

				$result1 = $connt->query($sql1);

				$coun_avrow = $result1->fetch_assoc();



				//////////////////////////////////////////////////////////////////
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


		

			//////////////////////////////////////////////////////////////////////


			?>
		</tr>
		<tr class="row100 head">
			<th class="column100 column2" data-column="column2" style="font-size: 14px;">Remaining</th>
			<th class="column100 column3" data-column="column3"><?php echo ($coun_avrow['av_limit_sun'] - $result_sun->num_rows)  ?></th>
			<th class="column100 column4" data-column="column4"><?php echo ($coun_avrow['av_limit_mon'] - $result_mon->num_rows)  ?></th>
			<th class="column100 column5" data-column="column5"><?php echo ($coun_avrow['av_limit_tues'] - $result_tues->num_rows) ?></th>
			<th class="column100 column6" data-column="column6"><?php echo ($coun_avrow['av_limit_wednes'] - $result_wednes->num_rows)  ?></th>
			<th class="column100 column7" data-column="column7"><?php echo ($coun_avrow['av_limit_thurs'] - $result_thurs->num_rows) ?></th>
			<th class="column100 column8" data-column="column8"><?php echo ($coun_avrow['av_limit_fri'] - $result_fri->num_rows) ?></th>
			<th class="column100 column9" data-column="column9"><?php echo ($coun_avrow['av_limit_satur'] - $result_satur->num_rows) ?></th>

		</tr>

			</thead>
		<tbody>	
					
			<?php	
				/******************************************************************************/
			
				
				?>
				<div id="result" style="transition:0.5s;background-color:red;">
				
				</div>
				
				
				<?php

				/*****************************************************************************************************************************************************/

				if ($_SESSION['super'] == 1){
				?>
				
				<?php
				$id = $_SESSION['id'];	

			
				$sql = "select * from sp where team_id ='$teamid' ";
				

				
				
				
				$result = $connt->query($sql);

				if($result->num_rows > 0 ){
					
				?>
				
			<?php
				while ($row = $result->fetch_assoc()){ 

			?>
			<form action="avaliable_update.php" method="post">
			<tr class="row100">
				
				<td class="column100 column1" data-column="column1" style="padding-left: 20px; padding-right:20px;"><?php echo $row['name']; ?></td>
				<td class="column100 column2" data-column="column2" style="width:140px;"><?php echo $row['id']; ?> <input type="hidden" name="id[]"  value="<?php echo $row['id']; ?>"> </td>
				<td class="column100 column3" data-column="column3">
					<select name="sun[]"  class="text" >
						<option value="<?php echo $row['av_sunday']; ?>" style="color:#80808082;"   selected > <?php echo $row['av_sunday']; ?> </option>
						
						<option value="Available Annual" > Available Annual </option>
						
					</select>
				</td>
				
				<td class="column100 column4" data-column="column4">
				<select name="mon[]"  class="text" >
						<option value="<?php echo $row['av_monday']; ?>" style="color:#a9a8a882;"    selected> <?php echo $row['av_monday']; ?> </option>
						
						<option value="Available Annual" > Available Annual</option>
						
					</select>

				</td>
				
				<td class="column100 column5" data-column="column5">
				<select name="tues[]"  class="text" >
						<option value="<?php echo $row['av_tuesday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['av_tuesday']; ?> </option>
						
						<option value="Available Annual" > Available Annual</option>
						
					</select>
				</td>
				<td class="column100 column6" data-column="column6">
				<select name="wednes[]"  class="text" >
						<option value="<?php echo $row['av_wednesday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['av_wednesday']; ?> </option>
						
						<option value="Available Annual" > Available Annual</option>
						
					</select>
				</td>
				<td class="column100 column7" data-column="column7">
				<select name="thurs[]"  class="text" >
						<option value="<?php echo $row['av_thursday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['av_thursday']; ?> </option>
						
						<option value="Available Annual" > Available Annual</option>
						
					</select>

				</td>
				<td class="column100 column8" data-column="column8">
				<select name="fri[]"  class="text" >
						<option value="<?php echo $row['av_friday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['av_friday']; ?> </option>
						
						<option value="Available Annual" > Available Annual</option>
						
					</select>

				</td>
				
				<td class="column100 column9" data-column="column9">
				<select name="satur[]"  class="text" >
						<option value="<?php echo $row['av_saturday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['av_saturday']; ?> </option>
						
						<option value="Available Annual" > Available Annual</option>
						
					</select>
				</td>

			</tr>
			
		<?php
		}
		
		}
	}

		?>
		
		</tbody>
			
			
	</table>


	<div style="width: 100px;height: 50px;margin: 0 auto;margin-top: 20px;"><input type="submit" name="submit" style="width:100px; height:30px;" class="submit" value="Submit"> </div>
	</form>


					<?php

if($teamid == 2 or $teamid == 4 ){

?>
<table style="width:30%;text-align: center">
	<thead>
	<form method="post" action="avaliable_update.php" >
<tr>
	<td class="up" style="color: white"> Sunday </td>
	<td class="border"><input type="number" name="up_sunday" value ="<?php echo $coun_avrow['av_limit_sun'] ?>">  </td>
	
</tr>
<tr>
	<td class="up" style="color: white"> Monday </td>
	<td class="border" style="color: white"><input type="number" name="up_monday" value ="<?php echo $coun_avrow['av_limit_mon'] ?>">  </td>
	
</tr>
<tr>
	<td class="up" style="color: white"> Teusday </td>
	<td class="border"><input type="number" name="up_tuesday" value ="<?php echo $coun_avrow['av_limit_tues'] ?>">  </td>
	
</tr>
<tr>
	<td class="up" style="color: white"> Wednesday </td>
	<td class="border"> <input type="number" name="up_wednesday" value ="<?php echo $coun_avrow['av_limit_wednes'] ?>">  </td>

</tr>
<tr>
	<td class="up" style="color: white"> Thursday </td>
	<td class="border"><input type="number" name="up_thursday" value ="<?php echo $coun_avrow['av_limit_thurs'] ?>">  </td>
	
</tr>
<tr>
	<td class="up" style="color: white"> Friday </td>
	<td class="border"><input type="number" name="up_friday" value ="<?php echo $coun_avrow['av_limit_fri'] ?>">  </td>
	
</tr>
<tr>
	<td class="up" style="color: white"> Saturday </td>
	<td class="border"><input type="number" name="up_saturday" value ="<?php echo $coun_avrow['av_limit_satur'] ?>">  </td>
	
</tr>

</thead>


</table>
<input type="submit" name="up_limit" class="submit" style="margin-left: 140px;margin-top: 20px;"> 
</form>


<?php

}

?>
	</div>
	<form action="av_download.php" method="get">
		<input type="submit" name="download" style="display: none" accesskey="s">
	</form>

	</div>
	</div>
	



				</div>


				
			</div>
	


	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	
<!--===============================================================================================-->
<!--
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<!--
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->

	<script src="../vendor/js/main.js"></script>





</body>
</html>