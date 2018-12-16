
<?php
// Initialize the session
session_start();
//$subid=$_GET['subd'];

//$_SESSION['subid']=$subid;
$cid=$_SESSION['cid'];
$bid=$_SESSION['bid'];
$subid=$_SESSION['subid'];
//$cid=$_SESSION['cid'];

$sid=$_SESSION['sid'];
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
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

    <section id="page-breadcrumb">
        <div class="vertical-center sun">
             <div class="container">
                <div class="row">
                    <div class="action">
                        <div class="col-sm-12">
                            <h1 class="title">MODIFY  </h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

<?php
// Include config file
require_once 'connection.php';
 
// Define variables and initialize with empty values

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
//session_start();
include 'Connection.php';
//$_SESSION['sid']=$sId;

 $not=trim($_POST["not"]);
  $slight=trim($_POST["slight"]);
   $mod=trim($_POST["mod"]);
    $sub=trim($_POST["sub"]);
    
$sql11 = "UPDATE comment_final SET not_achieved='$not', slightly_achieved='$slight',moderatly_achieved='$mod',substantial='$sub' where bid= '$bid' AND subid='$subid' AND cid='$cid'";
$result11 = mysqli_query($conn, $sql11);
mysqli_close($conn);


//("location: modify.php");
    // Validate username
   }
?>
 

 <?php

include 'Connection.php';
//$_SESSION['sid']=$sId;

$sql1 = "SELECT * FROM comment_final WHERE bid= '$bid' AND subid='$subid' AND cid='$cid'";
$result1 = mysqli_query($conn, $sql1);
mysqli_close($conn);
if (mysqli_num_rows($result1) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result1)) {
                // $subid=$row["subid"];
                // $sub=$row["subject"];
                //$A_val=round($A_val,2);
               // echo $row["count1"
                $msg0=$row["not_achieved"];
                $msg1=$row["slightly_achieved"];
                $msg2=$row["moderatly_achieved"];
                $msg3=$row["substantial"];
                $id=1;
                

            }}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
    
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
                <label>Not Achieved:<sup>*</sup></label>
                <input type="text" name="not"class="form-control" value="<?php echo $msg0; ?>">
                
               
           
          <!-- <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">-->
                <label>Slightly Achieved:<sup>*</sup></label>
                <input type="role" name="slight" class="form-control" value="<?php echo $msg1; ?>">
                
           <!-- </div>-->
            <label>Moderatly Achieved:<sup>*</sup></label>
                <input type="department" name="mod" class="form-control" value="<?php echo $msg2; ?>">
                

                <label>Substantial:<sup>*</sup></label>
                <input type="department" name="sub" class="form-control" value="<?php echo $msg3; ?>">
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
           
        </form>
    </div>    
</body>
</html>



<footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="testimonial bottom" style="width:300px;height:500px;">
                        <h2>Get the Best From Us</h2>
                        <div class="media">
                            <div class="pull-left">

                            </div>
                            <div class="media-body">
                                <blockquote>Fell free to contact us for any assistance.</blockquote>
                                <h3><a href="#">- 9605403492</a></h3>
                            </div>
                         </div>
                        <div class="media">
                          <!--  <div class="pull-left">

                            </div>-->
                            <div class="media-body">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="contact-info bottom">
                        <h2>Contacts</h2>
                        <address>
                        E-mail: <a href="mailto:edwinjames07@gmail.com">edwinjames07@gmail.com</a> <br>
                        Phone: +91 9605403492<br>
                        </address>

                        <h2>Address</h2>
                        <address>
                        ASIET <br>
                        CS , <br>
                        Kalady <br>
                        India <br>
                        </address>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Send a message</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Id">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; RARE Creations 2017. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>