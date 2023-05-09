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
<title>Update employes information</title>
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
#slides{
	margin-top:-30px;
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
<div id="login">
   <div style="font-size:26pt;font-family:Verdana;font-weight:bold;font-style:oblique;text-align:center">
 <script>
 // YOUR TEXT
var text="Edit a Record"
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
<center><?php
if ( (isset($_GET['emp_id'])) ) { 
$id = stripslashes($_GET['emp_id']);
} elseif ( (isset($_POST['emp_id'])) ) { 
$id = stripslashes($_POST['emp_id']);
} else { 
echo '<p >This page has been accessed in error</p>';
exit;
}
@$db = new mysqli('localhost', 'root', '', 'hrm');
if (mysqli_connect_errno()) {
echo 'Error: Could not connect to database. Please try again later.';
exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
if (empty($_POST['fname'])) {
       $errors[] = 'You forgot to enter first name.';
    } else {
       $Fname = mysqli_real_escape_string($db, trim($_POST['fname']));
    }
	if (empty($_POST['mname'])) {
       $errors[] = 'You forgot to enter middle name.';
    } else {
       $Mname = mysqli_real_escape_string($db, trim($_POST['mname']));
    }
	if (empty($_POST['lname'])) {
       $errors[] = 'You forgot to enter last name.';
    } else {
       $Lname = mysqli_real_escape_string($db, trim($_POST['lname']));
    }
	if (empty($_POST['dep'])) {
       $errors[] = 'You forgot to enter department.';
    } else {
       $dep = mysqli_real_escape_string($db, trim($_POST['dep']));
    }
	
		if (empty($_POST['year'])) {
       $errors[] = 'You forgot to enter birth year.';
    } else {
       $Byear = mysqli_real_escape_string($db, trim($_POST['year']));
    }
	if (empty($_POST['status'])) {
       $errors[] = 'You forgot to enter education status.';
    } else {
       $status = mysqli_real_escape_string($db, trim($_POST['status']));
    }
	
   if (empty($_POST['Age'])) {
      $errors[] = 'You forgot to enter age.';
    } else {
     $Age = mysqli_real_escape_string($db, trim($_POST['Age']));
     }
	 
	if (empty($_POST['date'])) {
       $errors[] = 'You forgot to enter date.';
    } else {
       $date = mysqli_real_escape_string($db, trim($_POST['date']));
    }
	
	if (empty($_POST['month'])) {
       $errors[] = 'You forgot to enter month.';
    } else {
       $month = mysqli_real_escape_string($db, trim($_POST['month']));
    }
	if (empty($_POST['year1'])) {
       $errors[] = 'You forgot to enter year.';
    } else {
       $years = mysqli_real_escape_string($db, trim($_POST['year1']));
    }
	
	if (empty($_POST['marriage'])) {
       $errors[] = 'You forgot to enter marriage status.';
    } else {
       $marriage = mysqli_real_escape_string($db, trim($_POST['marriage']));
    }
	if (empty($_POST['typeofemp'])) {
       $errors[] = 'You forgot to enter typeof employee.';
    } else {
       $type = mysqli_real_escape_string($db, trim($_POST['typeofemp']));
    }
	
	if (empty($_POST['sex'])) {
       $errors[] = 'You forgot to enter gender.';
    } else {
       $sex = mysqli_real_escape_string($db, trim($_POST['sex']));
    }
	
   if (empty($_POST['salary'])) {
       $errors[] = 'You forgot to enter the salary.';
    } else {
      $salary = mysqli_real_escape_string($db, trim($_POST['salary']));
     }
if (empty($errors)) { 
$q = "UPDATE  emp_register SET Fname='".$Fname."',Mname='".$Mname."',Lname='".$Lname."',Department='".$dep."', Age='".$Age."',Birthyear='".$Byear."', Educationstatus='".$status."',Dayofemployement='".$date."',Monthofemployement='".$month."', Yearofemployement='".$years."',marriagestatus='".$marriage."',Typeofemployee='".$type."',Sex='".$sex."',Salary='".$salary."' WHERE emp_id='".$id."' LIMIT 1";
$result = $db->query($q);
if ($db->affected_rows == 1) { 
echo '<h3 style=color:#390><img src="../Image/righti.jpg" width="20" >The employee information has been edited.</h3>';
} else { 
echo '<p style=color:#FF0000 align="center">The employee information could not be edited.</p>'; 
//echo '<p>' . mysqli_error($db) . '<br />Query: ' . $q . '</p>'; 
}
} else { 
echo '<p align="center">The following error(s) occurred:<br />';
foreach ($errors as $msg) { 
echo "<p style=color:#FF0000> - $msg<br />\n</p>";
}
echo '<p align="center">Please try again.</p>';
} 
} 
if (!get_magic_quotes_gpc()){
$id = addslashes($id);
}
$q3 = "SELECT Fname,Mname,Lname,Department, Age,Birthyear,Educationstatus,Dayofemployement,Monthofemployement,Yearofemployement,marriagestatus,Typeofemployee,Sex, Salary FROM  emp_register WHERE emp_id='".$id."'";
$result2 = $db->query($q3);
if ($db->affected_rows==1) {
$row = $result2->fetch_assoc();
echo '<table ><form action="updateempinfo.php" method="post">
<tr><td><label class="label" for="fname">Firstname:</label></td><td><input id="fname" type="text" name="fname" maxlength="30"value="' . $row['Fname'] . '"></td></tr>
<tr><td><label class="label" for="mname">Middlename:</label></td><td><input id="mname" type="text" name="mname"  maxlength="30"value="' . $row['Mname'] . '"></td></tr>
<tr><td><label class="label" for="lname">Lastname:</label></td><td><input id="lname" type="text" name="lname"  maxlength="30"value="' . $row['Lname'] . '"></td></tr>
<tr><td><label class="label" for="dep">Department:</label></td><td><input id="dep" type="text" name="dep"  maxlength="30"value="' . $row['Department'] . '"></td></tr>
<tr><td><label class="label" for="year">Birth year:</label></td><td>
<select name="year"  maxlength="30"> <option>' . $row['Birthyear'] . '</option>
<option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option>
<option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option>
<option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option>
<option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option>
<option value="2003">2003</option> <option value="2002">2002</option><option value="2001">2001</option>
<option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option>
<option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option>
<option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option>
<option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option>
<option value="1988">1988</option><option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970">1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                          <option value="1949">1949</option>
                          <option value="1948">1948</option>
                          <option value="1947">1947</option>
                          <option value="1946">1946</option>
                          <option value="1945">1945</option>
                          <option value="1944">1944</option>
                          <option value="1943">1943</option>
                          <option value="1942">1942</option>
                          <option value="1941">1941</option>
                          <option value="1940">1940</option>
                          <option value="1939">1939</option>
                          <option value="1938">1938</option>
                          <option value="1937">1937</option>
                          <option value="1936">1936</option>
                          <option value="1935">1935</option>
                          <option value="1934">1934</option>
                          <option value="1933">1933</option>
                          <option value="1932">1932</option>
                          <option value="1931">1931</option>
                          <option value="1930">1930</option>
                          <option value="1929">1929</option>
                          <option value="1928">1928</option>
                          <option value="1927">1927</option>
                          <option value="1926">1926</option>
                          <option value="1925">1925</option>
                          <option value="1924">1924</option>
                          <option value="1923">1923</option>
                          <option value="1922">1922</option>
                          <option value="1921">1921</option>
                          <option value="1920">1920</option>
                          <option value="1919">1919</option>
                          <option value="1918">1918</option>
                          <option value="1917">1917</option>
                          <option value="1916">1916</option>
                          <option value="1915">1915</option>
                          <option value="1914">1914</option>
                          <option value="1913">1913</option>
                          <option value="1912">1912</option>
                          <option value="1911">1911</option>
                          <option value="1910">1910</option>
                          <option value="1909">1909</option>
                          <option value="1908">1908</option>
                          <option value="1907">1907</option>
                          <option value="1906">1906</option>
          <option value="1905">1905</option>
      </select>
</td></tr>
<tr><td><label class="label" for="status">Education status:</label></td><td>
<select name="status"  maxlength="30">
                          <option>' . $row['Educationstatus'] . '</option>
                          <option>Degree</option>
                          <option>Masters</option>
                          <option>Docter</option>
                          <option>Nurse</option>
                          <option>PHD</option>
                          <option>Diploma</option>
                        
                          
           </select></td></tr>
<tr><td><label class="label" for="Age">Age:</label></td><td><input type="text" name="Age"   value="' . $row['Age'] . '"></td></tr>
<tr><td><label class="label" for="date">Date of employement:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></td><td>
<select name="date" maxlength="30">
                          <option>' . $row['Dayofemployement'] . '</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                          <option value="24">24</option>
                          <option value="25">25</option>
                          <option value="26">26</option>
                          <option value="27">27</option>
                          <option value="28">28</option>
                          <option value="29">29</option>
                          <option value="30">30</option>
          <option value="31">31</option>
</select></td></tr>
<tr><td><label class="label" for="month">Month of employement:</label></td><td>
<select name="month" maxlength="30">
                          <option>' . $row['Monthofemployement'] . '</option>
                          <option value="Jan">Jan</option>
                          <option value="Feb">Feb</option>
                          <option value="Mar">Mar</option>
                          <option value="Apr">Apr</option>
                          <option value="May">May</option>
                          <option value="Jun">Jun</option>
                          <option value="Jul">Jul</option>
                          <option value="Aug">Aug</option>
                          <option value="Sep">Sep</option>
                          <option value="oct">Oct</option>
                          <option value="Nov">Nov</option>
          <option value="dec">Dec</option>
      </select>
</td></tr>
<tr><td><label class="label" for="year1">Year of employement :</label></td><td>
<select name="year1" onBlur="statusselect()">
                          <option>' . $row['Yearofemployement'] . '</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>
      <option value="2010">2010</option>
      <option value="2009">2009</option>
      <option value="2008">2008</option>
      <option value="2007">2007</option>
      <option value="2006">2006</option>
      <option value="2005">2005</option>
      <option value="2004">2004</option>
      <option value="2003">2003</option>
      <option value="2002">2002</option>
      <option value="2001">2001</option>
      <option value="2000">2000</option>
      <option value="1999">1999</option>
      <option value="1998">1998</option>
      <option value="1997">1997</option>
      <option value="1996">1996</option>
      <option value="1995">1995</option>
      <option value="1994">1994</option>
      <option value="1993">1993</option>
      <option value="1992">1992</option>
      <option value="1991">1991</option>
      <option value="1990">1990</option>
      <option value="1989">1989</option>
      <option value="1988">1988</option>
      <option value="1987">1987</option>
      <option value="1986">1986</option>
      <option value="1985">1985</option>
      <option value="1984">1984</option>
      <option value="1983">1983</option>
      <option value="1982">1982</option>
      <option value="1981">1981</option>
      <option value="1980">1980</option>
      <option value="1979">1979</option>
      <option value="1978">1978</option>
      <option value="1977">1977</option>
      <option value="1976">1976</option>
      <option value="1975">1975</option>
      <option value="1974">1974</option>
      <option value="1973">1973</option>
      <option value="1972">1972</option>
      <option value="1971">1971</option>
      <option value="1970">1970</option>
      <option value="1969">1969</option>
      <option value="1968">1968</option>
      <option value="1967">1967</option>
      <option value="1966">1966</option>
      <option value="1965">1965</option>
      <option value="1964">1964</option>
      <option value="1963">1963</option>
      <option value="1962">1962</option>
      <option value="1961">1961</option>
      <option value="1960">1960</option>
      <option value="1959">1959</option>
      <option value="1958">1958</option>
      <option value="1957">1957</option>
      <option value="1956">1956</option>
      <option value="1955">1955</option>
      <option value="1954">1954</option>
      <option value="1953">1953</option>
      <option value="1952">1952</option>
      <option value="1951">1951</option>
      <option value="1950">1950</option>
      <option value="1949">1949</option>
      <option value="1948">1948</option>
      <option value="1947">1947</option>
      <option value="1946">1946</option>
      <option value="1945">1945</option>
      <option value="1944">1944</option>
      <option value="1943">1943</option>
      <option value="1942">1942</option>
      <option value="1941">1941</option>
      <option value="1940">1940</option>
      <option value="1939">1939</option>
      <option value="1938">1938</option>
      <option value="1937">1937</option>
      <option value="1936">1936</option>
      <option value="1935">1935</option>
      <option value="1934">1934</option>
      <option value="1933">1933</option>
      <option value="1932">1932</option>
      <option value="1931">1931</option>
      <option value="1930">1930</option>
      <option value="1929">1929</option>
      <option value="1928">1928</option>
      <option value="1927">1927</option>
      <option value="1926">1926</option>
      <option value="1925">1925</option>
      <option value="1924">1924</option>
      <option value="1923">1923</option>
      <option value="1922">1922</option>
      <option value="1921">1921</option>
      <option value="1920">1920</option>
      <option value="1919">1919</option>
      <option value="1918">1918</option>
      <option value="1917">1917</option>
      <option value="1916">1916</option>
      <option value="1915">1915</option>
      <option value="1914">1914</option>
      <option value="1913">1913</option>
      <option value="1912">1912</option>
      <option value="1911">1911</option>
      <option value="1910">1910</option>
      <option value="1909">1909</option>
      <option value="1908">1908</option>
      <option value="1907">1907</option>
      <option value="1906">1906</option>
      <option value="1905">1905</option>
      </select>

</td></tr>

<tr><td><label class="label" for="marriage">Marriage status :</label></td><td>
<select name="marriage" onBlur="statusselect()">
                          <option>' . $row['marriagestatus'] . '</option>
                          <option>married</option>
                          <option>single</option>
      </select></td></tr>
<tr><td><label class="label" for="typeofemp">Type of employee :</label></td><td>
<select name="typeofemp" onBlur="statusselect()">
                          <option>' . $row['Typeofemployee'] . '</option>
                          <option>Regular</option>
                          <option>overtime</option>
      </select></td></tr>

<tr><td><label class="label" for="sex">Gender :</label></td><td><input type="text" name="sex"  value="' . $row['Sex'] . '"></td></tr>
<tr><td><label for="salary">Salary:</label></td><td><input type="text" name="salary"  value="' . $row['Salary'] . '"></td></tr>
<tr><td><input id="submit" type="submit" name="submit" value="Update"></p><input type="hidden" name="emp_id" value="' . $id . '" /> </td>
</form></table>';
 echo'</form>
        <form action="allemployesresult.php" method="post" >

        <center><input type="submit" name="submit" value="Back" /></center>
         </form>';

} else { // The record could not be validated
echo '<p class="error">This page has been accessed in error2</p>';
}
$result2->free();
$db->close();
?>
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

</div> 
    
    </div></div>
</body>
</html>

