<?php

session_start();
include_once('../config.php');
$query=mysqli_query($db1,"select * from jobs where eid = $_SESSION[eid]");


?>
<!DOCTYPE HTML>
<html>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<META HTTP-EQUIV="refresh" CONTENT="60">
<head>
    <title>Manage  Jobs</title>
</head>
<div id="nav">
    <nav class="emp-nav">
        <div class="navbar" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">Manage Jobs</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Post New Jobs</a></li>
                        <li><a href="#">Manage Jobs</a></li>
                        
                    </ul>
                </li>
            </ul>
           
            <ul class="nav navbar-nav navbar-left">
                
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!-- /.container-fluid -->
<body>
<h3 style="color: seagreen; margin-top: 50px; " class="text-center">Manage Your Posted Jobs</h3>
<div class="page-header" style="background: dodgerblue"></div>
<?php if(mysqli_num_rows($query)>0) { ?>
<div class="container" id="viewmain">
	<div class="table-responsive">
    <table class="table table-responsive table-striped">
        <th>Job Title</th>
        <th>Job Description</th>
        
        <th colspan="3">Actions</th>
    <?php
    while($result=mysqli_fetch_array($query)){
   

    echo" <tr> ";
        
        echo "<td>".$result['title']."</td>";
        echo "<td>".substr($result['jobdesc'],0,130)." ..........</td>";
        
        echo "<td>  <a style='color: whitesmoke;'  href='view.php?jid=".$result['jobid']."'><button type='button' class='btn btn-success'>View Job</button></a> </td>";
        echo "<td> <a style='color: whitesmoke;'  href='manage_applicants.php?jobid=".$result['jobid']."'><button type='button' class='btn btn-success'> View Applicants</button> </a></td>";
        echo "</tr>";
    }
?>
    </table>
    </div>
</div>
<?php } else  echo " <div class='container'> <div class='alert alert-warning alert-dismissible' role='alert'>
            <button type='button' class='close'  data-dismiss='alert' aria-label='Close'><span
                    aria-hidden='true'>&times;</span></button>
           <p style='font-size: 20px'><strong>Note:</strong> You have'nt posted any jobs yet!</p>
        </div> </div>";
?>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
