<?php

//$test=$_POST['test'];
/*$name2=$_POST['lname'];
$email=$_POST['email'];
$des=$_POST['des'];
*/

$tst=$_POST['test'];
$total=$_POST['tot'];
/*
for($x = 0; $x < $arrlength; $x++) {
    echo $data[$x];
    echo "<br>";
}
*/
//echo "<br>";
/*
for($x = 0; $x < $arr; $x++) {
    echo $Header[$x];
    echo "<br>";
}*/
//echo $BX_QNO;
//The Header Row

//$Header = array('A', 'A','B','B');
//$Header= array('Firstname', 'LastName','email','Designation');
//$data = array('1A', '1B','2A','2B');
//$BX_MARK = array('Firstname', 'LastName','email','Designation');
//$data = array();

//Data to be written in the excel sheet -- Sample Data
//array_push($data, array($name1 ,$name2,$email,$des));

$filename = write_excel1( $tst, $total);


function write_excel1($tst, $total)
{
    set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
/** PHPExcel */
include 'PHPExcel.php';

/** PHPExcel_Writer_Excel2007 */
include 'PHPExcel/Writer/Excel2007.php';
    //We are using PHPExcel Library for creating the Microsoft Excel file
    //require_once  './PHPExcel/Classes/PHPExcel.php';

    $objPHPExcel = new PHPExcel();
    //Activate the First Excel Sheet
    $ActiveSheet = $objPHPExcel->setActiveSheetIndex(0);
    $ActiveSheet->SetCellValue('A1', $tst);
    $ActiveSheet->SetCellValue('A2', 'Roll No');
    $ActiveSheet->SetCellValue('B2', 'Student Name');
    $ActiveSheet->setCellValue('C2','Mark Obtained' ); 

       // $rowIndex++;

   // }       
/*     
/*
    //1. Mark the Header Row  in Color Red
    $Range = 'A1:B1:C1:D1';
    $color = 'FFFF0000';
    $ActiveSheet->getStyle($Range)->getFill($Range)->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB($color);

    //2. Set the Column Width

    for($i=0; $i<count($Header);$i++)
    {
        $Location = PHPExcel_Cell::stringFromColumnIndex($i) ;
        $ActiveSheet->getColumnDimension($Location)->setAutoSize(true); 
    }
    */

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="template.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

  //  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    //Result File name
   // $objPHPExcel = PHPExcel_IOFactory::load("myfile.xlsx");

  //  $objWriter->save('myfile.xlsx');

}

?>