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
    alert(window.location='resultss.php');
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
           <a class="top-heading" a href="PerHome.php">Manage </a>
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
 <h1 align="center">Employes Search Results</h1>
<?php
if(isset($_POST['searchtype']) || isset($_POST['searchterm'])){
// create short variable names
$searchtype=$_POST['searchtype'];
$searchterm=trim($_POST['searchterm']);
}
if (!isset($searchtype) || !isset($searchterm )) {
echo '<p style=color:#FF0000 align="center">You have not entered search details. Please go back and try again.<a href="perSearchinfo.php" style=text-decoration:none><input type="button" value="back"></a></p>';
exit;
}
if (!$searchtype || !$searchterm ) {
echo '<p style=color:#FF0000>You have not entered search details. Please go back and try again.<a href="perSearchinfo.php" style=text-decoration:none><input type="button" value="back"></a></p>';
exit;
}
if (!get_magic_quotes_gpc()){
$searchtype = addslashes($searchtype);
$searchterm = addslashes($searchterm);
}
@$db = new mysqli('localhost', 'root', '', 'hrm');
if (mysqli_connect_errno()) {
echo 'Error: Could not connect to database. Please try again later.';
exit;
}
$query = "select * from emp_register where ".$searchtype." like '%".$searchterm."%'";
$result = $db->query($query);
$num_results = $result->num_rows;
echo "<p align='center'>Number of emplyes found: ".$num_results."</p>";

echo "<table border=\"0\" cellspacing=\"0\" align='center'>";
for ($i=0; $i <$num_results; $i++) {
$row = $result->fetch_assoc();
echo '<tr  >';
echo "<td>";
echo ($i+1).".Full Name: ";
echo stripslashes($row['Fname'].'&nbsp;'.$row['Mname'].'&nbsp;'.$row['Lname']);
echo "<br />Emp_id: ";
echo stripslashes($row['emp_id']);
echo "<br />Department: ";
echo stripslashes($row['Department']);
echo "<br />Age: ";
echo stripslashes($row['Age']);
echo "<br />Birth year: ";
echo stripslashes($row['Birthyear']);
echo "<br />Education status: ";
echo stripslashes($row['Educationstatus']);
echo "<br />Employement of Date/Month/year: ";
echo stripslashes($row['Dayofemployement'].'&frasl;'.$row['Monthofemployement'].'&frasl;'.$row['Yearofemployement']);
echo "<br />Marriage status: ";
echo stripslashes($row['Marriagestatus']);
echo "<br />Type of emplyee: ";
echo stripslashes($row['Typeofemployee']);
echo "<br />Gender: ";
echo stripslashes($row['Sex']);
echo "<br />Salary: ";
echo stripslashes($row['salary']);
echo"<hr>";
//echo "</tr>";
$Btitle=htmlspecialchars(stripslashes($row['Fname']));
print("
<td ><a href = 'updateemployeeinfo.php?emp_id=".$row['emp_id']."'>[Edit]</a>
     <a href = 'deleteemployee1.php?emp_id=".$row['emp_id']."'><p onclick='isdelete();'>[Delete]</p></a></td>
		");
//echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href="updateempinfo.php"?emp_id=' . $row['emp_id'].'">[Edit]</a>';
//echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href="deleteemployee.php"?emp_id=' . $row['emp_id'].'">[Delete]</a>';
echo"<hr>";
echo "</td></tr>";

}
echo "</table>";
$result->free();
$db->close();
?>
                  </div>    
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

