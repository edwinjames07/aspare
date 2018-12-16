<?php
//include 'Connection.php';
session_start();

   $u_avg = trim($_POST["num"]);
   $cec=trim($_POST["cec"]);
   //echo $u_avg;
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/
error_reporting(0);
define ("DB_HOST", "localhost"); // set database host
define ("DB_USER", "root"); // set database user
define ("DB_PASS",""); // set database password
define ("DB_NAME","aspare"); // set database name

$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");

//$databasetable = "YOUR_TABLE";

/************************ YOUR DATABASE CONNECTION END HERE  ****************************/


set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// This is the file path to be uploaded.

//$marray = array();
global $a;
 $a=array();
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);

move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

$inputFileName = $target_file;


try {
  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
  //echo $objPHPExcel;

} catch(Exception $e) {
  die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

global $cid;
global $bid;
global $sid;
global $subid;
//$cid=$_SESSION['cid'];
global $tname;
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
$cid=$_SESSION['cid'];
 $bid=$_SESSION['bid'];
 $sid=$_SESSION['sid'];
 $subid=$_SESSION['subid'];
//$cid=$_SESSION['cid'];
 $tname=trim($allDataInSheet[1]["A"]);



//echo 'getHighestColumn() =  [' . $highestColumm . ']<br/>';
//echo 'getHighestRow() =  [' . $highestRow . ']<br/>';

//$k=1;


  //$tname= trim($allDataInSheet[1]["A"]);
  //echo $tname;

   
  //disp($marray,$k);
//testanalysis($allDataInSheet,$objPHPExcel);
calcvalue($allDataInSheet,$objPHPExcel,$u_avg,$cid,$bid,$sid,$subid,$cec);
//get


function standard_deviation_sample ($a)
{
  //variable and initializations


//for($i = 3; $i <= $highestRow; $i++){
      
    //$u_array[i-3] = $allDataInSheet[$i][$highestColumm];

  
   //echo "<li>";

   
           //$marray[$q_no][8]=$fval;
 // }



  $the_standard_deviation = 0.0;
  $the_variance = 0.0;
  $the_mean = 0.0;
  $the_array_sum = array_sum($a); //sum the elements
  $number_elements = count($a);
  $number_elements1=$number_elements; //count the number of elements
//echo $number_elements;
 for ($i = 0; $i < $number_elements; $i++){
  if (empty($a[$i])){
    $number_elements1--;}
}
  //calculate the mean
  $the_mean = $the_array_sum / $number_elements1;


  //calculate the variance
  for ($i = 0; $i < $number_elements; $i++)
  {
    //sum the array
    //if($a[$i]>=0){
if (!empty($a[$i])){
    $the_variance = $the_variance + ($a[$i] - $the_mean) * ($a[$i] - $the_mean);

  }
}
  

  $the_variance = $the_variance / ($number_elements1 - 1.0);

  //calculate the standard deviation
  $the_standard_deviation = pow( $the_variance, 0.5);

  //return the variance
  //echo $number_elements1;
 // echo $the_standard_deviation;
  return $the_standard_deviation;
}

function calcvalue($allDataInSheet,$objPHPExcel,$u_avg,$cid,$bid,$sid,$subid,$cec){

  $highestColumm = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
    $highestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
  $k=1;
  $h=$highestColumm;
   $t_student=0;


  //$tname= trim($allDataInSheet[1]["A"]);
  //echo $tname;

   

  for($i = 3; $i <= $highestRow; $i++){
      
     $a[$i-3] = $allDataInSheet[$i][$highestColumm];

    //echo $allDataInSheet[$i][$highestColumm];
  // echo "<li>";
   //echo $a[i-3];


           //$marray[$q_no][8]=$fval;
  }

////echo $allDataInSheet[$getHighestRow+1][$highestColumm];
 // $a = array(0, 1, 2, 3, 4, 5);
$st_dev=standard_deviation_sample ($a);
//echo $sd;
$count = count($a);

for ($i = 0; $i < $count; $i++){
  if (!empty($a[$i])){
  $count1++;}
}

$st_dev2=$u_avg + $st_dev;

$st_dev1=$u_avg+(2*$st_dev);
$st_dev3=$u_avg-$st_dev;
$st_dev4=$u_avg-(2*$st_dev);

for($i=0;$i<= $count;$i++)
{
  if($a[$i]>= $st_dev1){$dev1++;}
 
}
for($i=0;$i<= $count;$i++)
{
  if($a[$i]>= $st_dev2){$dev2++;}

  
 
}$dev2=$dev2-$dev1;
for($i=0;$i<= $count;$i++)
{
  if($a[$i]>= $u_avg){$dev++;}

} $dev=$dev-$dev2-$dev1;
for($i=0;$i<= $count;$i++)
{
  if($a[$i]>= $st_dev3){$dev3++;}
 
 
} $dev3=$dev3-$dev-$dev2-$dev1;
for($i=0;$i<= $count;$i++)
{
  if($a[$i]>= $st_dev4){$dev4++;}

} $dev4=$dev4-$dev3-$dev-$dev2-$dev1;

 $t_avg=(((5*$dev1)+(4*$dev2)+(3*$dev)+(2*$dev3)+$dev4)/($count1*5))*3;
// echo $t_avg;
 $t_avg=round($t_avg,2);
 mysql_query("insert into university (cid, bid, sid, subid, unico,cec) values('$cid','$bid','$sid','$subid','$t_avg','$cec')") or die(mysql_error());
 
    /*    if (preg_match("/TOTAL/i", $allDataInSheet[3][$highestColumm])){
          $cid=$_SESSION['cid'];
}
 $bid=$_SESSION['bid'];
 $sid=$_SESSION['sid'];
 $subid=$_SESSION['subid'];
//$cid=$_SESSION['cid'];
 $tname=trim($allDataInSheet[1]["A"]);

        mysql_query("insert into testanalysis (cid,bid,sid,subid,testname,t_no_stu,no_abs,no_pre,no_pass,no_fail,per_pass,class_avg) values('$cid','$bid','$sid','$subid','$tname','$t_student','$absent','$pres','$no_pass','$no_fail','$per_pass','$c_avg')") or die(mysql_error());
         }
          */
  //disp($marray,$k);
  //finalcalc($marray,$k,$allDataInSheet);
}


 
header("location:subjectanalysis.php");
//header("location:viewmarks.php");

?>


<body>
</html>