<?php

 include_once('../config.php');
// Data retreived  begins here
$email=$_POST['useremail'];
//echo $email;
$password=$_POST['pass1'];
$hash = password_hash($password, PASSWORD_DEFAULT);
//echo $password;
$name=$_POST['uname'];
$mobile=$_POST['mobno'];
$experience=$_POST['experience'];
$skills=$_POST['skills'];
$ug=$_POST['ugcourse'];
$pg=$_POST['pgcourse'];

$type="jobseeker";
// data retreived ends here




mysqli_select_db($db1,"jobportal");

$query4="INSERT INTO login (email,password,usertype,status) VALUES ('$email','$hash','$type',1)";
    $result1 = mysqli_query($db1,$query4) or die("Cant Register , The user email may be already existing");
$query5 =  "INSERT INTO jobseeker (log_id,name,phone,experience,skills,basic_edu,master_edu)
                VALUES ((SELECT log_id FROM login WHERE email='$email'),'$name','$mobile','$experience','$skills','$ug','$pg')";

 //$result2 = mysqli_query($db1,$query5);
if (!mysqli_query($db1,$query5))
{
 echo("Error description: " . mysqli_error($db1));
}

else{
    header('location:login.php?msg=registered');
}
?>