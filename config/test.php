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

*/
include'connect.php';
require_once 'classes/phpexcel.php';
$objPHPExcel = new PHPExcel();


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
}

$result = $connt->query($sql);

if($result->num_rows > 0){

$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->getActiveSheet(0)->mergeCells('A1:A2');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->getActiveSheet(0)->mergeCells('B1:B2');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->getActiveSheet(0)->mergeCells('C1:C2');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('9', '1','Saturday');

$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index
while($rows = $result->fetch_assoc()) {
    
   
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('0', $row, $rows['name']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('1', $row, $rows['id']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('2', $row, $rows['sv']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('3', $row, $rows['sunday']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('4', $row, $rows['monday']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('5', $row, $rows['tuesday']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('6', $row, $rows['wednesday']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('7', $row, $rows['thursday']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('8', $row, $rows['friday']);
        $objPHPExcel->getActiveSheet(0)->setCellValueByColumnAndRow('9', $row, $rows['saturday']);
      
       
    
    $row++;
}
}

$objPHPExcel->getActiveSheet(0)->setTitle('One to One ');




//create anew sheet 
$objWorkSheet = $objPHPExcel->createSheet(1);
if($result->num_rows > 0){
	

$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('0', '1','Name');
$objPHPExcel->getActiveSheet(1)->mergeCells('A1:A2');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('1', '1','Orcale ID');
$objPHPExcel->getActiveSheet(1)->mergeCells('B1:B2');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('2', '1','SV');
$objPHPExcel->getActiveSheet(1)->mergeCells('C1:C2');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('3', '1','Sunday');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('4', '1','Monday');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('5', '1','Tuesday');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('6', '1','Wednesday');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('7', '1','Thursday');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('8', '1','Friday');
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('9', '1','Saturday');

$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('3', '2',$day[1]);
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('4', '2',$days[0]);
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('5', '2',$days[1]);
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('6', '2',$days[2]);
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('7', '2',$days[3]);
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('8', '2',$days[4]);
$objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('9', '2',$days[5]);

$row = 3; // 1-based index


while($ro = $result->fetch_assoc()) {


		 $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('0', $row, $ro['name']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('1', $row, $ro['id']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('2', $row, $ro['sv']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('3', $row, $ro['o_sunday']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('4', $row, $ro['o_monday']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('5', $row, $ro['o_tuesday']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('6', $row, $ro['o_wednesday']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('7', $row, $ro['o_thursday']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('8', $row, $ro['o_friday']);
        $objPHPExcel->getActiveSheet(1)->setCellValueByColumnAndRow('9', $row, $ro['o_saturday']);

$row++;

}

	}

	
	$objPHPExcel->getActiveSheet()->setTitle('saeed');


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

while($row = $result->fetch_array()){
 
 $objPHPExcel->setActiveSheetIndex(1)
 			->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');
            
$objPHPExcel->getActiveSheet()->setTitle('saeed');


$objPHPExcel->setActiveSheetIndex(0);
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

?>