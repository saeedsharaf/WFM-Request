<?php


	$agents = array( );
	foreach($agents as $ids){


		$an_sun = "select * from annual where sunday = 'Annual' or sunday = 'Emergency' or sunday = 'Eceptional' or sunday = 'Available Annual' and oracle = $id  ";

		$an_mon = "select * from annual where monday = 'Annual' or monday = 'Emergency' or monday = 'Eceptional' or monday = 'Available Annual' and oracle = $id  ";

		$an_tues = "select * from annual where tuesday = 'Annual' or tuesday = 'Emergency' or tuesday = 'Eceptional' or tuesday = 'Available Annual' and oracle = $id  ";

		$an_wednes = "select * from annual where wednesday = 'Annual' or wednesday = 'Emergency' or wednesday = 'Eceptional' or wednesday = 'Available Annual' and oracle = $id  ";

		$an_thurs = "select * from annual where thursday = 'Annual' or thursday = 'Emergency' or thursday = 'Eceptional' or thursday = 'Available Annual' and oracle = $id  ";

		$an_fri = "select * from annual where friday = 'Annual' or friday = 'Emergency' or friday = 'Eceptional' or friday = 'Available Annual' and oracle = $id  ";

		$an_satur = "select * from annual where saturday = 'Annual' or saturday = 'Emergency' or saturday = 'Eceptional' or saturday = 'Available Annual' and oracle = $id  ";


		$sun_annual= $connt->query($an_sun);
		$mon_annual= $connt->query($an_mon);
		$tues_annual= $connt->query($an_tues);
		$wednes_annual= $connt->query($an_wednes);
		$thurs_annual= $connt->query($an_thurs);
		$fri_annual= $connt->query($an_fri);
		$satur_annual= $connt->query($an_satur);

		$bal = "select * from annual where oracle = '$id' ";
		$balance = $connt->query($bal);

		$re_balance = $balance->fetch_assoc();

		

		$remaining_annual = ($re_balance['balance'])  -  ($sun_annual->num_rows + $mon_annual->num_rows +  $tues_annual->num_rows + $wednes_annual->num_rows + $thurs_annual->num_rows + $fri_annual->num_rows + $satur_annual->num_rows);


		
		
		$insert = "update sp set annual_balance = '$remaining_annual' where id = '$ids' ";

		$connt->query($insert) ;
		
		}