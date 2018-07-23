<?php
session_start();
error_reporting(0);
include'config.php';
?>
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


table{
	 width: 95%;
    margin: 0 auto;
    font-size: 14px;
    border-radius: 7px;
    box-shadow: 0px 11px 13px -8px #696666;
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

#alret{
    height: 100px;
    width: 30%;
    background-color: #f37136e8;
    position: fixed;
    top: 50%;
    left: 35%;
    text-align: center;
    border-radius: 7px;
    transition: 0.5s;
}

.search{
	margin: 0 auto;
    padding-left: 15px;
    border-radius: 15px;
    height: 32px;
}

#table{
	display:none;
}

.result{
	width: 100%;
	height:50px;
	margin: 0 auto;
	text-align: center;
	margin-top: 50px;

}

#status{
	background-color:#2fc323;
	 height: 45px;
	  width: 280px;
	  position: fixed;
	  text-align: center;
	  border-radius: 25px;
	  left: 40%;
}

</style>
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
					<a href="../config/task.php" title="Task"><img class="left1" src="../style/task.png" width="25px" height="25px" style="margin:5px;margin-top:12px" /></a> 
					<a href="../config/oto.php" title="One to One"><img class="left1" src="../style/coaching1.png" width="30px" height="35px" style="margin:5px;" /></a>
					<a href="structure.php" title="Structure"><img class="left1" src="../style/struc.png" width="25px" height="30px" style="margin:9px;" /></a>
					<?php
					if($_SESSION['id'] == 9){
						?>
					<a href="../config/refund.php" title="Refund Team"><img class="left1" src="../style/refund.png" width="30px" height="30px" style="margin:5px;margin-top:8px" /></a>
					<?php
					}
					?>
					<a href="../config/query.php" title="Home"><img class="left1" src="../style/home1.png" width="25px" height="25px" style="margin:5px; margin-top:11px; margin-right: 10px; " /></a> 
					
					<?php
				}


				
			

				 ?>
			</map>
			</div>

		</div>
	</div>

	

<div style="margin-bottom:15px;">

	<form action="" method="post">
		<input type="search" name="search" placeholder="Search by Oracle" class="search" style="font-size: 14px">

	</form>

	<form action="export.php" method="get">
		<input type="submit" name="export" value="Export" style="width:100px; height:30px;float: right; margin-right: 50px" class="submit">
	</form>

</div>

	
		
			<?php
			if($result->num_rows > 0){
				?>
				<table id="table">
			<thead>
				<tr style="background-color: #008cff ;color: white;height: 30px; font-size: 14px;">
					<th>Oracle</th>
					<th>Agent Teleopti ID</th>
					<th>Avaya</th>
					<th>Name</th>
					<th>Supervisor</th>
					<th>Managers</th>
					<th>LOB</th>
					<th>Wiki User</th>
					
					<th>Satus</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>

			<?php
			while($row = $result->fetch_assoc()){
			?>	

				<tr style="height: 38px;">
					<td> <?php echo $row['oracle'] ; ?> </td>
					<td> <?php echo $row['tel_opti'] ; ?> </td>
					<td> <?php echo $row['avaya'] ; ?> </td>
					<td> <?php echo $row['name'] ; ?> </td>
					<td> <?php echo $row['sv'] ; ?> </td>
					<td> <?php echo $row['manger'] ; ?> </td>
					<td> <?php echo $row['lob'] ; ?> </td>
					<td> <?php echo $row['wiki_user'] ; ?> </td>
					<td> <?php echo $row['status'] ; ?> </td>
					<td> <?php echo $row['date'] ; ?> </td>
				</tr>
				<?php

			}
			include'config.php';
			$row = $result->fetch_assoc()
		
			?>
			</tbody>
			</table>

			<?php 
			if($_SESSION['id'] == 3){

			?>
			<div style="margin-top: 20px;margin-left: 50px;" id="update" >	
			<form id="update" action="update.php" method="post">
			<input type="hidden" name="oracle" value="<?php echo $row['oracle']; ?>">
			<input type="hidden" name="tel_opti" value="<?php echo $row['tel_opti']; ?>">
			<input type="hidden" name="avaya" value="<?php echo $row['avaya']; ?>">
			<input type="hidden" name="name" value="<?php echo $row['name']; ?>">
			<input type="hidden" name="wiki_user" value="<?php echo $row['wiki_user']; ?>">
			<input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">

			<label >Super </label>
			<input type="text" name="super" style="display:inline;margin-left: 25px;font-size: 14px;padding:2px;" required ><br>
			<label>Manger </label>
			<input type="text" name="manger" style="display:inline;margin-left: 13px;font-size: 14px;padding:2px;" required> <br>
			<label>LoB </label>
			<input type="text" name="lob" style="display:inline;margin-left: 38px;font-size: 14px;padding:2px;" required> <br>
			<label>Status </label>
			<input type="text" name="status" style="display:inline;margin-left: 21px;font-size: 14px;padding:2px;" required><br>
			<label>Team ID </label>
			<input type="text" name="team_id" style="display:inline;margin-left: 7px;font-size: 14px;padding:2px;" required>

			<input type="submit" name="submit" style="width:100px; height:30px;" class="submit" value="Submit">
			</form>


		</div>


		

			<?php
			}
		}
		
		?>

<div id="saeed">
</div>

	


		
	


	<?php
	if($result->num_rows > 0){
	?>
	<script>
		document.getElementById('table').style.display ='table';
		
	</script>
	<?php
	
}else{


	?>
	<script>
	//document.getElementById('table').style.display ='none';
	//document.getElementById('update').style.display ='none'
	</script>
	<?php
	echo '<div class="result" >No result Found</div>';
}




	
	

