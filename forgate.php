<?php
include("connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>login form</title>
<!--slide show-->
	<link href="themes/8/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/8/js-image-slider.js" type="text/javascript"></script>
    <link href="themes/8/tooltip.css" rel="stylesheet" type="text/css" />
    <script src="themes/8/tooltip.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
   <!--End of slide show-->
    <link href="ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="ddmenu.js" type="text/javascript"></script>
<link href="styles.css" rel="stylesheet" type="text/css" media="screen"/>

<style>
.error {
color: red;
}
</style>
<script type="text/javascript">


 function checkFirstName(form)
{
  var eobj=document.getElementById('firstnameerror');
  var sfirstname = form.un.value;
  var oRE = /^[a-zA-Z]+$/;
  var error=false;
  eobj.innerHTML='';
  if (sfirstname == '') {
  error='You didnot enter a username.!';
   document.form.un.focus();
  }
 else if(!sfirstname.match(oRE))
 {
	error='The username contains illegal characters.!';
   document.form.un.focus(); 
	 }
  if (error)
{
   document.form.un.focus();
   eobj.innerHTML=error;
   return false;
  }
  return true;
 }
 




 
 function checkpassword(form)
{
  var eobj=document.getElementById('passworderror');
  var semail = form.pw.value;
  var oRE = /([\w\-]+\@[\w\-]+\.[\w\-]+$)/;
  var error=false;
  eobj.innerHTML='';
  if (semail == '') {
   error='please enter a password.';
   form.pw.focus();
  }
  

  if (error)
{
   form.pw.focus();
   eobj.innerHTML=error;
   return false;
  }
  return true;
 }


function validate() 
 {
 var form = document.forms['form'];
 var ary=[checkFirstName,checkpassword];
 var rtn=true;
 var z0=0;
 for (var z0=0;z0<ary.length;z0++)
{
  if (!ary[z0](form))
  {
    rtn=false;
  }
 }
 return rtn;
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css" rel="stylesheet">
        /*The following are for this demo page only (not required for the ddmenu).*/
        body { }
    </style>
<style type="text/css">
h1,h2,h3,h4,h5,h6 {
	font-weight: bold;
}
body,td,th {
	color: #000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<body style="">
<div id="outer">
<div id="one"> 
<div id="holder">
  <div id="station">
  <div id="logo_text"> <img src="../Image/h3.PNG" alt="tree tops" width="902" height="132" /> </div>
  </div>
   
  <div id="topss" >
 <nav id="ddmenu">
    
    <ul>
        <li class="no-sub">
           <a class="top-heading" a href="Home.php">Home</a>
			          
            
        </li>
        <li class="no-sub">
		<a class="top-heading" a href="ContactUs.php">Contact us</a>
		</li>
        
        <li class="no-sub">
            <a class="top-heading" a href="AboutUs.php">About Us</a>
			
           
        </li>
        <li class="no-sub">
            <a class="top-heading" a href="Vacancy.php">Vacancy  Announce</a>
        </li>
		
		<li class="no-sub">
            <a class="top-heading" a href="logini.php">Login</a>
        </li>
        
    </ul>
</nav>

</div>

	<br><br>
<div id="slides">

<div id="content">
<div id="login">
   <?php
 if(isset($_POST['view']))
  {
   $email=$_POST['email'];
   $user_id=$_POST['user_id'];
   $lname=$_POST['lname'];
   $sql="SELECT * FROM signup where email='$email' AND emp_id='$user_id' AND Username='$lname';"; 
   $result_set=mysql_query($sql,$conn);
   if(!$result_set)
   {
   die("Query failed".mysql_error());
   }
if(mysql_num_rows($result_set)>0)
{
while($row=mysql_fetch_array($result_set))
{
$fname=$row[1];
$password=$row['Password'];
echo"<p class='success'>&nbsp;"."Hi"."&nbsp; &nbsp;".$fname."&nbsp; &nbsp;"."your password is:".$password."</p>";
echo'<meta content="10;logini.php" http-equiv="refresh" />';

}}
else
{
echo"<p class='wrong'>&nbsp;&nbsp;Incorrect Input</p>";
echo'<meta content="5;forgate.php" http-equiv="refresh" />';
}
}
mysql_close($conn);
?>
  
  <script type='text/javascript'>
function formValidation(){
var email = document.getElementById('email');
var lastname= document.getElementById('lname');
var user_id = document.getElementById('user_id');	
if(isAlphabet(lastname, "please enter Your Last Name in letters only")){
if(lengthRestriction(lastname, 3, 30,"for your Last Name")){
if(isAlphanumeric(user_id,"Please Enter the Correct ID No (!@#$%^&*()*+=~`) Not allowed")){
if(lengthRestriction(user_id, 2, 15,"for your ID No")){
if(emailValidator(email,"check your e-mail format")){
	return true;
	}}}}}
return false;		
}	
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function madeSelection(elem, helperMsg){
	if(elem.value =="-select-"){
	alert(helperMsg);
		elem.focus();
		return false;
		}
	else{
		return true;
		
	}
}
function isNumeric(elem, helperMsg){
	var numericExpression = /^[0-9]+$/;
	if(elem.value.match(numericExpression)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function lengthRestriction(elem, min, max, helperMsg){
	var uInput = elem.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		alert("Please enter Above " +min+ " characters" +helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphanumeric(elem, helperMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}

	</script>
<!--End of PHP-->
<form action="forgate.php" method="POST" onsubmit='return formValidation()'>
<br><br>
<table class="log_table" align="center">
<tr bgcolor="#000000"><th colspan="2"><font color="#ffffff" style="text-decoration:underline;">Do You forget Your Password?</font></th></tr>
<tr>
<td>
<label>Email</label>
</td>
<td>
<input type="text" name="email" title="email" id='email' required/>
</td>
</tr>
<tr>
<td>
<label>Emp ID</label>
</td>
<td>
<input type="text" name="user_id" title="user id" id="user_id" required/>
</td>
</tr>
<tr>
<td>
<label>User Name.</label>
</td>
<td>
<input type="text" onKeyPress="return isNumberKey(event)" name="lname" title="User Name" id="lname" required/>
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" name="view" value="View" class="button_example"/>&nbsp;&nbsp;
<input type="reset" value="Clear" class="button_example"/>
</td>
</tr>
</table>
</form>
                  </div>    
                </div> 
       
               
             
    </div>
        <!-- row end -->
  </div>
    
    
      <div id="footer" >
  <p class="footer-text">Copyright &copy; Group-2 Members All Rights Reserved</p>

</div></div></div>
</body>
</html>

