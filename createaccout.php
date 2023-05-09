<?php
	include("connection.php");  
 session_start();
if(isset($_SESSION['emp_id']))
 {
  $mail=$_SESSION['emp_id'];
 } else {
 ?>

<script>
  alert('You are not logged In !! Please Login to access this page');
  alert(window.location='logini.php');
 </script>
 <?php
 }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Create account</title>
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
<script type="text/javascript">
function validateid(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter employee Id.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The employee id only nuber.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
function validateFirstname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter First Name.\n";
		} else if ((fld.value.length < 4) || (fld.value.length > 15)) {
			
			error = " -The First Name Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The First Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}


	function validateLastname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Last Name.\n";
		} else if ((fld.value.length < 4) || (fld.value.length > 15)) {
			
			error = " -The Last Name Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Last Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
 
 function validateagename(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Age.\n";
		} else if ((fld.value.length < 1) || (fld.value.length > 7)) {
			
			error = " -Age Must Be More Than or equal to 1 digit.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Age Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

	function validaterolename(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Please choose the role.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
  
  function validateUsername(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter User Name.\n";
		} else if ((fld.value.length < 4) || (fld.value.length > 15)) {
			
			error = " -The User Name Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The User Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

	function validatePassword(fld) {
		var error = "";
		var illegalChars = /[\W_]/; // allow only letters and numbers 
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter A Password.\n";
		} else if ((fld.value.length < 6) || (fld.value.length > 15)) {
			error = " -The Password Must Be More Than 6 Characters. \n";
			
		} else if (illegalChars.test(fld.value)) {
			error = " -The Password Contains Illegal Characters.\n";
			
		} else if (!((fld.value.search(/(a-z)+/)) && (fld.value.search(/(0-9)+/)))) {
			error = " -The Password Must Contain At Least One Numeral.\n";
			
		} else {
			fld.style.background = 'White';
		}
	   return error;
	}   

	function trim(s)
	{
	  return s.replace(/^\s+|\s+$/, '');
	}

	function validateEmail(fld) {
		var error="";
		var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
		var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
		var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
	   
		if (fld.value == "") {
			
			error = " -You Didn't Enter An Email Address.\n";
		} else if (!emailFilter.test(tfld)) {              //test email for illegal characters
		
			error = " -Please Enter A Valid Email Address.\n";
		} else if (fld.value.match(illegalChars)) {
			
			error = " -The Email Address Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
	function equalPassword(e,r)
	{
		var error = "";
		if (r.value == "") {
			
			error = " -You didn't Re Enter A Password.\n";
		} else if (r.value != e.value) {              //test email for illegal characters
			
			error = " -Please Re Enter A Match Password.\n";
		}
		return error;
	}
	function validateFormOnSubmit(theForm) {
		var reason = "";
		  reason+=validateid(theForm.id);
		  reason+=validateFirstname(theForm.fn);
		  reason+=validateLastname(theForm.ln);
		  reason+=validateagename(theForm.age);
		  reason+=validaterolename(theForm.role);
		  reason += validateUsername(theForm.un);
		  reason += validatePassword(theForm.pass);
		  reason += equalPassword(theForm.pass,theForm.rePass);
		  reason += validateEmail(theForm.email);
		  
		      
		  if (reason != "") {
		    alert("Some Fields Need Correction:\n" + reason);
		    return false;
		  }
		
		  return true;
	}
	
</script>
</head>
<body style="">
<div id="well">
<?php
$r=$_SESSION['emp_id'];
$logout_query=mysql_query("select * from signup where emp_id='$r'");
$row=mysql_fetch_array($logout_query);
$type=$row['Role'];


?>
<p><font color="white">Welcome:<b><?php echo $type;?></b>
<?php echo $row['Firstname'] ;
//echo '<img src="../Image/man.PNG" width="50" height="50">';
?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="../Image/l.png" width="70" height="40" /></a></p></font>
</div>
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
           <a class="top-heading" a href="Admihome.php">Home</a>
			          
            
        </li>
         <li class="no-sub">
           <a class="top-heading" a href="perGenratereport.php">Genrate report</a>
        </li>
        <li class="no-sub">
		<a class="top-heading" a href="Admisearch.php">Search</a>
		</li>
        
        <li class="no-sub">
            <a class="top-heading" a href="admidepar.php">Department</a>
			
           
        </li>
        <li class="no-sub">
            <a class="top-heading" a href="viewcomment.php">View comment</a>
        </li>
    </ul>
</nav>

</div>
	<br><br>
<div id="slides">

<div id="content">
     <div id="account">
       
                   <h1> Manage Account</h1>
                              <ul>
                                 <li><a href="createaccout.php"><input type="button" value="Create account" class="button_example"/></a></li><br />
                                 <li> <a href="deleteaccount.php"><input type="button" value="Delete account" class="button_example"/></a></li><br />
                                 <li> <a href="updatepass.php"> <input type="button" value="Update account" class="button_example"/></a></li><br />
                              </ul>
  </div>     
 <div id="image">
   <div id="sidebar1">
                 <?php
 if(isset($_POST['Submit']))
 {
 $id=$_POST['id'];
 $fn=$_POST['fn'];
 $ln=$_POST['ln']; 
 $age=$_POST['age'];
 $role=$_POST['role'];
 $email=$_POST['email'];
 $user=$_POST['un'];
 $pass=$_POST['pass'];
 $cpass=$_POST['rePass'];
 
if($pass==$cpass)
{
	/*if($age<18)
	{
	echo"<script>alert('Check Your Age');</script>";
	}
	else if($age>65)
	{
		echo"<script>alert('Check Your Age');</script>";
}
else*/
{
$sql="INSERT INTO signup (emp_id,Firstname,Lastname,age,Role,email,Username,Password)
VALUES
('$id','$fn','$ln','$age','$role','$email','$user','$pass')";

if (!mysql_query($sql,$conn))
  {
         
		 echo'<P style="color:red" > Error Already Registered with this employee ID</p>';
		 echo' <meta content="10;createaccout.php" http-equiv="refresh" />';
		 
    }
  else
  {
echo'<p class="success" style="color:#390"> Account is created successfully</p>';                                
		   echo' <meta content="6;createaccout.php" http-equiv="refresh" />';	
}}}
else
{
       echo'  <p class="wrong" style="color:red;">Your Password Does not match!!</p>';
	   echo'<meta content="10;createaccout.php" http-equiv="refresh"/>';
	   
	   }
	   }
mysql_close($conn)
?>          
                            <form name="demo" onSubmit="return validateFormOnSubmit(this)"  action="createaccout.php" method="post" >
<table width="316">
<caption><h1><b>Create user account</b></h1></caption>
     <tr>
		<td width="92" style="height: 30px">
		Emp_Id:&nbsp;&nbsp;</td>
		<td width="179" style="height: 30px">
			<input name="id" type="text" placeholder="Emp-Id">
		</td>

	</tr>
    <tr>
		<td width="92" style="height: 30px">
		First Name:&nbsp;&nbsp;</td>
		<td width="179" style="height: 30px">
			<input name="fn" type="text" placeholder="First name">
		</td>

	</tr>
    <tr>
		<td width="92" style="height: 30px">
		Last Name:&nbsp;&nbsp;</td>
		<td width="179" style="height: 30px">
			<input name="ln" type="text" placeholder="Last name">
		</td>

	</tr>
    <tr>
		<td width="92" style="height: 30px">
		Age:&nbsp;&nbsp;</td>
		<td width="179" style="height: 30px">
			<input name="age" type="text" placeholder="Age">
		</td>

	</tr>
    <tr>
		<td width="92" style="height: 30px">
         Role:&nbsp;&nbsp;
     
		</td>
		<td width="179" style="height: 30px">
			<select name="role" onBlur="statusselect()">
                          <option></option>
                          <option>Administrator</option>
                          <option>Employee</option>
                          <option>Personnel</option>
                        
                          
        </select>
		</td>

	</tr>
	<tr>
		<td width="92" style="height: 30px">
		User Name:&nbsp;&nbsp;</td>
		<td width="179" style="height: 30px">
			<input name="un" type="text" placeholder="Username">
		</td>

	</tr>
	<tr>
		<td>
		Password:&nbsp;&nbsp;</td>
		<td>
			<input name="pass" type="password" placeholder="****************">
		</td>

	</tr>
	<tr>
		<td style="height: 30px">
		Re Password:&nbsp;&nbsp;</td>
		<td style="height: 30px">
			<input name="rePass" type="password" placeholder="****************">
		</td>

	</tr>
	<tr>
		<td>
		Email:&nbsp;&nbsp;</td>
		<td>			<input name="email" type="text" placeholder="example@gmail.com">
		</td>

	</tr>
	<tr>
		<td>
		</td>
		<td>
			<input name="Submit" type="submit" value="submit">
            <input  type="reset" value="Cancel" />
		</td>

	</tr>
</table>
</form>			 
                                 
                </div> 
 <br /><br />
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

