<?php
include'config/connect.php';

$check = "select st from sp"; // select data base previous data bas to check edit 
	$ch_result = $connt->query($check);
	$rows = $ch_result->fetch_assoc();
	if( $rows['st'] == 1){
		$del = "delete from p_sp";
		$connt->query($del); // delete previous table

		$sql = "insert into p_sp select * from sp";
		$connt->query($sql);
		
		$reset ="UPDATE  sp SET  sunday = '', sunli ='0', monday ='', monli ='0', tuesday ='', tuesli ='0', wednesday ='', wednesli ='0', thursday ='', thursli ='0', friday ='', frili ='0', saturday ='', saturli ='0' , st = '0' , pr = '', tdate='' , ttime= '', o_sunday='', o_monday = '' , o_tuesday = '', o_wednesday = '', o_thursday = '' , o_friday = '', o_saturday = '', fr = '', t_sunday='', t_monday='', t_tuesday='', t_wednesday='', t_thursday='', t_friday='', t_saturday='', t_from='', t_to='' , r_oracle = '', r_name = '', r_sv = '' ";
		$connt->query($reset);
	}

	if($connt->query($reset) === true){
		echo 'done' ;

	}else{
		echo 'not';
	}


		?>