<?php
include'../config/connect.php';
require_once '../config/classes/phpexcel.php';
$objPHPExcel = new PHPExcel();


$sql = "select * from structure order by oracle,id desc   ";
$result = $connt->query($sql);








if($result->num_rows > 0){

$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('0', '1','Oracle');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('1', '1','Agent Teleopti ID');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('2', '1','Avaya');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('3', '1','Name');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('4', '1','Supervisor');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('5', '1','Managers');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('6', '1','LOB');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('7', '1','Wiki User');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('8', '1','First Login Date');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('9', '1','Gender');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('10', '1','Status');
$objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('11', '1','date');



$oracle = '';
$row = 2; // 1-based index
while($rows = $result->fetch_assoc()) {

		if($rows['oracle'] == $oracle){
			continue;
		}

   
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('0', $row, $rows['oracle']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('1', $row, $rows['tel_opti']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('2', $row, $rows['avaya']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('3', $row, $rows['name']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('4', $row, $rows['sv']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('5', $row, $rows['manger']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('6', $row, $rows['lob']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('7', $row, $rows['wiki_user']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('8', $row, $rows['first_login_date']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('9', $row, $rows['gender']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('10', $row, $rows['status']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValueByColumnAndRow('11', $row, $rows['date']);
      
       $oracle = $rows['oracle'];
    
    $row++;
}
};

$objPHPExcel->getActiveSheet(0)->setTitle('Prepaid ');






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