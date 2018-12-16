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
$name=$_GET['test'];
$sql = "SELECT * FROM testresult WHERE testname= '$name' AND subid='$subid'";
$result = mysqli_query($conn, $sql);


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
       <center> <h5>CO  Attainment </h5></center>
    </br>
        <?php
      //echo $_SESSION['cid'];
      //echo $_SESSION['bid'];
      //echo $_SESSION['sid'];

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                // $subid=$row["subid"];
                // $sub=$row["subject"];
                //$A_val=round($A_val,2);
               // echo $row["count1"];
            if($row["count_co1"]>0){
                $s1=round($row["co1"]/$row["count_co1"],2);

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
                


            }
            else{
                $s1='0.0';
                 $ss1='0';
            }if($row["count_co2"]>0){
                
                $s2=round($row["co2"]/$row["count_co2"],2);
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
                
                   
            }
            else{
                $s2='0.0';
                 $ss2='0';
            }if($row["count_co3"]>0){
                
                $s3=round($row["co3"]/$row["count_co3"],2);
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
                
  
            }
            else{
                $s3='0.0';
                 $ss3='0';
            }if($row["count_co4"]>0){
                
                $s4=round($row["co4"]/$row["count_co4"],2);
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
                 
            }
            else{
                $s4='0.0';
                 $ss4='0';
            }if($row["count_co5"]>0){
                
                $s5=round($row["co5"]/$row["count_co5"],2);
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
               
                   
            }
            else{
                $s5='0.0';
                 $ss5='0';
            }
            if($row["count_co6"]>0){
                
                $s6=round($row["co6"]/$row["count_co6"],2);
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
                
                   
            }
            else{
                $s6='0.0';
                $ss6='0';
            }



            /////////////////////////////////////////////////////////

            if($row["count_co1"]>0){
              //  $s1=round($row["co1"]/$row["count_co1"],2);

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
                 $sss1='-';
            }
            if($row["count_co2"]>0){
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
                 $sss2='-';
                
                
            }if($row["count_co3"]>0){
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
                 $sss3='-';
                
               
                
            }if($row["count_co4"]>0){
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
                 $sss4='-';
                
                

            }if($row["count_co5"]>0){
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
                 $sss5='-';
             }
                
            if($row["count_co6"]>0){
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
                 $sss6='-';
             }

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
                        

                      </table>';
            }
        } else {
    echo "<h6>NO DATA....!</h6>";
        }
        //include('graph.php');
        ?> 
      </div>
      <?php
    // include('graph.php');


include 'Connection.php';
//$_SESSION['sid']=$sId;
$bid=$_SESSION['bid'];
$subid=$_SESSION['subid'];
$cid=$_SESSION['cid'];
$sid=$_SESSION['sid'];
$fname=$_SESSION['username'];
//$s1=$ss1=$sss1=$s2=$ss2=$sss2=$s3=$ss3=$sss3=$s4=$ss4=$sss4=$s5=$ss5=$sss5=$s6=$ss6=$sss6=$cec=$sum1=$sum2=$uni=$un=$u=$ol=$ol1=$out='0';
//$sql = "SELECT * FROM finalresult WHERE bid= '$bid' AND subid='$subid'";
//$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM comment_test WHERE bid= '$bid' AND subid='$subid'  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo  ""Slightly Achieved: " . $row["slightly_achieved"]. " -Moderatly Achieved: " . $row["moderatly_achieved"]. ";
          //echo $row["slightly_achieved"];


echo '<table  class="table table-bordered" align="center"  >
                         <tr>
                           <th><center>Not Achieved:</th> </center>
                           <th><center><h6>'.$row["not_achieved"].'</h6></center></th>
                           
                        </tr>
                        <tr>
                           <th><center>Slightly Achieved:</th> </center>
                           <th><center><h6>'.$row["slightly_achieved"].'</h6></center></th>
                           
                        </tr>
                         <tr>
                           <th><center>Moderatly Achieved:</th>  </center>
                           <th><center><h6>'.$row["moderatly_achieved"].'</h6></center></th>
                          
                        </tr>
                         <tr>
                           <th><center>Substantially Achieved:</th> </center>
                           <th><center><h6>'.$row["substantial"].'</h6></center></th>
                           
                        </tr>
                         
                       
                        

                      </table>';



    }
} else {
    echo "0 results";
}

//$sql11 = "SELECT * FROM comment_test WHERE bid= '$bid' AND subid='$subid' AND sid='$sid";
//$result11 = mysqli_query($conn, $sql11);


include('graph.php');
?>
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
