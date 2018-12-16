<?php
//include 'Connection.php';
session_start();

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

require_once 'connection.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    if(("" == trim($_POST['name']))) {
        echo "<script>
                alert('Please fill all mandatory fields');
              </script>";
    }      
    else if(($name != "")) {

           $sql=  "SELECT tid,testname FROM  test WHERE (`tesname` LIKE '%".$name."%') ";

     if(($sql != "")) {
       // $pdate = date('Y-m-d H:i:s A');
       // echo "$date";
        $tt=$_POST['name'];
        
   $pp=$tt . ".xlsx";
//echo "string";
//echo $pp;
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';
//$p="MyExcel.xlsx";
require_once 'PHPExcel/IOFactory.php';
//$uploads_dir ='upload/'
$target_dir = "upload/";
$target_file = $target_dir . $pp;
$objPHPExcel = PHPExcel_IOFactory::load($target_file);
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
      
      echo '<br> <table class="table table-bordered" align="center" border="1"><tr>';
    for ($row = 1; $row <= $highestRow; ++ $row) {
        echo '<tr>';
        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
            echo '<td>' . $val . '<br></td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}


}
}
}
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
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
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
        <!--
        <?php
        echo "course";
      echo   $_SESSION['cid'];
      
      echo "\nbatch";
      echo   $_SESSION['bid'];
      
      echo "\nsemester";
      echo $_SESSION['sid'];
            echo "\nsubject";
      echo $_SESSION['subid'];
      
        ?>
    -->
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="dashboard.php">
                        <h1><img src="images/logo.png" alt="logo"></h1>
                    </a>

                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                       <!-- <li><a href="password.php">change password</a></li>-->
                        <li><a href="logout.php ">Logout(<?php echo $_SESSION['username']; ?>)</a></li>
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!--/#header-->
    <div style="width:95%;margin:0 auto;">
        
        <span style="color:red;font-size:12px;"></span><br/>
        <form  id='newpost' name='newpost' method="post" action="#">
            <table  align="center" bgcolor="#ABE4EC">
                <tr>
                    <td>TEST NAME<span style="color:red;"></span></td><td>: </td>
                    <td><input type='text' name='name' id='name' required="required"/></td>
                </tr>
                
                    <td></td>

                    
                    <td>&nbsp;<input type='submit' id='submit' name='submit' value="submit"/></td>
                </tr>
            </table>
        </form>
      </div>  
    

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