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
<title>Genrat report based on salary</title>
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
    
    <ul><li class="no-sub">
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
       
                   <h2> Genrate report</h2>
                              <ul>
                              <li> <a href="salery.php"><img src="../Image/arr2.PNG" width="150" height="80"></a></li><br />
                                 <li><a href="education.php"><img src="../Image/arr1.PNG" width="100" height="80"></a></li><br />
                                 
                                 
                              </ul>
  </div>     
 <div id="image">
   <div id="sidebar1">
                  <center><h1>Salary Report Result</h1>
           <?php
@$db = new mysqli('localhost', 'root', '', 'hrm');
if (mysqli_connect_errno()) {
echo 'Error: Could not connect to database. Please try again later.';
exit;
}
$dip="970";
$d="1670";
$deg="1671";
$de="4500";
$Mas="4501";
$m="7000";
$doc="7001";
$do="12000";
$ner="1100";
$n="2456";
$m="Male";
$f="Female";
$mdipquery ="SELECT* FROM emp_register where  salary<='".$d."' AND salary>='".$dip."' AND sex='".$m."'";
$mdipres=@$db->query($mdipquery);  
$mdipnum_results = $mdipres->num_rows;

$fdipquery ="SELECT* FROM emp_register where salary<='".$d."' AND salary>='".$dip."'  AND sex='".$f."'";
$fdipres=@$db->query($fdipquery);  
$fdipnum_results = $fdipres->num_rows;

$mdegquery ="SELECT* FROM emp_register where salary<='".$de."' AND salary>='".$deg."'  AND sex='".$m."'";
$mdegres=@$db->query($mdegquery);  
$mdegnum_results = $mdegres->num_rows;

$fdegquery ="SELECT* FROM emp_register where salary<='".$de."' AND salary>='".$deg."'  AND sex='".$f."'";
$fdegres=@$db->query($fdegquery);  
$fdegnum_results = $fdegres->num_rows;

$mMasquery ="SELECT* FROM emp_register where salary<='".$m."' AND salary>='".$Mas."' AND sex='".$m."'";
$mMasres=@$db->query($mMasquery);  
$mMasnum_results = $mMasres->num_rows;

$fMasquery ="SELECT* FROM emp_register where salary<='".$m."' AND salary>'".$Mas."' AND sex='".$f."'";
$fMasres=@$db->query($fMasquery);  
$fMasnum_results = $fMasres->num_rows;


$mdocquery ="SELECT* FROM emp_register where  salary>='".$doc."'  AND sex='".$m."'";
$mdocres=@$db->query($mdocquery);  
$mdocnum_results = $mdocres->num_rows;

$fdocquery ="SELECT* FROM emp_register where salary>='".$doc."'  AND sex='".$f."'";
$fdocres=@$db->query($fdocquery);  
$fdocnum_results = $fdocres->num_rows;



$dipt=$fdipnum_results+$mdipnum_results;
$degt=$fdegnum_results+$mdegnum_results;
$mast=$fMasnum_results+$mMasnum_results;
$doct=$fdocnum_results+$mdocnum_results;



echo'<table  border = 5 class="tble";text-size="16" width="85%">
      <tr bgcolor="#996633"><td>Salary </td><td>Male</td><td>Female</td><td>Total</td></tr>
	  <tr align="center" >
	  <td>970-1670</td>
	  <td >'.$mdipnum_results.'</td>
	  <td >'.$fdipnum_results.'</td>
	  <td  >'.($dipt).'</td>
	  </tr>
	  <tr align="center">
	  <td>1671-4500</td>
	  <td >'.$mdegnum_results.'</td>
	  <td>'.$fdegnum_results.'</td>
	  <td >'.($degt).'</td>
	  </tr>
	  <tr align="center">
	  <td>4500-7000</td>
	  <td >'.$mMasnum_results.'</td>
	  <td >'.$fMasnum_results.'</td>
	  <td >'.($mast).'</td>
	  </tr>
	  
	  
	   <tr align="center">
	   <td>More than 7001</td>
	   <td >'.$mdocnum_results.'</td>
	   <td  >'.$fdegnum_results.'</td>
	   <td >'.($doct).'</td>
	   </tr>
	  <tr align="center">
	  <td colspan="3" align="right">Grand Total</td>
	  <td ><b>'.($doct+$mast+$degt+$dipt).'</b></td>
	  </tr>
	  </table>';

$db->close();

?>
    </center>                             
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

