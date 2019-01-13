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
padding-left: 15px;
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
				}
				 ?>
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
								<th class="column100 column1" data-column="column1" rowspan="2" style="padding:0px ">Name</th>
								<th class="column100 column2" data-column="column2" rowspan="2">Oracle</th>
								<th class="column100 column3" data-column="column3">Sunday</th>
								<th class="column100 column4" data-column="column4">Monday</th>
								<th class="column100 column5" data-column="column5">Tuesday</th>
								<th class="column100 column6" data-column="column6">Wednesday</th>
								<th class="column100 column7" data-column="column7">Thursday</th>
								<th class="column100 column8" data-column="column8">Friday</th>
								<th class="column100 column9" data-column="column9">Saturday</th>
							<?php if($_SESSION['super'] == 1){
								?> <th class="column100 column10" data-column="column10" rowspan="2">From</th>
								<?php
							} ?>
							</tr>
							<tr class="row100 head">
						<?php
					//error_reporting(0);
						

	
	
	
		$sun_startdate = strtotime("monday +1 week");
$sun_enddate = strtotime("-2",$sun_startdate);
	$x = 2;
	$s = 1;

	
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



	$s= 3;

		$startdate=strtotime("monday +1 week ");
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
						</tr>
						</thead>
						<tbody>	
					
			<?php	
				/******************************************************************************/
			include'connect.php';
			
			
				$teamid = $_SESSION['teamid'];	

				$sql1 = "select * from sp where team_id ='$teamid' ";

				$result1 = $connt->query($sql1);
				
				?>
				<div id="result" style="transition:0.5s;background-color:red;">
				
				</div>
				
				
				<?php

				/*****************************************************************************************************************************************************/

				if ($_SESSION['super'] == 1){
				?>
				
				<?php
				$id = $_SESSION['id'];	

				if($teamid == 103){
				$sql = "select * from sp where team_id > 101 ";
				
			} else{
				$sql = "select * from sp where team_id ='$teamid' ";
				

				}
				
				
				$result = $connt->query($sql);

				if($result->num_rows > 0 ){
					
				?>
				
			<?php
				while ($row = $result->fetch_assoc()){ 

			?>
			<form action="oto_update.php" method="post">
			<tr class="row100">
				
				<td class="column100 column1" data-column="column1" style="padding-left: 20px; padding-right:20px;"><?php echo $row['name']; ?></td>
				<td class="column100 column2" data-column="column2" style="width:140px;"><?php echo $row['id']; ?> <input type="hidden" name="id[]"  value="<?php echo $row['id']; ?>"> </td>
				<td class="column100 column3" data-column="column3">
					<select name="sun[]"  class="text" >
						<option value="<?php echo $row['o_sunday']; ?>" style="color:#80808082;"   selected > <?php echo $row['o_sunday']; ?> </option>
						<option value="" >  </option>
						<option value="One to One" > One to One</option>
						
					</select>
				</td>
				
				<td class="column100 column4" data-column="column4">
				<select name="mon[]"  class="text" >
						<option value="<?php echo $row['o_monday']; ?>" style="color:#a9a8a882;"    selected> <?php echo $row['o_monday']; ?> </option>
						<option value="" >  </option>
						<option value="One to One " > One to One </option>
						
					</select>

				</td>
				
				<td class="column100 column5" data-column="column5">
				<select name="tues[]"  class="text" >
						<option value="<?php echo $row['o_tuesday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['o_tuesday']; ?> </option>
						<option value="" > </option>
						<option value="One to One " > One to One </option>
						
					</select>
				</td>
				<td class="column100 column6" data-column="column6">
				<select name="wednes[]"  class="text" >
						<option value="<?php echo $row['o_wednesday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['o_wednesday']; ?> </option>
						<option value="" > </option>
						<option value="One to One " > One to One </option>
						
					</select>
				</td>
				<td class="column100 column7" data-column="column7">
				<select name="thurs[]"  class="text" >
						<option value="<?php echo $row['o_thursday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['o_thursday']; ?> </option>
						<option value="" > </option>
						<option value="One to One " > One to One </option>
						
					</select>

				</td>
				<td class="column100 column8" data-column="column8">
				<select name="fri[]"  class="text" >
						<option value="<?php echo $row['o_friday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['o_friday']; ?> </option>
						<option value="" > </option>
						<option value="One to One " > One to One </option>
						
					</select>

				</td>
				
				<td class="column100 column9" data-column="column9">
				<select name="satur[]"  class="text" >
						<option value="<?php echo $row['o_saturday']; ?>" style="color:#a9a8a882;"   selected> <?php echo $row['o_saturday']; ?> </option>
						<option value="" > </option>
						<option value="One to One " > One to One </option>
						
					</select>
				</td>


				<td class="column100 column10" data-column="column10">
				<select name="fr[]"  class="text" >
						<option value="<?php echo $row['fr']; ?>" style="color:#a9a8a882;"   selected  > <?php echo $row['fr']; ?> </option>
						<option value="" > </option>
						<option value="8 AM" > 8 AM </option>
						<option value="9 AM" > 9 AM </option>
						<option value="10 AM" > 10 AM </option>
						<option value="11 AM" > 11 AM </option>
						<option value="12 PM" > 12 PM </option>
						<option value="1 PM" > 1 PM </option>
						<option value="2 PM" > 2 PM </option>
						<option value="3 PM" > 3 PM </option>
						<option value="4 PM" > 4 PM </option>
						<option value="5 PM" > 5 PM </option>
						<option value="6 PM" > 6 PM </option>
						<option value="7 PM" > 7 PM </option>
						<option value="8 PM" > 8 PM </option>
						<option value="9 PM" > 9 PM </option>
						<option value="10 PM" > 10 PM </option>
						<option value="11 PM" > 11 PM </option>
						<option value="12 AM" > 12 AM </option>
						<option value="1 AM" > 1 AM </option>
						<option value="2 AM" > 2 AM </option>
						<option value="3 AM" > 3 AM </option>
						<option value="4 AM" > 4 AM </option>
						<option value="5 AM" > 5 AM </option>
						<option value="6 AM" > 6 AM </option>
						<option value="7 AM" > 7 AM </option>




						
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
	</div>
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