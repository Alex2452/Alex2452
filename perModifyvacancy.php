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
<title>New Employee register form</title>
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
 #content{
			 margin-left:150px; 
			 border:1px solid #996633; 
			 border-radius:50px;
			 margin-top:15px;
			 box-shadow:10px 20px 10px #996633; 
			 width:600px;
			  height:430px;
			  }		  

</style>
<script type="text/javascript">

function validatedep(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter department.\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 15)) {
			
			error = " -The department Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The department Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

function validateacadamic(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter acadamic rank.\n";
		} else if ((fld.value.length < 4) || (fld.value.length > 15)) {
			
			error = " -The acadamic rank Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The acadamic rank Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}


	function validatefield(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Field of specialization Required.\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 15)) {
			
			error = " -The Field of specialization Required Must Be More Than 4 Characters.\n";
		}  else {
			fld.style.background = 'White';
		}
		return error;
	}
 

 function validatenumber(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Number of staff Required.\n";
		} else if ((fld.value.length < 1) || (fld.value.length > 4)) {
			
			error = " -Number of staff Required Must Be More Than or equal to 1 digit.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Number of staff Required Contains Illegal Characters.\n";
		} 
		else {
			fld.style.background = 'White';
		}
		return error;
	}
	
	function validategender(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter gender.\n";
		} 
		else {
			fld.style.background = 'White';
		}
		return error;
	}
	
    function validatstartdate(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter start date.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
  
  function validatenddate(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter end date.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

	
	function validateFormOnSubmit(theForm) {
		var reason = "";
		  reason+=validatedep(theForm.dep);
		  reason+=validateacadamic(theForm.acad);
		  reason+=validatefield(theForm.field);
		  reason+=validatenumber(theForm.number);
		  reason+=validategender(theForm.sex);
		  reason+=validatstartdate(theForm.start);
		  reason+=validatenddate(theForm.end);
		  
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
?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="../Image/l.png" width="70" height="40" /></a></p></font>
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
           <a class="top-heading" a href="PerHome.php">Home </a>
        </li>
        <li class="no-sub">
           <a class="top-heading" a href="perRegi.php">Registration</a>
        </li>
       

         <li class="no-sub">
           <a class="top-heading" a href="perSearchinfo.php">Search </a>
        </li>
        <li class="no-sub">
		<a class="top-heading" a href="perModifyvacancy.php">Vacancy announce</a>
		</li>
        
    </ul>
</nav>

</div>
	<br><br>
<div id="slides">
 <center><img src="../Image/vac.PNG" width="654" height="61" ></center>
<div id="content"><center>
<center>
                     <?php
 if(isset($_POST['Submit']))
 {
 $dep=$_POST['dep'];
$acad=$_POST['acad'];
$fiel=$_POST['field'];
$num=$_POST['number'];
$Gen=$_POST['sex'];
$sreg=$_POST['start'];
$ereg=$_POST['end'];
 
{
$sql="INSERT INTO vacancy(Departement,Academic_rank,Fieldofspecialization,Numberof_staff,gender,Registrationstartdate,registrationenddate) VALUES ('".$dep."','".$acad."','".$fiel."','".$num."','".$Gen."','".$sreg."','".$ereg."')";

if (mysql_query($sql,$conn))
  {
         

echo'<p class="success" style="color:#390"> Successfully vacancy register!</p>';                                
		   echo' <meta content="6;perModifyvacancy.php" http-equiv="refresh" />';	
}}}

mysql_close($conn)
?>   </center>
     <table cellpadding="5" cellspacing="10" >
          
            <form  method="post" action="perModifyvacancy.php" name="demo" onSubmit="return validateFormOnSubmit(this)">          
            <tr><td>Department:</td>
            <td><input type="text" name="dep" id="id" placeholder="Department"/></td></tr>
            <tr>
            <td>Academic Rank:</td>
            <td><input type="text" name="acad" id="salary" placeholder="Academic rank"/></td>
            
            </tr>			
            <tr>
            <td>Field of specialization Required:</td>
            <td><input type="text" name="field" id="salary" placeholder="Field"/>&nbsp;</td>
            
            </tr>
            <tr>
            <td>Number of staff Required:</td>
            <td><input type="text" name="number" id="age" placeholder="Number"/>
            <span id="ageerror" class="error" ></span></td>&nbsp;&nbsp;&nbsp;&nbsp;
            </tr>
            <tr>
            <td>Gender</td>
            <td><input type="text" name="sex" id="id" placeholder="F/M"/></td></tr>
            <tr>
            <td>Registration start date</td>
            <td><input type="text" name="start" id="salary"  placeholder="YYYY/MM/DD"/></td>
            &nbsp;&nbsp;&nbsp;&nbsp;
            </tr>
            <tr>	
            <td>Registration end date</td>
            <td><input type="text" name="end" id="id" placeholder="YYYY/MM/DD"/></td></tr>
            <tr>
            <td ><input type="submit" value="Save" class="button" name="Submit">  </td>
            <td><input type="reset" value="Clear" class="button" /></td>
            <td><a href="viewvacancy.php"><input type="button" value="view vacancy" /></a></td>
            </tr>
            </form>
            </table>
              </center>
     </div> 

                <div id="content2">
                    <div class="greeting">
                   
                    <?php
echo '<hr>';
echo'<p align="center">';
include('Clock.php');
echo'</p>';
?>
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

