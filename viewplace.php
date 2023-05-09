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
<title>Department placement</title>
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
function validateid(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Department Id.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The department id only nuber.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
function validatedepname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Department Name.\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 15)) {
			
			error = " -The Department Name Must Be More Than 2 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Department Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

function validateFacultyname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Faculty Name.\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 15)) {
			
			error = " -The Facul Name Must Be More Than 2 Characters.\n";
		} else if (!illegaltyChars.test(fld.value)) {
			
			error = " -The Faculty Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}


	function validateFormOnSubmit(theForm) {
		var reason = "";
		  reason+=validateid(theForm.id);
		  reason+=validatedepname(theForm.dep);
		  reason+=validateFacultyname(theForm.fac);
		  if (reason != "") {
		    alert("Some Fields Need Correction:\n" + reason);
		    return false;
		  }
		
		  return true;
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
<script type="text/javascript">
  function isdelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='viewplace.php');
   }
   else
   {
   return false;
    
   }
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
<h1 align="center">View Placement</h1>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("hrm", $con);
$result = mysql_query("SELECT * FROM dep");
echo "<table border='1' cellpadding='6' align='center' >
<tr >
<th bgcolor='#990000'>Department ID</th>
<th bgcolor='#990000'>Department</th>
<th bgcolor='#990000'>Facultiy</th>
<th bgcolor='#990000'>Action</th>

</tr>";
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
echo "<td>" . $row['Dep_id'] . "</td>";
echo "<td>" . $row['Department'] . "</td>";
echo "<td>" . $row['Facultiy'] . "</td>";
echo "<td >" ."<a href='deletedep.php ?del=$row[Dep_id]'><p onclick='isdelete();'><img src='../Image/del.PNG' alt='tree tops' width='50' height='30' /></p></a> ". "</td>";

echo "</tr>";
}
echo "</table>";
mysql_close($con);
?>
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

