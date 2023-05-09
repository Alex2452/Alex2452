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
<title>Delete account</title>
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
  function isdelete()
  {
   var d = confirm('Are you sure you want to Delete !!');
   if(!d)
   {
    alert(window.location='deleteaccount.php');
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
                 <H1 align="center">Delete Employee Account!</h1>

<table align='center' width="550px" style='text-align:justify;border-radius:15px;border:1px solid #000000; -webkit-box-shadow:0 0 18px rgba(0,0,0,0.4); -moz-box-shadow:0 0 18px rgba(0,0,0,0.4); box-shadow:0 0 18px rgba(0,0,0,0.4);'>
<tr>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#933;'><font color='white' size='2'>Emp_id</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#933;'><font color='white' size='2'>Name</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#933;'><font color='white' size='2'>Role</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#933;'><font color='white' size='2'>Username</th>
<th style='height:30px;	color:#000;	font-weight:bold;background-color:#933;'><font color='white' size='2'>Action</th>
</tr> 
                         <?php
$result = mysql_query("SELECT * FROM signup");
while($row = mysql_fetch_array($result))
  {
?>
<tr>
<td><?php echo $row['emp_id'];?></td>
<td><?php echo $row['Firstname']."&nbsp;".$row['Lastname'];?></td>
<td><?php echo $row['Role'];?></td>	
<td><?php echo $row['Username'];?></td>	
						<?php

						print("
		<td style='height:30px;'><a href = 'deleteac.php?emp_id=".$row['emp_id']."'><p onclick='isdelete();'><img src='../Image/del.PNG' alt='tree tops' width='50' height='30' /></p></a></td>
		");?>
		</tr>
<?php
  }
print( "</table>");
mysql_close($conn);
?>
                </div> 
 <br/><br/>
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

