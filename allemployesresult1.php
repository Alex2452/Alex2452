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
<title>All employes information</title>
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
    alert(window.location='allemployesresult.php');
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
     <div style="font-size:26pt;font-family:Verdana;font-weight:bold;font-style:oblique;text-align:center">
 <script>
 // YOUR TEXT
var text="Employes"
var speed=50 // SPEED OF FADE

if (document.all||document.getElementById){
document.write('<span id="highlight">' + text + '</span>')
var storetext=document.getElementById? document.getElementById("highlight") : document.all.highlight
}
else
document.write(text)
var hex=new Array("00","14","28","3C","50","64","78","8C","A0","B4","C8","DC","F0")
var r=6
var g=8
var b=1
var seq=1
function changetext(){
rainbow="#"+hex[r]+hex[g]+hex[b]
storetext.style.color=rainbow
}
function change(){
if (seq==6){
b--
if (b==0)
seq=1
}
if (seq==5){
r++
if (r==12)
seq=6
}
if (seq==4){
g--
if (g==0)
seq=5
}
if (seq==3){
b++
if (b==12)
seq=4
}
if (seq==2){
r--
if (r==0)
seq=3
}
if (seq==1){
g++
if (g==12)
seq=2
}
changetext()
}
function starteffect(){
if (document.all||document.getElementById)
flash=setInterval("change()",speed)
}
starteffect()
</script></div>
<?php
@$db = new mysqli('localhost', 'root', '', 'hrm');
if (mysqli_connect_errno()) {
echo 'Error: Could not connect to database. Please try again later.';
exit;
}
$sqy = "SELECT COUNT(emp_id) FROM emp_register";
$rs = @$db->query ($sqy);
$row = @mysqli_fetch_array ($rs,MYSQLI_NUM);
$rec = $row[0];
echo "<h3 align='center'>Total number of employes: ".$rec."</h3>";
$display=4;
if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
 $pages = $_GET['p'];
 } else { 
$sq = "SELECT COUNT(emp_id) FROM emp_register";
$r = @$db->query ($sq);
$row = @mysqli_fetch_array ($r,MYSQLI_NUM);
 $records = $row[0];
 if ($records > $display) { // More than 1 page.
 $pages = ceil ($records/$display);
 } else {
 $pages = 1;
 }
 } 
 if (isset($_GET['s']) && is_numeric($_GET['s'])) {
 $start = $_GET['s'];
 } else {
 $start = 0;
 }
$query = "select * from emp_register ORDER BY Fname LIMIT $start, $display";
$result = $db->query($query);
$num_results = $result->num_rows;
echo "<table border=\"3\" cellspacing=\"0\" width=\"860\">";

echo"<tr bgcolor='#993300'>";
echo "<td > No.</td>";
echo "<td>Name</td>";
echo "<td>Emp_id</td> ";
echo "<td>Age</td> ";
echo "<td>Education status</td> ";
echo "<td>Marriage</td> ";
echo "<td>Type of employee</td> ";
echo "<td>Salary </td>";
echo "<td>Action </td>";
echo"</tr>";
echo"<tr>";
for ($i=0; $i <$num_results; $i++) {
$row = $result->fetch_assoc();
echo "<td>".($start+$i+1)."</td>";
echo "<td>".$row['Fname']."&nbsp;".$row['Lname']."</td>";
echo"<td>".stripslashes($row['emp_id'])."</td>";
echo"<td>".stripslashes($row['Age'])."</td>";
echo"<td>".stripslashes($row['Educationstatus'])."</td>";
echo"<td>".stripslashes($row['Marriagestatus'])."</td>";
echo"<td>".stripslashes($row['Typeofemployee'])."</td>";
echo"<td>".stripslashes($row['salary'])."</td>";
print("
<td ><a href = 'updateemployeeinfo.php?emp_id=".$row['emp_id']."'>[Edit]</a><a href = 'deleteemployee1.php?emp_id=".$row['emp_id']."'><p onclick='isdelete();'><img src='../Image/del.PNG' alt='tree tops' width='50' height='30' /></p></a></td>
		");
//echo "<td>"<a href="updateBook.php? emp_id='. $row['isbn'].'">[Edit this book]</a>"</td>";
echo"</tr>";
//
//echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href="deleteBook.php?id=' . $row['isbn'].'">[Delete this book]</a>';
//echo '&nbsp&nbsp&nbsp&nbsp&nbsp<a href="book_review.php?id=' . $row['isbn'].'">[Show review for this book]</a>';
//echo "</p>";
//echo "</td></tr>";
}
echo "</table>";
$result->free();
$db->close();

 if ($pages > 1) {
 echo '<br /><p>';
 $current_page = ($start/$display)+ 1;
 echo'<p align="center">';
 if ($current_page != 1) {
 echo '<a href="allemployesresult1.php?s=' . ($start - $display) .'&p=' . $pages . '">Previous</a> ';
 }
 for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="allemployesresult1.php?s=' . (($display *($i - 1))) . '&p=' . $pages .'">' . $i . '</a> ';
 } else {
 echo $i . ' ';
 }
 } 
 if ($current_page != $pages) {
 echo '<a href="allemployesresult1.php?s=' . ($start + $display) .'&p=' . $pages . '">Next</a>';
 }
 echo '</p>'; 
 echo '</p>'; 
 } 
?>
                </div> 

                <div id="content2">
                    <div class="cusCare" >
                      <p align="center"><a href="https://www.facebook.com">  <img src="../Image/icon_facebook.png" width="34" height="35"></a>
                                  <a href="https://www.youtube.com"><img src="../Image/icon_youtube.png" width="31" height="36"></a>
                                  <a href="https://www.twitter.com"><img src="../Image/icon_twitter.png" width="33" height="36"></a>
                    
                    </div></p>
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

