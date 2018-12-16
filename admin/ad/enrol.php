<?php

include 'Connection.php';
//$uname=$_POST['uname'];
//$data = array('Firstname', 'LastName','email','Designation');
if($_SERVER["REQUEST_METHOD"] == "POST"){

$user=$_POST['user'];           
 $dep=$_POST['dep'];
 $sub=$_POST['sub'];
 $batch=$_POST['batch'];
 
// $Header = array('A', 'A','B','B');
 $arrlength = count($sub);
 //echo $arrlength;
 $msg0=".";
 $msg1="Remedial actions need to be chosen for students not achieving the target. Additional classes/workshop/tutorial sessions be planned";
 $msg2="Remedial actions need to be chosen for students not achieving the target.";
 $msg3=".";

 //messages for overall//

$msg4="Target is not achieved.The faculty along with the stream coordinator must identify the reason for not achieving the target. Additional Workshops/Courses may be planned to bridge the gap. Suitable remedial actions to be initiated at the earliest.";
$msg5="Target has been Slightly achieved. The Faculty and Stram coordinator may discuss and reach higher levels of target for next batch.";
$msg6="Target has been Moderatly achieved. Lacunae, if any may be analysed by Faculty and Stream coordinator.";
$msg7="Target has been Substantially achieved.";

 //
 //echo "<br>";
for($x = 0; $x < $arrlength; $x++) {
   /* echo $user;
 echo "<br>";
 echo $dep;
 echo "<br>";
    echo $sub[$x];
     echo $batch[$x];
    echo "<br>";*/

    $sql='INSERT INTO enrol(uid,cid,subid,bid)
                VALUES("'.$user.'","'. $dep.'","'. $sub[$x].'","'. $batch[$x].'")';
    $sql2='INSERT INTO comment_test(cid,subid,bid,not_achieved,slightly_achieved,moderatly_achieved,substantial) VALUES("'. $dep.'","'. $sub[$x].'","'. $batch[$x].'","'.$msg0.'","'.$msg1.'","'.$msg2.'","'.$msg3.'" )';
    $sql3='INSERT INTO comment_final(cid,subid,bid,not_achieved,slightly_achieved,moderatly_achieved,substantial) VALUES("'. $dep.'","'. $sub[$x].'","'. $batch[$x].'","'.$msg4.'","'.$msg5.'","'.$msg6.'","'.$msg7.'" )';

}

        if (mysqli_query($conn, $sql)) {
           // header('Location: indexm.php'); 
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
         if (mysqli_query($conn, $sql2)) {
           // header('Location: indexm.php'); 
        } 
        else {
            echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }
        if (mysqli_query($conn, $sql3)) {
            header('Location: indexm.php'); 
        } 
        else {
            echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
        }
         mysqli_close($conn);
}

?>