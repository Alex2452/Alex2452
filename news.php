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
<title>News</title>
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
function validateid(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Date.\n";
		}  else {
			fld.style.background = 'White';
		}
		return error;
	}
function validateFirstname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter title.\n";
		}  else if (!illegalChars.test(fld.value)) {
			
			error = " -The Title Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}


	
	function validateFormOnSubmit(theForm) {
		var reason = "";
		  reason+=validateid(theForm.userid);
		  reason+=validateFirstname(theForm.fname);
		 
		  
		      
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

?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><img src="../Image/l.png" width="70" height="40" /></a></p></font>
</div>
<div id="outer">
<div id="one"> 
<div id="holder">
  <div id="station">
  <div id="logo_text"> <img src="../Image/h3.PNG" alt="tree tops" width="902" height="132" /> <br /></div>
  </div>
   
  <div id="topss" >
 <nav id="ddmenu">
    
    <ul>
         <li class="no-sub">
           <a class="top-heading" a href="PerHome.php">Home</a>
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
<center><img src="../Image/news.PNG" width="654" height="61" ></center>
<div id="content">
 <center>
                                  <?php
 if(isset($_POST['Submit']))
 {
 $date=$_POST['userid'];
$title=$_POST['fname']; 
$news=$_POST['mname'];
 
{
$sql="INSERT INTO news (Date,Title,News)VALUES('$date','$title','$news')";

if (mysql_query($sql,$conn))
  
echo'<p class="success" style="color:#390"> Successfully news register!</p>';                                
		   echo' <meta content="6;news.php" http-equiv="refresh" />';	
}}

mysql_close($conn)
?>   
  <form  action="news.php" method="post" name="demo" onSubmit="return validateFormOnSubmit(this)">
<ul>
  <p>
    <label for="userid">Date:</label>
      <input type="text" name="userid" size="12" onBlur="userid_validation(5,12)" placeholder="YYYY/MM/DD"/>
  </br>
  </p>
  <p>
    <label for="fname">Title:</label>
    <input type="text" name="fname" size="30" onBlur="allLetter1()" placeholder="News title"/></br>
    </p>
  <p>
    <label for="sname">News:</label>
    
    <textarea name="mname" rows="5" cols="30" id="comment" placeholder="Message" placeholder="News"/></textarea>
    </br>
</p>
    </p></br>
    <center><input type="Submit" name="Submit" value="Submit" />
    <input type="reset" name="Reset" value="Reset" class="button"></center>
  </p>
</ul>
</form>   
    <form action="viewnews.php" method="post" >

        <center><input type="submit" name="submit" value="Show news" /></center>
         </form>              
 </center>
      </div>
      
           
    </div>
        <!-- row end -->
  </div>
    
    
      <div id="footer" >
  <p class="footer-text">Copyright &copy; Group-2 Members All Rights Reserved</p>

</div></div></div>
</body>
</html>
