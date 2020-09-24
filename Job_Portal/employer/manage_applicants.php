<?php

include_once('notify.php');
$q1=mysqli_query($db1,"select * from application where job_id=$_GET[jobid]");
$q3=mysqli_query($db1,"select * from jobs where jobid = $_GET[jobid]");
$q3row=mysqli_fetch_array($q3);
$emp_id=$_SESSION['eid'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Jobs</title>
    
</head>
<body>

<div id="nav">
    <nav>
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">View Applicants</a></li>
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Post New Jobs</a></li>
                        <li><a href="managejobs.php">Manage Jobs</a></li>
                        </ul>
                </li>
            </ul>
           
            <ul class="nav navbar-nav navbar-left">
                
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->

<!-- ----------------------------------------- contents -------------------------------------------------------------------------- -->
<div class="container-fluid">
    <h3 class="text-center" style="margin-top: 50px;">These users have applied for the job : <?php echo $q3row['title'];?></h3>
    <div class="page-header" style="background: steelblue"></div>
    <?php if(mysqli_num_rows($q1)>0) { ?>
		<div class="table-responsive">
        <table class="table table-responsive" style="margin-top: 30px;">
            <th>SI NO:</th>
            <th>Full Name:</th>
            <th>Qualification</th>
            <th>Skills</th>
            
            
            <?php
            while($row=mysqli_fetch_array($q1)) {
                $i=1;
                $user_id=$row['user_id'];
                $q2=mysqli_query($db1,"select * from jobseeker where user_id = $user_id");

                while ( $result = mysqli_fetch_array($q2) ) {
                   
                    echo " <tr> ";
                    echo "<td>".$i."</td>";
                    echo "<td> <a href='view_js.php?jsid=" . $result['user_id'] . "'>".$result['name']."</a></td>";
                    echo "<td> <b>Basic Education: </b> " . $result['basic_edu'].",  <b>Master Education: </b> ".$result['master_edu']."</td>";
                    echo "<td>" . $result['skills'] . "</td>";
                    
                    
                    echo "<tr><td colspan='6'><div id='message'></div></td></tr>";
                    echo "</tr>";
                }
                $i++;
            }
            ?>
        </table>
        </div>
    <?php } else {  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> No one applied for this job yet!</p>
        </div> </div>";
    }
    ?>
</div>
<!-- --------------------------------------------------------- contents end --------------------------------------------------------------------- -->
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>

