<?php
// Initialize the session
session_start();
//$sId=$_GET['sd'];
//$_SESSION['sid']=$sId;
//$cid=$_SESSION['cid'];
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
<?php
include 'Connection.php';
//$_SESSION['sid']=$sId;
$bid=$_SESSION['bid'];
$subid=$_SESSION['subid'];
$cid=$_SESSION['cid'];
$sid=$_SESSION['sid'];
$fname=$_SESSION['username'];
$s1=$ss1=$sss1=$s2=$ss2=$sss2=$s3=$ss3=$sss3=$s4=$ss4=$sss4=$s5=$ss5=$sss5=$s6=$ss6=$sss6=$cec=$sum1=$sum2=$uni=$un=$u=$ol=$ol1=$out=$op=$op1=$unival='0';
$msg0='Final result will be available only after uploading University mark';
$op='not_achieved';
$sql = "SELECT * FROM finalresult WHERE bid= '$bid' AND subid='$subid'";
$result = mysqli_query($conn, $sql);



$sql1 = "SELECT * FROM university WHERE bid= '$bid' AND subid='$subid'";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "SELECT * FROM batch WHERE bid= '$bid'";
$result2 =mysqli_query($conn, $sql2);

$sql3 = "SELECT * FROM subject WHERE subid= '$subid'";
$result3 =mysqli_query($conn, $sql3);

$sql4 = "SELECT * FROM semester WHERE sid= '$sid'";
$result4 =mysqli_query($conn, $sql4);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>aspare</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                    	<h1><img src="images/logo.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="index.php">Home</a></li>
                         <li ><a href="logout.php">logout(<?php echo $_SESSION['username']; ?>)</a></li>
                         <li><a href="graphprev.php">VIew previous Results</a></li>

                        <li ></li>

                        
                    </ul>
                </div>
               
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

   <div style="width:35%;margin:0 auto;">
       <center> <h5>Outcome Calculation for Course  </h5></center>
    </br>
<?php



        if (mysqli_num_rows($result2) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result2)) {
                // $subid=$row["subid"];
                // $sub=$row["subject"];
                //$A_val=round($A_val,2);
               // echo $row["count1"];
        
                $batch=$row["batch"];
            }}
     if (mysqli_num_rows($result3) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result3)) {
                // $subid=$row["subid"];
                // $sub=$row["subject"];
                //$A_val=round($A_val,2);
               // echo $row["count1"];
        
                $scode=$row["code"];
                $sname=$row["subject"];
            }}
           if (mysqli_num_rows($result4) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result4)) {
                // $subid=$row["subid"];
                // $sub=$row["subject"];
                //$A_val=round($A_val,2);
               // echo $row["count1"];
        
                $sem=$row["semester"];
            }}

            //$year=date("Y");
echo '<table  class="table table-bordered" align="center"  >
                        <tr>
                           <th><center>COURSE CODE:</th> </center>
                           <th><center><h6>'.$scode.'</h6></center></th>
                           
                        </tr>
                         <tr>
                           <th><center>COURSE NAME:</th>  </center>
                           <th><center><h6>'.$sname.'</h6></center></th>
                          
                        </tr>
                         <tr>
                           <th><center>SEMESTER: </th>  </center>
                           <th><center><h6>'.$sem.'</h6></center></th>
                           
                        </tr>
                        
                         <tr>
                           <th><center>BATCH:</th> </center> 
                           <th><center><h6>'.$batch.'</h6></center></th>
                           
                        </tr>
                        <tr>
                           <th><center>FACULTY NAME:</th> </center> 
                           <th><center><h6>'.$fname.'</h6></center></th>
                           
                        </tr>
                       
                        

                      </table>';

?>

        <?php
      //echo $_SESSION['cid'];
      //echo $_SESSION['bid'];
      //echo $_SESSION['sid'];
        $avg='0';
        $con='0';

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                // $subid=$row["subid"];
                // $sub=$row["subject"];
                //$A_val=round($A_val,2);
               // echo $row["count1"];
            if($row["count1"]>0){
                $s1=round($row["co1"]/$row["count1"],2);

                if($s1>1.31){
                              $ss1='3';
                            }
                elseif ($s1>1.25) {
                                   $ss1='2';
                            }   
                elseif ($s1>1.19) {
                             $ss1='1';
                         }         
                else{
                    $ss1='0';
                }
                $avg=$avg+$ss1;
                $con++;


            }
            else{
                $s1='0.0';
                 $ss1='0';
            }if($row["count2"]>0){
                
                $s2=round($row["co2"]/$row["count2"],2);
                if($s2>1.31){
                              $ss2='3';
                            }
                elseif ($s2>1.25) {
                                   $ss2='2';
                            }   
                elseif ($s2>1.19) {
                             $ss2='1';
                         }         
                else{
                    $ss2='0';
                }
                $avg=$avg+$ss2;
                $con++;
                   
            }
            else{
                $s2='0.0';
                 $ss2='0';
            }if($row["count3"]>0){
                
                $s3=round($row["co3"]/$row["count3"],2);
                if($s3>1.31){
                              $ss3='3';
                            }
                elseif ($s3>1.25) {
                                   $ss3='2';
                            }   
                elseif ($s3>1.19) {
                             $ss3='1';
                         }         
                else{
                    $ss3='0';
                }
                $avg=$avg+$ss3;
                $con++;
                   
  
            }
            else{
                $s3='0.0';
                 $ss3='0';
            }if($row["count4"]>0){
                
                $s4=round($row["co4"]/$row["count4"],2);
                if($s4>1.31){
                              $ss4='3';
                            }
                elseif ($s4>1.25) {
                                   $ss4='2';
                            }   
                elseif ($s4>1.19) {
                             $ss4='1';
                         }         
                else{
                    $ss4='0';
                }
               $avg=$avg+$ss4;
                $con++;    
            }
            else{
                $s4='0.0';
                 $ss4='0';
            }if($row["count5"]>0){
                
                $s5=round($row["co5"]/$row["count5"],2);
                if($s5>1.31){
                              $ss5='3';
                            }
                elseif ($s5>1.25) {
                                   $ss5='2';
                            }   
                elseif ($s5>1.19) {
                             $ss5='1';
                         }         
                else{
                    $ss5='0';
                }
                $avg=$avg+$ss5;
                $con++;
                   
            }
            else{
                $s5='0.0';
                 $ss5='0';
            }
            if($row["count6"]>0){
                
                $s6=round($row["co6"]/$row["count6"],2);
                if($s6>1.31){
                        $ss6='3';
                            }
                elseif ($s6>1.25) {
                                   $ss6='2';
                            }   
                elseif ($s6>1.19) {
                             $ss6='1';
                         }         
                else{
                    $ss6='0';
                }
                $avg=$avg+$ss6;
                $con++;
                   
            }
            else{
                $s6='0.0';
                $ss6='0';
            }



            /////////////////////////////////////////////////////////

            if($row["count1"]>0){
              //  $s1=round($row["co1"]/$row["count1"],2);

                if($s1>1.32){
                              $sss1='Substantial (3)';
                            }
                elseif ($s1>1.26) {
                                   $sss1='Moderate (2)';
                            }   
                elseif ($s1>1.12) {
                             $sss1='Slightly (1)';
                         }         
                else{
                    $sss1='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $sss1='Not Achieved (0)';
            }
            if($row["count2"]>0){
                 if($s2>1.32){
                              $sss2='Substantial(3)';
                            }
                elseif ($s2>1.26) {
                                   $sss2='Moderate (2)';
                            }   
                elseif ($s2>1.12) {
                             $sss2='Slightly (1)';
                         }         
                else{
                    $sss2='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $sss2='Not Achieved (0)';
                
                
            }if($row["count3"]>0){
                 if($s3>1.32){
                              $sss3='Substantial (3)';
                            }
                elseif ($s3>1.26) {
                                   $sss3='Moderate (2)';
                            }   
                elseif ($s3>1.12) {
                             $sss3='Slightly (1)';
                         }         
                else{
                    $sss3='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $sss3='Not Achieved (0)';
                
               
                
            }if($row["count4"]>0){
                 if($s4>1.32){
                              $sss4='Substantial (3)';
                            }
                elseif ($s4>1.26) {
                                   $sss4='Moderate (2)';
                            }   
                elseif ($s4>1.12) {
                             $sss4='Slightly (1)';
                         }         
                else{
                    $sss4='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $sss4='Not Achieved (0)';
                
                

            }if($row["count5"]>0){
                 if($s5>1.32){
                              $sss5='Substantial (3)';
                            }
                elseif ($s1>1.26) {
                                   $sss5='Moderate (2)';
                            }   
                elseif ($s1>1.12) {
                             $sss5='Slightly (1)';
                         }         
                else{
                    $sss5='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $sss5='Not Achieved (0)';
             }
                
            if($row["count6"]>0){
                 if($s6>1.32){
                              $sss6='Substantial (3)';
                            }
                elseif ($s6>1.26) {
                                   $sss6='Moderate (2)';
                            }   
                elseif ($s6>1.12) {
                             $sss6='Slightly (1)';
                         }         
                else{
                    $sss6='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $sss6='Not Achieved (0)';
             }
             $sum=($avg/($con*3)*3);
             $sum1=(round($sum,0,PHP_ROUND_HALF_UP));
             if($sum1>0){
                 if($sum1>1.32){
                              $sum2='Substantial (3)';
                            }
                elseif ($sum1>1.26) {
                                   $sum2='Moderate (2)';
                            }   
                elseif ($sum1>1.12) {
                             $sum2='Slightly (1)';
                         }         
                else{
                    $sum2='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $sum2='Not Achieved (0)';
             }
             if (mysqli_num_rows($result1) > 0) {
            // output data of each row
            while($row1 = mysqli_fetch_assoc($result1)) {
                $uni=$row1["unico"];
                if($uni!=0){$unival=$uni; }
                $cec=$row1["cec"];
                if($uni>0){
                
                
                if($uni>1.31){
                              $un='3';
                            }
                elseif ($uni>1.25) {
                                   $un='2';
                            }   
                elseif ($uni>1.19) {
                             $un='1';
                         }         
                else{
                    $un='0';
                }
                   
            }
            else{
               
                 $un='0';
            }



                if($uni>0){
                 if($uni>1.32){
                              $u='Substantial (3)';
                            }
                elseif ($uni>1.26) {
                                   $u='Moderate (2)';
                            }   
                elseif ($uni>1.12) {
                             $u='Slightly (1)';
                         }         
                else{
                    $u='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $u='Not Achieved (0)';
             }
 $ol=(($un*'0.6')+($sum1*'0.4'));
        $ol1=(round($ol,0,PHP_ROUND_HALF_UP));
        ///////////////
         $out=(($ol*'0.8')+($cec*'0.2'));

//new
if($out>0){
                 if($out>1.32){
                              $op='substantial';
                               $op1='Substantial (3)';
                            }
                elseif ($out>1.26) {
                                   $op='moderatly_achieved';
                                    $op1='Moderate (2)';
                            }   
                elseif ($out>1.12) {
                             $op='slightly_achieved';
                              $op1='Slightly (1)';
                         }         
                else{
                    $op='not_achieved';
                    $op1='Not Achieved (0)';
                }
            }
            else{
               // $s1='0.0';
                 $op='not_achieved';
             }
          
           //new
            }
        }
        else {
            $uni='0.0';
            $un='0.0';
            $u='0.0';
            $cec='0.0';
    
        }
        /////////////////

       

      //  $out1=(round($out,0,PHP_ROUND_HALF_UP));
             //echo $avg;
 //            echo $con;
/*
                $s2=round($row["co2"]/$row["count2"],2);
                $s3=round($row["co3"]/$row["count3"],2);
                $s4=round($row["co4"]/$row["count4"],2);
                $s5=round($row["co5"]/$row["count5"],2);*/
                echo '<table  class="table table-bordered" align="center"  >
                        <tr>
                           <th><center>CO1:</th> </center>
                           <th><center><h6>'.$s1.'</h6></center></th>
                           <th><center><h6>'.$ss1.'</h6></center></th>
                           <th><center><h6>'.$sss1.'</h6></center></th>
                        </tr>
                         <tr>
                           <th><center>CO2:</th>  </center>
                           <th><center><h6>'.$s2.'</h6></center></th>
                           <th><center><h6>'.$ss2.'</h6></center></th>
                           <th><center><h6>'.$sss2.'</h6></center></th>
                        </tr>
                         <tr>
                           <th><center>CO3: </th>  </center>
                           <th><center><h6>'.$s3.'</h6></center></th>
                           <th><center><h6>'.$ss3.'</h6></center></th>
                           <th><center><h6>'.$sss3.'</h6></center></th>
                        </tr>
                         <tr>
                           <th><center>CO4:</th>  </center>
                           <th><center><h6>'.$s4.'</h6></center></th>
                           <th><center><h6>'.$ss4.'</h6></center></th>
                           <th><center><h6>'.$sss4.'</h6></center></th>
                        </tr>
                         <tr>
                           <th><center>CO5:</th> </center> 
                           <th><center><h6>'.$s5.'</h6></center></th>
                           <th><center><h6>'.$ss5.'</h6></center></th>
                           <th><center><h6>'.$sss5.'</h6></center></th>
                        </tr>
                        <tr>
                           <th><center>CO6:</th> </center> 
                           <th><center><h6>'.$s6.'</h6></center></th>
                           <th><center><h6>'.$ss6.'</h6></center></th>
                           <th><center><h6>'.$sss6.'</h6></center></th>
                        </tr>
                        <tr>
                           <th><center>AVERAGE</th> </center> 
                           <th><center><h6> </h6></center></th>
                           <th><center><h6>'.$sum1.'</h6></center></th>
                           <th><center><h6>'.$sum2.'</h6></center></th>
                        </tr>
                         <tr>
                           <th><center>OUTCOME[UNIVERSITY EXAM]</th> </center> 
                           <th><center><h6>'.$uni.' </h6></center></th>
                           <th><center><h6>'.$un.'</h6></center></th>
                           <th><center><h6>'.$u.'</h6></center></th>
                        </tr>
                        <tr>
                           <th><center>OVERALL OUTCOME</th> </center> 
                           <th><center><h6> </h6></center></th>
                           <th><center><h6>'.$ol.'</h6></center></th>
                           <th><center><h6>'.$ol1.'</h6></center></th>
                        </tr>
                        <tr>
                           <th><center>COURSE EXIT SURVEY[3]</th> </center> 
                           <th><center><h6> </h6></center></th>
                           <th><center><h6>'.$cec.'</h6></center></th>
                           <th><center><h6>'.$cec.'</h6></center></th>
                        </tr>
                        <tr>
                           <th><center>OUTCOME OF COURSE</th> </center> 
                           <th><center><h6> </h6></center></th>
                           <th><center><h6>'.$out.'</h6></center></th>
                           <th><center><h6>'.$op1.'</h6></center></th>
                        </tr>
                        

                      </table>';
                     // '<a href=reciept.pdf>"download your reciept"</a>';

                      
            }
       

        } else {
    echo "<h6>NO DATA....!</h6>";
        }
        //include('graph.php');
  

include 'Connection.php';
//$_SESSION['sid']=$sId;
$bid=$_SESSION['bid'];
$subid=$_SESSION['subid'];
$cid=$_SESSION['cid'];
$sid=$_SESSION['sid'];

$sqlfin = "SELECT * FROM comment_final WHERE bid= '$bid' AND subid='$subid' AND cid='$cid'";
$resultfin = mysqli_query($conn, $sqlfin);
mysqli_close($conn);
if (mysqli_num_rows($resultfin) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($resultfin)) {
                // $subid=$row["subid"];
                // $sub=$row["subject"];
                //$A_val=round($A_val,2);
               // echo $row["count1"];
                //echo $unival;

                if($unival!=0)
        
               { $msg0=$row["$op"];}

               // echo $msg0;
                
               
include 'Connection.php';
//$_SESSION['sid']=$sId;
$bid=$_SESSION['bid'];
$subid=$_SESSION['subid'];
$cid=$_SESSION['cid'];




$sqlove = "SELECT * FROM overall WHERE bid= '$bid' AND subid='$subid' AND cid='$cid'";
$resultove = mysqli_query($conn, $sqlove);
$row = mysqli_fetch_assoc($resultove);
$outove=$row["outcome"];


//mysqli_close($conn);
if (mysqli_num_rows($resultove) == 0 && ($unival!=0)){

$sqlove = 'INSERT INTO overall(cid,subid,bid,outcome,result,fname) VALUES("'. $cid.'","'. $subid.'","'. $bid.'","'.$out.'","'.$op1.'" ," '.$fname.' ")';

$resultove = mysqli_query($conn, $sqlove);
}

elseif (($outove<$out) && ($unival!=0)){


$sqlove = "UPDATE overall SET outcome='$out', result='$op1' where bid= '$bid' AND subid='$subid' AND cid='$cid'";
//$sqlove = 'INSERT INTO overall(cid,subid,bid,outcome,result) VALUES("'. $cid.'","'. $subid.'","'. $bid.'","'.$out.'","'.$op1.'" )';

$resultove = mysqli_query($conn, $sqlove);
}


//ssmysqli_close($conn);

 

            }}
       



require('fpdf/fpdf.php');
class PDF_reciept extends FPDF {
    function __construct ($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40) {
        $this->FPDF($orientation, $unit, $format);
        $this->SetTopMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetRightMargin($margin);
        
        $this->SetAutoPageBreak(true, $margin);
    }
    
    function Header () {
       // $this->SetFont('Arial', 'B', 25);
       // $this->SetFillColor(36, 96, 84);
       // $this->SetTextColor(0);
       // $this->Cell(0, 30, "Adi Shankara Institute of Engineering Technology", 0, 1, 'C');
        $this->Image('images/header1.jpg',50,0);

    }
    
    function Footer () {
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0);              
        $this->SetXY(40, -60);
        $this->Cell(0, 20, "This is a computer generated  report             ASPARE", 'T', 0, 'C');
        //$this->SetY(-150);
        //$this->Image('images/logo.png');
    }
    
}
$pdf = new FPDF();
$pdf = new PDF_reciept();
$pdf->AddPage();

//$pdf->Ln(50);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY(100);
$pdf->Cell(100, 115, "COURSE CODE:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 115, $scode );

$pdf->Ln(65);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 13, "COURSE NAME:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, $sname );

$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 13, "SEMESTER:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, $sem );

$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 13, "BATCH:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, $batch );

$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(100, 13, "FACULTY NAME:");
$pdf->SetFont('Arial', '');
$pdf->Cell(100, 13, $fname );

$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(200, 25, "Outcome Calculation for Course");
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(300, 25, "-----------------------------------------------");
$pdf->Ln(30);
//$pdf->PriceTable();

//$pdf->Ln(100);
$pdf->SetFont('Arial', 'B', 12);
    $pdf->SetTextColor(0);
    $pdf->SetFillColor(36, 140, 129);
    $pdf->SetLineWidth(1);
    $pdf->Cell(200, 25, "CO1", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $s1, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ss1, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sss1, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "CO2", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $s2 , 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ss2, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sss2, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "CO3", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $s3, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ss3, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sss3, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "CO4", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $s4, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ss4, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sss4, 'LTR', 0, 'C', true);


    $pdf->Ln(25);
    $pdf->Cell(200, 25, "CO5", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $s5, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ss5, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sss5, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "CO6", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $s6, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ss6, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sss6, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "AVERAGE", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, "", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sum1, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $sum2, 'LTR', 0, 'C', true);

    $pdf->Ln(25);
    $pdf->Cell(200, 25, "OUTCOME[UNIVERSITY EXAM]", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $uni, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $un, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $u, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "OVERALL OUTCOME", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, "", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ol, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $ol1, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "COURSE EXIT SURVEY[3]", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, "", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $cec, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $cec, 'LTR', 0, 'C', true);
    $pdf->Ln(25);
    $pdf->Cell(200, 25, "OUTCOME OF COURSE", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, "", 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $out, 'LTR', 0, 'C', true);
    $pdf->Cell(100, 25, $op1, 'LTR', 0, 'C', true);

    $pdf->Ln(25);
    
    $pdf->SetFont('Arial', '');
    $pdf->SetFillColor(238);
    $pdf->SetLineWidth(0.2);
    $fill = false;

    $pdf->Ln(25);
    $pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(200, 25, $msg0);
$pdf->Ln(100);

    $pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(350, 25, "FACULTY");
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(200, 25, "HEAD OF DEPARTMENT");



$pdf->Output('reciept.pdf', 'F');

?>

 <div style="width:100%;margin:0 auto;">
        <h5><?php echo $msg0; ?>  </h5>
    </br>

<center></center><a href='reciept.pdf'>download </a></center>
<!--<center> <a href="test.php">download</a></center>-->
      </div>
      
    <!--/#home-slider-->
    
	
      <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                
            </div>
        </div>         


     
    <!--/#footer-->

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>   
</body>
</html>
