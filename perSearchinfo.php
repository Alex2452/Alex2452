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
<title>Search Employee info</title>
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
function validateUsername(fld) {
		var error = "";
		var illegalChars = /\W/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter search term.\n";
		}  else if (illegalChars.test(fld.value)) {
			
			error = " -The search term Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
	function validateFormOnSubmit(theForm) {
		var reason = "";
		  reason += validateUsername(theForm.searchterm);
		  
		  
		  
		      
		  if (reason != "") {
		    alert("Some Fields Need Correction:\n" + reason);
		    return false;
		  }
		
		  return true;
	}
</script>
<style>
a{text-decoration:none;}
a:link {color:#09F;}    /* unvisited link */
a:visited {color:#F30;} /* visited link */
a:hover {color:#690;}   /* mouse over link */
a:active {color:#C06;}  /* selected link */
input[type=text]:focus{border-color:#2ADF00; color:#FF1F00; font-weight:bold;}
textarea:focus{border-color:#2ADF00; color:#FF1F00;}
select{width:100px;height:30px; font-size:15px;}

select:focus{border-color:#2ADF00; color:#09F;}

input {
	outline: none;
}
input[type=search] {
  -webkit-appearance: textfield;
	-webkit-box-sizing: content-box;
	font-family: inherit;
  font-size: 100%;
}
input::-webkit-search-decoration,
input::-webkit-search-cancel-button {
  display: none; 
}


input[type=search] {
  background: #ededed url(search-icon.png) no-repeat 9px center;
	border: solid 1px #ccc;
	padding: 9px 10px 9px 32px;
	width: 155px;
	
	-webkit-border-radius: 10em;
	-moz-border-radius: 10em;
	border-radius: 10em;
	
	-webkit-transition: all .5s;
	-moz-transition: all .5s;
	transition: all .5s;
}
input[type=search]:focus {
	width: 230px;
	background-color: #fff;
	border-color: #66CC75;
	
	-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
	-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
	box-shadow: 0 0 5px rgba(109,207,246,.5);
}


</style>
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

<div id="content">
<div id="login">
  
        <h1 align="center"><img src="../Image/search.jpg" width="350" height="80"></h1>

<center>
<form action="searchper.php" method="post">
<table border="0" cellspacing="20">

<tr><td>Choose Search Type<br/><select name="searchtype">
<option value="emp_id">Emp_id</option>
<option value="Fname">Name</option>
<option value="Department">Depertment</option>
</select>
</td>
<td>Enter Search Term <br/>
<input name="searchterm" type="search" size="40"/></td>
</tr>


<tr><td colspan="2"><center><input type="submit" name="submit" value="Search"/></center></td></tr>
</table>
</form>

        <form action="allemployesresult1.php" method="post" >

        <center><input type="submit" name="submit" value="Show all Employes" /></center>
         </form>
        </table>
                  </center></div>    
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

