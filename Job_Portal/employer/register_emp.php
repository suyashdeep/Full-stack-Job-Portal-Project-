<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title> NEW CLIENT REGISTRATION </title>

 <script type="text/javascript" src="/job_portal/js/validate.js"></script>
         <script>
             function checkForm() {
				
var email = document.getElementById("emailerror").innerHTML;
var pass1 = document.getElementById("pass1error").innerHTML;
var pass2 = document.getElementById("pass2error").innerHTML;
var compname = document.getElementById("comperror").innerHTML;
var addr = document.getElementById("addrerror").innerHTML;
var pincode = document.getElementById("pinerror").innerHTML;
var person = document.getElementById("personerror").innerHTML;
var phone = document.getElementById("pherror").innerHTML;
var about=document.getElementById("abouterror").innerHTML;

var p1=document.getElementById("pass1").value;
var p2=document.getElementById("pass2").value;
    if (p1 != p2) {
        document.getElementById("pass2error").innerHTML="Password Donot Match" ;
    }
    else
    {
        document.getElementById("pass2error").innerHTML="" ;

    }

if(email == "" && pass1 == "" && pass2 == "" &&  compname == "" && addr == "" && pincode == "" && person == "" && phone == "" && about == "") {

   
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

<!-- navigation bar starts here -->
<nav class="navbar" id="insidenav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">Job Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Employer Registration</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-left">
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>


<form role="form" id="regcomp" onsubmit="return checkForm()" class="form-horizontal"enctype="multipart/form-data" method="post" action="process_regemp.php">
<h3 class="h3style"> Your Login details </h3>

    
<div class="form-group">
    <label for="email" class="control-label col-sm-2">E-mail:</label>
    <div class="col-sm-4">
       <input type="email" required placeholder="Enter your email" class="form-control" name="email" id="email"
          onblur="validate('email','emailerror',this.value)">
    </div>
    <label class="error" id="emailerror"></label>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="pass1">Password:</label>
    <div class="col-sm-4">  
        <input type ="password"  placeholder="Enter your password" name="pass1" id="pass1" class="form-control"
               required onblur="validate('password','pass1error',this.value)">
    </div>
    <label class="error" id="pass1error"></label>
</div>

<div class="form-group">
    <label for="pass2" class="control-label col-sm-2"> Confrim Password: </label>
    <div class="col-sm-4">
        <input type ="password"  placeholder="Confirm your password" name="pass2" id="pass2" class="form-control" required>
    </div>
    <label class="error" id="pass2error"></label>
</div>

<div class="page-header"></div>
<h3 class="h3style"> Your Company Details</h3>


<div class="form-group">
  <label class="control-label col-sm-2"> Company Name:</label>
    <div class="col-sm-5"> 
      <input type ="text" class="form-control" name="compname" id="compname" placeholder="Enter Company Name"
             required onblur="validate('company','comperror',this.value)">
   </div>
    <label class="error" id="comperror"></label>
</div>


<div class="form-group">
   <label class="control-label col-sm-2" for="comtype"> Company Type: </label>
    <div class="col-sm-4 form-inline" id="comtype">
        <label class="radio-inline"><input type="radio" name="comtype" id="type1" value="Company">Company</label>
        <label class="radio-inline"><input type="radio" name="comtype" id="type2" value="Consultant">Consultant</label>
    </div>
    <label class="error" id="typeerror"></label>
</div>

 <div class="form-group">
                <label for="indtype" class="control-label col-sm-2">Industry:</label>
                <div class="col-sm-4"> 
                    <select name="indtype" id="indtype" class="form-control"  required>
                    <option selected="selected" value="">- Select an Industry -</option>
                   
                    <option value="Animation / Gaming">Animation / Gaming</option>
                    <option value="Architectural Services/ Interior Designing">Architectural Services/ Interior Designing</option>
                   
                    <option value="Biotechnology/Pharmaceutical/Clinical Research">Biotechnology/Pharmaceutical/Clinical Research</option>
                    <option value="Brewery/Distillery">Brewery/Distillery</option>
                    <option value="Cement/Construction/Engineering/Metals/Steel/Iron">Cement/Construction/Engineering/Metals/Steel/Iron</option>
                    <option value="Ceramics/Sanitaryware">Ceramics/Sanitaryware</option>
                    <option value="Chemicals/Petro Chemicals/Plastics">Chemicals/Petro Chemicals/Plastics</option>
                    <option value="Computer Hardware/Networking">Computer Hardware/Networking</option>
                   
                    <option value="CRM/ IT Enabled Services/BPO">CRM/ IT Enabled Services/BPO</option>
                    <option value="Education/Training/Teaching">Education/Training/Teaching</option>
                    <option value="Software Services">Software Services</option>
                    <option value="Steel">Steel</option>
                    <option value="Wellness/Fitness/Sports">Wellness/Fitness/Sports</option>
                </select>
          </div>
  <label class="error" id="inderror"></label>
</div>

<div class="form-group">
    <label for="addr" class="control-label col-sm-2">Address:</label>
      <div class="col-sm-5"><textarea id="addr" rows="5" name="addr" class="form-control" required 
          onblur="validate('address','addrerror',this.value)"></textarea>
    </div>
      <label class="error" id="addrerror"></label>
</div>

<div class="form-group">
      <label for="pincode" class="control-label col-sm-2">Pincode:</label>
       <div class="col-sm-4">
          <input type ="text" class="form-control" placeholder="Enter the pincode" name="pin_code" id="pincode"
                 required onblur="validate('pincode','pinerror',this.value)">
       </div>
      <label class="error" id="pinerror"></label>
</div>

<div class="form-group">
        <label class="control-label col-sm-2" for="person">Contact Person:</label>
        <div class="col-sm-4">
          <input type="text"class="form-control" placeholder="Enter Executive Name" id="person" name="person"
                 required onblur="validate('username','personerror',this.value)">
          <label class="error" id="personerror"></label>
        </div>
</div>

<div class="form-group">
        <label class="control-label col-sm-2" for="phone">Contact Number:</label>
        <div class="col-sm-4">
          <input type="text"class="form-control" placeholder="Enter Contact Number" id="phone" name="phone"
                 required onblur="validate('mobilenum','pherror',this.value)">
          <label class="error" id="pherror"></label>
        </div>
</div>

    <div class="form-group">
        <label class="control-label col-sm-2">About Company:</label>
        <div class="col-sm-5">
            <textarea placeholder="Describe your company" class="form-control" rows="5" required onblur="validate('longtext','abouterror',this.value)"></textarea>
            <label class="error" id="abouterror"></label>
        </div>
    </div>
   <div class="page-header"> </div>

        <div class="form-group form-inline col-sm-10">

        <button class="btn btn-success" type="submit"  id="reg" value="submit">Register</button>
        <label class="col-sm-2"></label>
        <button class="btn btn-danger" type="reset" id="reset"> Reset </button>

</div>
</form>
</div>
<div class="page-header"> </div>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
