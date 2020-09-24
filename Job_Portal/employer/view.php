<?php

include_once('../config.php');
session_start();
$jobid=$_GET['jid'];
$query=mysqli_query($db1,"select * from jobs where jobid = $jobid");
$result=mysqli_fetch_array($query);
?>
<!DOCTYPE HTML>
<html>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<META HTTP-EQUIV="refresh" CONTENT="15">
<head>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
 
    <title> view Jobs </title>
</head>
<body>

<div id="nav">
    <nav>
        <div class="collapse navbar-collapse" id="insidenav">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Job Portal</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="profile.php"><?php echo $_SESSION['name']; ?><span class="sr-only">(current)</span></a></li>
                <li class="active"><a href="#">View Jobs</a></li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="post_jobs.php">Post Jobs</a></li>
                        <li role="separator" class="divider"></li>
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


<div class="container">
    <center><h2>view Job </h2></center>
    <div class="page-header" style="background: #f4511e"></div>
    <button class="btn btn-warning" onclick="goBack()"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back to Manage Jobs</button>

<div id="tablecontent">
    <h3> Job Details: </h3>
    <table class="table table-responsive">
        <tr>
            <td class="tbold">Designation:</td>
            <td><?php echo $result['title']; ?></td>
        </tr>
       
        <tr>
            <td class="tbold">Number of Vacancies: </td>
            <td><?php echo $result['vacno']; ?> </td>
        </tr>
        <tr>
            <td class="tbold">Job Description:</td>
            <td><?php echo $result['jobdesc']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required Experience:</td>
            <td><?php echo $result['experience']." "; ?>Years</td>
        </tr>
        <tr>
            <td class="tbold">Basic Pay:</td>
            <td><?php echo $result['basicpay']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Functional Area:</td>
            <td><?php echo $result['fnarea']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Industry:</td>
            <td><?php echo $result['industry']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required UG Qualification:</td>
            <td><?php echo $result['ugqual']; ?></td>
        </tr>
        <tr>
            <td class="tbold">Required PG Qualification:</td>
            <td><?php echo $result['pgqual']; ?></td>
        </tr>
        

    </table>

</div> <!-- table content -->
    <div class="page-header" />

</div>
</body>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
