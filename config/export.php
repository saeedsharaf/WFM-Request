<?php
error_reporting(0);
include'connect.php';
require_once 'classes/phpexcel.php';
$objPHPExcel = new PHPExcel();



$special_request = '';

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

$annual="select * from p_sp where sunday = 'Annual' or monday = 'Annual' or tuesday = 'Annual' or wednesday = 'Annual' or thursday = 'Annual' or friday = 'Annual' or saturday = 'Annual'";
//select one to one 
$oto ="select * from p_sp where o_sunday != '' or o_monday != '' or o_tuesday != '' or o_wednesday != '' or o_thursday != '' or o_friday != '' or o_saturday != ''";
// select task
$task="select * from p_sp where t_sunday != '' or t_monday != '' or t_tuesday != '' or t_wednesday != '' or t_thursday != '' or t_friday != '' or t_saturday != ''";

// select DayOFF
$dayoff="select * from p_sp where sunday = 'Day OFF' or monday = 'Day OFF' or tuesday = 'Day OFF' or wednesday = 'Day OFF' or thursday = 'Day OFF' or friday = 'Day OFF' or saturday = 'Day OFF'";

//select team meeting
$team_meeting="select * from p_sp where tdate != '' and ttime != '' order by team_id desc";


//select unpaid and planned sick
$special_request="select * from p_sp where sunday = 'Planned Sick' or monday = 'Planned Sick' or tuesday = 'Planned Sick' or wednesday = 'Planned Sick' or thursday = 'Planned Sick' or friday = 'Planned Sick' or saturday = 'Planned Sick' or sunday = 'UnPaid' or monday = 'UnPaid' or tuesday = 'UnPaid' or wednesday = 'UnPaid' or thursday = 'UnPaid' or friday = 'UnPaid' or saturday = 'UnPaid'";

//select shift
$shift = "select * from p_sp where sunday != '' or monday != '' or tuesday != '' or wednesday != '' or thursday != '' or friday != '' or saturday != '' ";

$sql_refund = "select * from p_sp where r_oracle != ''";

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
// select annual
$annual="select * from sp where sunday = 'Annual' or monday = 'Annual' or tuesday = 'Annual' or wednesday = 'Annual' or thursday = 'Annual' or friday = 'Annual' or saturday = 'Annual'";
//select one to one 
$oto ="select * from sp where o_sunday != '' or o_monday != '' or o_tuesday != '' or o_wednesday != '' or o_thursday != '' or o_friday != '' or o_saturday != ''";
// select task
$task="select * from sp where t_sunday != '' or t_monday != '' or t_tuesday != '' or t_wednesday != '' or t_thursday != '' or t_friday != '' or t_saturday != ''";

// select DayOFF
$dayoff="select * from sp where sunday = 'Day OFF' or monday = 'Day OFF' or tuesday = 'Day OFF' or wednesday = 'Day OFF' or thursday = 'Day OFF' or friday = 'Day OFF' or saturday = 'Day OFF'";

//select team meeting
$team_meeting="select * from sp where tdate != '' and ttime != '' order by team_id desc";


//select unpaid and planned sick
$special_request="select * from sp where sunday = 'Planned Sick' or monday = 'Planned Sick' or tuesday = 'Planned Sick' or wednesday = 'Planned Sick' or thursday = 'Planned Sick' or friday = 'Planned Sick' or saturday = 'Planned Sick' or sunday = 'UnPaid' or monday = 'UnPaid' or tuesday = 'UnPaid' or wednesday = 'UnPaid' or thursday = 'UnPaid' or friday = 'UnPaid' or saturday = 'UnPaid'";

//select shift
$shift = "select * from sp where sunday != '' or monday != '' or tuesday != '' or wednesday != '' or thursday != '' or friday != '' or saturday != '' ";

$sql_refund = "select * from sp where r_oracle != ''";
}

// color cell
function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(0)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor('A1:K2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:K2')->getFont()->setColor( $phpColor );
///////////////////////////////////////////////////////////////////////////////////////////////

// center text

 $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

    // auto fit col

   for($col = 'A'; $col !== 'L'; $col++) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}





/////////////////////////////////////////////////////////////////////////////////////////

$result = $connt->query($annual);

$end_rows = 'K' . ($result->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(0)->getStyle($f)->applyFromArray($BStyle);

///////////////////////////////////////////////////////////////////////////////////////////////////

if($result->num_rows > 0){

$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C1:C2');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('9', '1','Saturday');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('10', '1','Periority');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('k1:k2');

$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index
while($rows = $result->fetch_assoc()) {
	if($rows['sunday'] != 'Annual' ){

		$rows['sunday'] = '' ;

	}

	 if ($rows['monday'] != 'Annual' ){

		$rows['monday'] = '' ;

	}

 	if ($rows['tuesday'] != 'Annual' ) {
		$rows['tuesday'] = '' ;
	}

	if ($rows['wednesday'] != 'Annual' ) {
		$rows['wednesday'] = '' ;
	}

	if ($rows['thursday'] != 'Annual' ) {
		$rows['thursday'] = '' ;
	}

	if ($rows['friday'] != 'Annual' ) {
		$rows['friday'] = '' ;
	}

	if ($rows['saturday'] != 'Annual') {
		$rows['saturday'] = '' ;
	}
    
   
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('0', $row, $rows['name']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('1', $row, $rows['id']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('2', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('3', $row, $rows['sunday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('4', $row, $rows['monday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('5', $row, $rows['tuesday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('6', $row, $rows['wednesday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('7', $row, $rows['thursday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('8', $row, $rows['friday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('9', $row, $rows['saturday']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('10', $row, $rows['pr']);
      
       
    
    $row++;
}
};

$objPHPExcel->getActiveSheet()->setTitle('Annual ');




//create anew sheet for one to one 





////// cell color ///////////////////////////////////////////////
$objWorkSheet = $objPHPExcel->createSheet(1);

function cellColor1($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(1)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor1('A1:K2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(1)->getStyle('A1:K2')->getFont()->setColor( $phpColor );
////////////////////////////////////////////////////////////////////////////////////////////////////////

 $objPHPExcel->setActiveSheetIndex(1)->getStyle('A1:M1322')->applyFromArray($style);

   for($col = 'A'; $col !== 'L'; $col++) {
    $objPHPExcel->setActiveSheetIndex(1)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}



$result_oto = $connt->query($oto);


///////////////////////////////////////////////////////////////// set border ////////////////////////////////////

$end_rows = 'K' . ($result_oto->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(1)->getStyle($f)->applyFromArray($BStyle);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if($result_oto->num_rows > 0){
	

$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(1)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(1)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(1)->mergeCells('C1:C2');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('9', '1','Saturday');
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('10', '1','From');
$objPHPExcel->setActiveSheetIndex(1)->mergeCells('k1:k2');

$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index


while($rows = $result_oto->fetch_assoc()){


		$objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('0', $row, $rows['name']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('1', $row, $rows['id']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('2', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('3', $row, $rows['o_sunday']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('4', $row, $rows['o_monday']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('5', $row, $rows['o_tuesday']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('6', $row, $rows['o_wednesday']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('7', $row, $rows['o_thursday']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('8', $row, $rows['o_friday']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('9', $row, $rows['o_saturday']);
        $objPHPExcel->setActiveSheetIndex(1)->setCellValueByColumnAndRow('10', $row, $rows['fr']);

$row++;

}

	}



	
	$objPHPExcel->setActiveSheetIndex(1)->setTitle('One to One');







//create anew sheet for Team Meeting
$objWorkSheet = $objPHPExcel->createSheet(2);



function cellColor2($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(2)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor2('A1:C2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(2)->getStyle('A1:C2')->getFont()->setColor( $phpColor );
///////////////////////////////////////////////////////////////////////////////////////////////////////



  for($col = 'A'; $col !== 'D'; $col++) {
    $objPHPExcel->setActiveSheetIndex(2)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}



///////////////////////////////////////////////////////////////////////////////



$result_meeting = $connt->query($team_meeting);



///////////////////////////////////////////////////////////////// set border ////////////////////////////////////

$end_rows = 'C' . ($result_meeting->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(2)->getStyle($f)->applyFromArray($BStyle);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





if($result_meeting->num_rows > 0){
	

$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('0', '1','SV');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('1', '1','Day');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('2', '1','From');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('C1:C2');


$row = 3; // 1-based index
$rows['sv'] = '';
$sv = '';


while($rows = $result_meeting->fetch_assoc()){
	
		if($rows['sv'] == $sv){
			continue;
		}

		$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('0', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('1', $row, $rows['tdate']);
        $objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('2', $row, $rows['ttime']);
      
        
        $sv = $rows['sv'];

$row++;

}

	}

	
	$objPHPExcel->setActiveSheetIndex(2)->setTitle('Team Meeting');	



	// crate anew sheet for task



$objWorkSheet = $objPHPExcel->createSheet(3);





//set color ///////////////////////////////////////////////////////////////////////////////////
function cellColor3($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(3)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor3('A1:L2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(3)->getStyle('A1:L2')->getFont()->setColor( $phpColor );
///////////////////////////////////////////////////////////////////////////////////////////////////////////////



    // auto fit col

   for($col = 'A'; $col !== 'M'; $col++) {
    $objPHPExcel->setActiveSheetIndex(3)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

///////////////////////////////////////////////////////////////////////////////

$result_task = $connt->query($task);


///////////////////////////////////////////////////////////////// set border ////////////////////////////////////

$end_rows = 'L' . ($result_task->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(3)->getStyle($f)->applyFromArray($BStyle);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





if($result_task->num_rows > 0){
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(3)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(3)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(3)->mergeCells('C1:C2');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('9', '1','Saturday');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('10', '1','From');
$objPHPExcel->setActiveSheetIndex(3)->mergeCells('k1:k2');
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('11', '1','To');
$objPHPExcel->setActiveSheetIndex(3)->mergeCells('l1:l2');

$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index

	while($rows = $result_task->fetch_assoc()){
		$objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('0', $row, $rows['name']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('1', $row, $rows['id']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('2', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('3', $row, $rows['t_sunday']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('4', $row, $rows['t_monday']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('5', $row, $rows['t_tuesday']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('6', $row, $rows['t_wednesday']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('7', $row, $rows['t_thursday']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('8', $row, $rows['t_friday']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('9', $row, $rows['t_saturday']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('10', $row, $rows['t_from']);
        $objPHPExcel->setActiveSheetIndex(3)->setCellValueByColumnAndRow('11', $row, $rows['t_to']);

        $row++;


	}

}


		$objPHPExcel->setActiveSheetIndex(3)->setTitle('Task'); // rename sheet	

//create anew sheet for refund team 
$objWorkSheet = $objPHPExcel->createSheet(4);


//////// set color 

function cellColor4($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(4)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor4('A1:C2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(4)->getStyle('A1:C2')->getFont()->setColor( $phpColor );
////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    // auto fit col

   for($col = 'A'; $col !== 'D'; $col++) {
    $objPHPExcel->setActiveSheetIndex(4)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

///////////////////////////////////////////////////////////////////////////////

$refund_result = $connt->query($sql_refund);


///////////////////////////////////////////////////////////////// set border ////////////////////////////////////

$end_rows = 'C' . ($refund_result->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(4)->getStyle($f)->applyFromArray($BStyle);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




if($refund_result->num_rows > 0){
$objPHPExcel->setActiveSheetIndex(4)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(4)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(4)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(4)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(4)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(4)->mergeCells('C1:C2');

$row = 3; // 1-based index


while($rowss = $refund_result->fetch_assoc()){


		$objPHPExcel->setActiveSheetIndex(4)->setCellValueByColumnAndRow('0', $row, $rowss['r_name']);
        $objPHPExcel->setActiveSheetIndex(4)->setCellValueByColumnAndRow('1', $row, $rowss['r_oracle']);
        $objPHPExcel->setActiveSheetIndex(4)->setCellValueByColumnAndRow('2', $row, $rowss['r_sv']);

$row++;

}

	}
	

	$objPHPExcel->setActiveSheetIndex(4)->setTitle('Refund Team'); // rename sheet	
	

//create anew sheet for day off

$objWorkSheet = $objPHPExcel->createSheet(5);

//////////////////////////////////// set color //////////////////////////////////

function cellColor5($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(5)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor5('A1:J2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(5)->getStyle('A1:J2')->getFont()->setColor( $phpColor );
/////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // auto fit col

   for($col = 'A'; $col !== 'K'; $col++) {
    $objPHPExcel->setActiveSheetIndex(5)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

///////////////////////////////////////////////////////////////////////////////


$dayoff_result = $connt->query($dayoff);


///////////////////////////////////////////////////////////////// set border ////////////////////////////////////

$end_rows = 'J' . ($dayoff_result->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(5)->getStyle($f)->applyFromArray($BStyle);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if($dayoff_result->num_rows > 0){

$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(5)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(5)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(5)->mergeCells('C1:C2');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('9', '1','Saturday');

$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index
while($rowa = $dayoff_result->fetch_assoc()){

	if($rowa['sunday'] != 'Day OFF' ){

		$rowa['sunday'] = '' ;

	}

	 if ($rowa['monday'] != 'Day OFF' ){

		$rowa['monday'] = '' ;

	}

 	if ($rowa['tuesday'] != 'Day OFF' ) {
		$rowa['tuesday'] = '' ;
	}

	if ($rowa['wednesday'] != 'Day OFF' ) {
		$rowa['wednesday'] = '' ;
	}

	if ($rowa['thursday'] != 'Day OFF' ) {
		$rowa['thursday'] = '' ;
	}

	if ($rowa['friday'] != 'Day OFF' ) {
		$rowa['friday'] = '' ;
	}

	if ($rowa['saturday'] != 'Day OFF') {
		$rowa['saturday'] = '' ;
	}
    
   
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('0', $row, $rowa['name']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('1', $row, $rowa['id']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('2', $row, $rowa['sv']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('3', $row, $rowa['sunday']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('4', $row, $rowa['monday']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('5', $row, $rowa['tuesday']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('6', $row, $rowa['wednesday']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('7', $row, $rowa['thursday']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('8', $row, $rowa['friday']);
        $objPHPExcel->setActiveSheetIndex(5)->setCellValueByColumnAndRow('9', $row, $rowa['saturday']);
      
       
    
    $row++;
}
};

$objPHPExcel->getActiveSheet(5)->setTitle('Day OFF');




//create anew sheet for special request
$objWorkSheet = $objPHPExcel->createSheet(6);



//////////////////////////////////// set color //////////////////////////////////

function cellColor6($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(6)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor6('A1:J2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(6)->getStyle('A1:J2')->getFont()->setColor( $phpColor );
/////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // auto fit col

   for($col = 'A'; $col !== 'K'; $col++) {
    $objPHPExcel->setActiveSheetIndex(6)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

///////////////////////////////////////////////////////////////////////////////



$special_request_result = $connt->query($special_request);

///////////////////////////////////////////////////////////////// set border ////////////////////////////////////

$end_rows = 'J' . ($special_request_result->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(6)->getStyle($f)->applyFromArray($BStyle);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if($dayoff_result->num_rows > 0){

$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(6)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(6)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(6)->mergeCells('C1:C2');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('9', '1','Saturday');

$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index
while($rows = $special_request_result->fetch_assoc()){

	if($rows['sunday'] != 'Planned Sick' and $rows['sunday'] != 'UnPaid' ){

		$rows['sunday'] = '' ;

	}

	 if ($rows['monday'] != 'Planned Sick' and $rows['monday'] != 'UnPaid'){

		$rows['monday'] = '' ;

	}

 	if ($rows['tuesday'] != 'Planned Sick' and $rows['tuesday'] != 'UnPaid') {
		$rows['tuesday'] = '' ;
	}

	if ($rows['wednesday'] != 'Planned Sick' and $rows['wednesday'] != 'UnPaid') {
		$rows['wednesday'] = '' ;
	}

	if ($rows['thursday'] != 'Planned Sick' and $rows['thursday'] != 'UnPaid') {
		$rows['thursday'] = '' ;
	}

	if ($rows['friday'] != 'Planned Sick' and $rows['friday'] != 'UnPaid') {
		$rows['friday'] = '' ;
	}

	if ($rows['saturday'] != 'Planned Sick' and $rows['saturday'] != 'UnPaid') {
		$rows['saturday'] = '' ;
	}

        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('0', $row, $rows['name']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('1', $row, $rows['id']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('2', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('3', $row, $rows['sunday']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('4', $row, $rows['monday']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('5', $row, $rows['tuesday']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('6', $row, $rows['wednesday']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('7', $row, $rows['thursday']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('8', $row, $rows['friday']);
        $objPHPExcel->setActiveSheetIndex(6)->setCellValueByColumnAndRow('9', $row, $rows['saturday']);
      
       
    
    $row++;
}
}

$objPHPExcel->getActiveSheet(6)->setTitle('Special Request');



//create anew sheet for shift
$objWorkSheet = $objPHPExcel->createSheet(7);


//////////////////////////////////// set color //////////////////////////////////

function cellColor7($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->setActiveSheetIndex(7)->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));


}

cellColor7('A1:K2', '16365c');
//fontColor('A1:M1', '16365c');

//cellColor('A17:I17', 'F28A8C');
//cellColor('A30:Z30', 'F28A8C');

$phpColor = new PHPExcel_Style_Color();
$phpColor->setRGB('ffffff'); 
$objPHPExcel->setActiveSheetIndex(7)->getStyle('A1:K2')->getFont()->setColor( $phpColor );
/////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // auto fit col

   for($col = 'A'; $col !== 'L'; $col++) {
    $objPHPExcel->setActiveSheetIndex(7)
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

///////////////////////////////////////////////////////////////////////////////


$shift_result = $connt->query($shift);


///////////////////////////////////////////////////////////////// set border ////////////////////////////////////

$end_rows = 'K' . ($shift_result->num_rows + 2); // to get number of rows after export

$f = "A1:" . $end_rows ; // to get the range to set border to it  
//echo $f;

$BStyle = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->setActiveSheetIndex(7)->getStyle($f)->applyFromArray($BStyle);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if($shift_result->num_rows > 0){

$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(7)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(7)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(7)->mergeCells('C1:C2');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('9', '1','Saturday');
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('10', '1','Periority');
$objPHPExcel->setActiveSheetIndex(7)->mergeCells('k1:k2');

$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index
while($rows = $shift_result->fetch_assoc()) {
/*
  if($rows['sunday'] == '' and $rows['monday'] == '' and $rows['tuesday'] == '' and $rows['wednesday'] == '' and $rows['thursday'] == '' and $rows['friday'] == '' and $rows['saturday'] == ''){
		continue;
	}
*/
  if($rows['sunday'] == 'Day OFF' and $rows['monday'] == 'Day OFF' and $rows['tuesday'] == 'Day OFF' and $rows['wednesday'] == 'Day OFF' and $rows['thursday'] == 'Day OFF' and $rows['friday'] == 'Day OFF' and $rows['saturday'] == 'Day OFF'){
		continue;
	}

	if($rows['sunday'] == 'UnPaid' and $rows['monday'] == 'UnPaid' and $rows['tuesday'] == 'UnPaid' and $rows['wednesday'] == 'UnPaid' and $rows['thursday'] == 'UnPaid' and $rows['friday'] == 'UnPaid' and $rows['saturday'] == 'UnPaid'){
		continue;
	}


	if($rows['sunday'] == 'Planned Sick' and $rows['monday'] == 'Planned Sick' and $rows['tuesday'] == 'Planned Sick' and $rows['wednesday'] == 'Planned Sick' and $rows['thursday'] == 'Planned Sick' and $rows['friday'] == 'Planned Sick' and $rows['saturday'] == 'Planned Sick'){
		continue;
	}

	if($rows['sunday'] == 'Annual' and $rows['monday'] == 'Annual' and $rows['tuesday'] == 'Annual' and $rows['wednesday'] == 'Annual' and $rows['thursday'] == 'Annual' and $rows['friday'] == 'Annual' and $rows['saturday'] == 'Annual'){
		continue;
	}


	if($rows['sunday'] == 'Planned Sick' or $rows['sunday'] == 'UnPaid' or $rows['sunday'] == 'Day OFF' or $rows['sunday'] == 'Annual'){

		$rows['sunday'] = '' ;

	}

	 if ($rows['monday'] == 'Planned Sick' or $rows['monday'] == 'UnPaid' or $rows['monday'] == 'Day OFF' or $rows['monday'] == 'Annual'){

		$rows['monday'] = '' ;

	}

 	if ($rows['tuesday'] == 'Planned Sick' or $rows['tuesday'] == 'UnPaid' or $rows['tuesday'] == 'Day OFF' or $rows['tuesday'] == 'Annual') {

		$rows['tuesday'] = '' ;
	}

	if ($rows['wednesday'] == 'Planned Sick' or $rows['wednesday'] == 'UnPaid' or $rows['wednesday'] == 'Day OFF' or $rows['wednesday'] == 'Annual') {

		$rows['wednesday'] = '' ;
	}

	if ($rows['thursday'] == 'Planned Sick' or $rows['thursday'] == 'UnPaid' or $rows['thursday'] == 'Day OFF' or $rows['thursday'] == 'Annual') {


		$rows['thursday'] = '' ;
	}

	if ($rows['friday'] == 'Planned Sick' or $rows['friday'] == 'UnPaid' or $rows['friday'] == 'Day OFF' or $rows['friday'] == 'Annual') {

		$rows['friday'] = '' ;
	}

	if ($rows['saturday'] == 'Planned Sick' or $rows['saturday'] == 'UnPaid' or $rows['saturday'] == 'Day OFF' or $rows['saturday'] == 'Annual') {

		$rows['saturday'] = '' ;
	}


	  if($rows['sunday'] == '' and $rows['monday'] == '' and $rows['tuesday'] == '' and $rows['wednesday'] == '' and $rows['thursday'] == '' and $rows['friday'] == '' and $rows['saturday'] == ''){
		continue;
	}
	

        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('0', $row, $rows['name']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('1', $row, $rows['id']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('2', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('3', $row, $rows['sunday']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('4', $row, $rows['monday']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('5', $row, $rows['tuesday']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('6', $row, $rows['wednesday']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('7', $row, $rows['thursday']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('8', $row, $rows['friday']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('9', $row, $rows['saturday']);
        $objPHPExcel->setActiveSheetIndex(7)->setCellValueByColumnAndRow('10', $row, $rows['pr']);

      
       
    
    $row++;
}
};

$objPHPExcel->getActiveSheet(7)->setTitle('Special Shifts ');


$objPHPExcel->setActiveSheetIndex(0)->getStyle('A1:K396')->applyFromArray($style);
$objPHPExcel->setActiveSheetIndex(1)->getStyle('A1:K396')->applyFromArray($style);
$objPHPExcel->setActiveSheetIndex(2)->getStyle('A1:C396')->applyFromArray($style);
$objPHPExcel->setActiveSheetIndex(3)->getStyle('A1:L396')->applyFromArray($style);
$objPHPExcel->setActiveSheetIndex(4)->getStyle('A1:C396')->applyFromArray($style);
$objPHPExcel->setActiveSheetIndex(5)->getStyle('A1:J396')->applyFromArray($style);
$objPHPExcel->setActiveSheetIndex(6)->getStyle('A1:J396')->applyFromArray($style);
$objPHPExcel->setActiveSheetIndex(7)->getStyle('A1:K396')->applyFromArray($style);


	$objPHPExcel->setActiveSheetIndex(0);



// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Wfm Request.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

//<select agent from ();


?>