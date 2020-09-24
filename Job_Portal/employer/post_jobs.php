<?php

include_once('../config.php');
session_start();
if(!isset($_SESSION['eid'])){
    header('location:../login.php?msg=please_login');
}
?>
<!DOCTYPE HTML>
<html>
    <head> 
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Post Jobs </title>
         <script>
             function checkForm() {

var desig = document.getElementById("deser").innerHTML;
var vacancy = document.getElementById("vacer").innerHTML;
var desc = document.getElementById("jober").innerHTML;
var fnarea = document.getElementById("fner").innerHTML;

var pay = document.getElementById("payer").innerHTML;


if(desig == '' && vacancy == '' && desc == '' &&  fnarea =='' && pay=='') {
   return true;

}
else {
alert("Fill in with correct information");
    return false;

}
        }
 </script>
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
                    <li class="active"><a href="#">Job Posting</a></li>
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
        <br/>
        <center><h2>Post Jobs </h2></center>
        <div class="page-header" style="background: dodgerblue"></div>
        <h3> Job Details: </h3>
          <div class="page-header" />
        <form id="job_post" role="form" onsubmit="return checkForm();" method="post" class="form-horizontal" action="process_postjob.php">
           
            <div class="form-group">
                <label for="desig" class="control-label col-sm-2">Job Title/ Designation:</label>
                 <div class="col-sm-4"> 
                      <input type="text" class="form-control" name="desig" id="desig" required onblur="validate('text','deser', this.value);">
                 </div>
                 <label id="deser" class="error"></label>
            </div>
            
             <div class="form-group">
                  <label for="vac_no" class="control-label col-sm-2">Number of vacancies:</label>
                  <div class="col-sm-2">  <input type="text" name="vacno" class="form-control" id="vac_no"  required onblur="validate('digit','vacer', this.value)" > </div>
                  <label id="vacer" class="error"></label>
            </div>
            
             <div class="form-group">
                <label for="job_desc" class="control-label col-sm-2">Job Description:</label>
                  <div class="col-sm-5">  <textarea class="form-control" rows="5" id="job_desc" name="jobdesc" required onblur="validate('longtext','jober',this.value)"></textarea> </div>
                <label class="error" id="jober"></label>
            </div>
            
             <div class="form-inline form-group">
                <label for="exp" class="control-label col-sm-2">Work Experiecne:</label>
                  <div class="col-sm-4">
                       <select class="form-control" name="exp" required name="exp" id="exp">
                           <option value=""> -Select- </option>
                            <option value="1">1 </option>
                             <option value="2">2 </option>
                              <option value="3">3 </option>
                               <option value="4">4 </option>
                                <option value="5"> 5</option>
                                 <option value="6">6 </option>
                                  <option value="7">7 </option>
                                   <option value="7 above"> above 7</option>
                       </select> <span> Minimum Years </span>
                   </div>
             </div>
             
            <div class="form-inline form-group">
                <label for="pay-div" class="control-label col-sm-2">Basic Pay:</label>
                  <div class="col-sm-4" id="pay-div">
                         <select class="form-control" id="money" name="money"> 
                           <option value="Rs"> Rs </option>
                           <option value="USD"> USD </option>
                           </select>
                        <input type="text" class="form-control" id="pay" name="pay" required onblur="validate('digit','payer',this.value)">
                   </div>
                   <label class="error" id="payer"></label>
            </div>
            
            <div class="form-group">
                <label for="fnarea" class="control-label col-sm-2">Functional Area:</label>
                 <div class="col-sm-4">  <input type="text" class="form-control" id="fnarea" required name="fnarea"> </div>
                 <label class="error" id="fner"></label>
               
            </div>
           
            <div class="form-group">
                <label for="indtype" class="control-label col-sm-2">Industry:</label>
                <div class="col-sm-5">
                <select name="indtype" id="indtype" class="form-control"  required>
                    <option selected="selected" value="">- Select an Industry -</option>
                    <option value="Accessories/Apparel/Fashion Design">Accessories/Apparel/Fashion Design</option>
                    <option value="Accounting/Consulting/Taxation">Accounting/Consulting/Taxation</option>
                   
                    <option value="Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants">Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants</option>
                    <option value="Animation / Gaming">Animation / Gaming</option>
                   
					<option value="Computer Hardware/Networking">Computer Hardware/Networking</option>
                    <option value="Consumer FMCG/Foods/Beverages">Consumer FMCG/Foods/Beverages</option>
                    
                    <option value="Education/Training/Teaching">Education/Training/Teaching</option>
                    <option value="Electricals/Switchgears">Electricals/Switchgears</option>
                    
                    <option value="Healthcare/Medicine">Healthcare/Medicine</option>
                   <option value="Software Services">Software Services</option>
                    <option value="Steel">Steel</option>
                   
                    <option value="Wellness/Fitness/Sports">Wellness/Fitness/Sports</option>
                </select>
                </div>
            </div>
            <h3> Desired Candidate Profile:</h3>
            <div class="page-header" />
                <div class="form-group">
                    <label for="ugcourse" class="control-label col-sm-2">Specify UG Qualification:</label>
                    <div class="col-sm-4 "><select name="ugcourse" id="ugcourse"  name="ugcourse" class=" form-control" required>
               <option value="" label="Select">Select</option>
               <option value="B.A">B.A</option>
               <option value="B.Arch">B.Arch</option>
               <option value="BCA">BCA</option>
               <option value="B.B.A">B.B.A</option>
               <option value="B.Com">B.Com</option>
               <option value="B.Ed">B.Ed</option>
               <option value="BDS">BDS</option>
               <option value="BHM">BHM</option>
               <option value="B.Pharma">B.Pharma</option>
               <option value="B.Sc">B.Sc</option>
               <option value="B.Tech/B.E.">B.Tech/B.E.</option>
               
               <option value="Other">Other</option>
               </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pgcourse" class="control-label col-sm-2">Specify PG Qualification:</label>
                    <div class="col-sm-4">
                        <select name="pgcourse" id="pgcourse" name="pgcourse"  class="form-control" required>
                            <option value="">Select</option>
                              <option value="Not Pursuing Post Graduation"> Not Required</option>
                             
                              <option value="Integrated PG">Integrated PG</option>
                              <option value="LLM">LLM</option>
                              <option value="M.A">M.A</option>
                              <option value="M.Arch">M.Arch</option>
                              <option value="M.Com">M.Com</option>
                              <option value="M.Ed">M.Ed</option>
                              <option value="M.Pharma">M.Pharma</option>
                              <option value="M.Sc">M.Sc</option>
                              <option value="M.Tech">M.Tech</option>
                              <option value="MBA/PGDM">MBA/PGDM</option>
                              <option value="MCA">MCA</option>
                              <option value="MS">MS</option>
                              
                             <option value="Other">Other</option>
                         </select> 
                    </div>
                </div>
                
                <div class="page-header" />
                <p> Are you sure to submit the job! Check for errors before submitting the job</p>
                <div class="form-group col-sm-2">
                     <button class="btn btn-lg btn-primary btn-block" type="submit" id="postbtn">Post Job</button>
        </form>
           </div>
    </body>
 <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
 <link href="../css/main.css" rel="stylesheet">
 <link href="../css/employer.css" rel="stylesheet">
 <script type="text/javascript" src="../js/validate.js"></script>
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
