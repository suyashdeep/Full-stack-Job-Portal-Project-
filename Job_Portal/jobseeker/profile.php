<?php

include_once('../config.php');
session_start();
$id = $_SESSION['id'];

if(isset($_SESSION['id'])&& ($_SESSION['type']="jobseeker"))
{
    $q = "select * from login join jobseeker on login.log_id=jobseeker.log_id WHERE login.log_id = $id";

    $result = mysqli_query($db1, $q);
    $row = mysqli_fetch_array($result);
 
    $_SESSION['jsname']=$row['name'];
    $_SESSION['jsid']=$row['user_id'];
}
else
{
    header('location:../login.php?msg=please_login');
}
?>
<!DOCTYPE HTML>
<html>
<head>

<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>Profile - <?php echo $row['name']; ?></title>
    
</head>
<body>

<div id="nav">
    <nav class="navbar">
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>
            
            <ul class="nav navbar-nav navbar-left">
              
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->

<!------------------------------------------------------------------------------- -->
<div class="container-fluid" id="content">

<aside class="col-sm-3" role="complementary">
    <div class="region region-sidebar-first well" id="sidebar">
     <h3 style="color: #009999" class="text-center" > Welcome <?php echo $row['name']; ?> </h3>
     </div>



</aside>

    <!------------------------------------------------------------------------------- -->
<section class="col-sm-7">


<div id="header">
<h3> Find jobs, edit your profile or update your current resume for better jobs!</h3>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#details">Your Profile</a></li>
    <li><a data-toggle="tab"  href="#recjobs">Apply to Jobs</a></li>
    
</ul>

<!------------------------------------------------------------------------------- -->

    <div class="tab-content">

<!------------------------------------------------------------------------------- -->

        <div id="details" class="tab-pane fade in active" style="margin-top: 50px;">
        <h3> Your Profile</h3>
        <table class="table" >
        <tr>
            <td class="tbold">Full Name:</td>
            <td><?php echo $row['name']; ?></td>

        </tr>
        <tr>
            <td class="tbold">Email:</td>
            <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Phone:</td>
            <td><?php echo $row['phone']; ?></td>
        </tr>
        
        <tr>
            <td class="tbold">Experience (Years):</td>
            <td><?php echo $row['experience']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Skills:</td>
            <td><?php echo $row['skills']; ?></td>
        </tr>
        <tr>
           <td class="tbold">UG Qualification:</td>
            <td><?php echo $row['basic_edu']; ?></td>
        </tr>
        <tr>
            <td class="tbold">PG Qualification:</td>
            <td><?php echo $row['master_edu']; ?></td>
        </tr>
    </table>
</div> <!-- profile -->
    <!------------------------------------------------------------------------------- -->
    <div id="recjobs" class="tab-pane fade" style="margin-top: 20px;">

        <?php
        $ug=$row['basic_edu'];
        $pg=$row['master_edu'];
        $q=mysqli_query($db1,"select * from jobs where ugqual='$ug' OR pgqual = '$pg'");
        if(mysqli_num_rows($q)>0) {
            echo "<h3>These jobs are reccomended to you based on your profile:</h3>";
      
            while ($result2 = mysqli_fetch_array($q)) {
                $query2 = mysqli_query($db1, "select * from employer where eid = '$result2[eid]'");
                $r2 = mysqli_fetch_array($query2);
               echo "<h3> <a style='color: green;'  href='view_jobs.php?jid=" . $result2['jobid'] . "'>".$result2['title']."</a></h3>"; 
               echo "<h4> Employer: <a href='view_emp.php?id=".$r2['eid']."'>".$r2['ename']."</a></h4>";
               echo "<p>". substr($result2['jobdesc'],0,120) ." .......</p>";
               echo "<hr>";
            }
        }
        else{
           echo "<h3 style='color: #122b40; margin-top: 30px;'>No jobs are reccomended to you at this moment! </h3>";
        }
        ?>
        </table>
    </div>



   
<!------------------------------------------------------------------------------- -->
</div> <!-- tab contents -->

</div>
</section> <!-- section 2 ends here -->

</div> <!-- main content div -->

</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/jobseeker.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>
