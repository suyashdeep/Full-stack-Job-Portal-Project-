<?php

include_once('../config.php');
session_start();
$jobid=$_GET['jid'];
$jsid=$_SESSION['jsid'];
$date=date("d-m-y");
//echo  $jobid;
$q1=mysqli_query($db1,"select * from application where job_id =$jobid AND user_id = $jsid");
if(mysqli_num_rows($q1)>=1){
    echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have already applied for this job!</p>
        </div>";
}
else{
   
    $q2=mysqli_query($db1,"insert into application (user_id,emp_id,job_id) VALUES ($jsid,(SELECT eid from jobs where jobid = $jobid),$jobid)");
   // echo mysqli_error($db1);
    if($q2){
        echo " <div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have successfully applied for this job!</p>
        </div>";

    }
    else{
        echo " <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Oops!:</strong>Sorry ! Failed to apply for this job!</p>
        </div>";
    }


}
?>