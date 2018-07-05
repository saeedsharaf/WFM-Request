

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
        border: 1px solid gray;
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

.saeed{
	height:25px;
	text-align: center;
}



</style>
<!--===============================================================================================-->
</head>
<body>


	<?php
include'search.php';

?>
	
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
					<a href="task.php" title="Task"><img class="left1" src="../style/task.png" width="30px" height="30px" style="margin:5px;margin-top:8px" /></a>
					<a href="oto.php" title="One to One"><img class="left1" src="../style/coaching1.png" width="30px" height="35px" style="margin:5px;" /></a>
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
				
					<table data-vertable="ver3" style="width:unset;margin:0 auto;">
						<thead >
							<tr class="row100 head" >
								
								<th class="column100 column2" data-column="column2" rowspan="2">Oracle</th>
								<th class="column100 column1" data-column="column1" rowspan="2" style="padding:0px ">Name</th>
								<th class="column100 column1" data-column="column1" rowspan="2" style="padding:0px ">SV</th>
							</tr>	
	
	<form action="" method="post">
		<?php 
		$x = 0;
		while($x < 15){
			
			?>
	<tr class="row100">
		<td class="column100 column2" data-column="column2" style="width:140px;"><input class="saeed" type="search" name="id[]" placeholder="<?php echo $id[$x] ;?>" value="<?php echo $id[$x]; ?>"></td>
		<input type="hidden" value="<?php echo $id[$x] ; ?> " name="oracle[]">
		<input type="hidden" value="<?php echo $name[$x] ; ?> " name="name[]">
		<input type="hidden" value="<?php echo $sv[$x] ; ?> " name="sv[]">
		<td class="column100 column1" data-column="column1" style="padding-left: 20px; padding-right:20px;"><?php echo $name[$x] ; ?></td>
		<td class="column100 column3" data-column="column3" style="padding-left: 20px; padding-right:20px;"><?php echo $sv[$x] ; ?></td>
	</tr>
		<?php
		$x++;
	}

	?>
		</tbody>
			
			
	</table>


	<div style="width:100% ;height: 50px;margin: 0 auto;margin-top: 20px;display:flex">
		<input type="submit" name="search" style="width:100px; height:30px; position: absolute;left:43%" class="submit" value="Search"> 
		<input type="submit" name="submit" style="width:100px; height:30px; position: absolute;left:55%" class="submit" value="Submit">

	</div>
	

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