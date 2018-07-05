<?php
/*
require_once 'classes/phpexcel.php';

$objPHPEXcel = new PHPExcel();
$x = 0;
while($x < 5){
$objPHPEXcel->getactivesheet()->setcellvalue('A1','hellow');
$x++;
}

header("content-type: application/'xls");
header("content-disposition:attachement; filename=WFM Request.xls") ;
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');





$styleArray = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => 'ffffff'),
        
        
        
    ));

    $objPHPExcel->getActiveSheet()->getCell('A1')->setValue('Some text');
	$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('B1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('C1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('D1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('E1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('G1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('G2')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('H1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('H2')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('I1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('I2')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('J1')->applyFromArray($styleArray);
	$objPHPExcel->getActiveSheet()->getStyle('J2')->applyFromArray($styleArray);


	



function cellColor($cells,$color){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        )
    ));
}

cellColor('A1:J2', '0101bb');

*/

include'connect.php';
require_once 'classes/phpexcel.php';
$objPHPExcel = new PHPExcel();

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

	$sql="select * from p_sp";
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

$sql="select * from sp";
$sql_refund = "select * from sp where r_oracle != ''";
}

$result = $connt->query($sql);
$refund_result = $connt->query($sql_refund);

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

$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index
while($rows = $result->fetch_assoc()) {
    
   
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
      
       
    
    $row++;
}
};

$objPHPExcel->getActiveSheet()->setTitle('Annual ');




//create anew sheet for one to one 
$objWorkSheet = $objPHPExcel->createSheet(1);
$result = $connt->query($sql);
if($result->num_rows > 0){
	

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


while($rows = $result->fetch_assoc()){


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







//create anew sheet for one to one 
$objWorkSheet = $objPHPExcel->createSheet(2);
$result = $connt->query($sql);
if($result->num_rows > 0){
	

$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('A1:A2');
$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('B1:B2');
$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('C1:C2');
$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('3', '1','Day');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('D1:D2');
$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('4', '1','From');
$objPHPExcel->setActiveSheetIndex(2)->mergeCells('E1:E2');


$row = 3; // 1-based index


while($rows = $result->fetch_assoc()){


		$objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('0', $row, $rows['name']);
        $objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('1', $row, $rows['id']);
        $objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('2', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('3', $row, $rows['tdate']);
        $objPHPExcel->setActiveSheetIndex(2)->setCellValueByColumnAndRow('4', $row, $rows['ttime']);
        
        

$row++;

}

	}

	
	$objPHPExcel->setActiveSheetIndex(2)->setTitle('Team Meeting');	



	// crate anew sheet for team meeting
$objWorkSheet = $objPHPExcel->createSheet(3);
$result = $connt->query($sql);
if($result->num_rows > 0){
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

	while($rows = $result->fetch_assoc()){
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

$refund_result = $connt->query($sql_refund);
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

	
	$objPHPExcel->setActiveSheetIndex(4)->setTitle('Refund Team');	




	$objPHPExcel->setActiveSheetIndex(0);

/*
// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

// Miscellaneous glyphs, UTF-8
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');
            

// Rename worksheet
//$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
//$objPHPExcel->setActiveSheetIndex(0);

$objWorkSheet = $objPHPExcel->createSheet(1);

//while($row = $result->fetch_array()){
 
 $objPHPExcel->setActiveSheetIndex(1)
 			->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');
            
$objPHPExcel->getActiveSheet()->setTitle('saeed');


//$objPHPExcel->setActiveSheetIndex(0);
*/

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