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
<title>Edit account</title>
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
                                 <li> <a href="updatepass.php"> <input type="button" value="Update password" class="button_example" /></a></li><br />
                              </ul>
  </div>     
 <div id="image">
   <div id="sidebar1">
                <?php
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
	if (empty($_POST['id'])) {
       $errors[] = 'You forgot to enter employee id.';
    } else {
       $ids = mysqli_real_escape_string($db, trim($_POST['id']));
    }
if (empty($_POST['fn'])) {
       $errors[] = 'You forgot to enter first name.';
    } else {
       $Fname = mysqli_real_escape_string($db, trim($_POST['fn']));
    }
	
	if (empty($_POST['ln'])) {
       $errors[] = 'You forgot to enter last name.';
    } else {
       $Lname = mysqli_real_escape_string($db, trim($_POST['ln']));
    }
	//if (empty($_POST['age'])) {
      // $errors[] = 'You forgot to enter age.';
    //} else {
    //   $age = mysqli_real_escape_string($db, trim($_POST['age']));
    //}
	
		if (empty($_POST['role'])) {
       $errors[] = 'You forgot to enter Role.';
    } else {
       $role = mysqli_real_escape_string($db, trim($_POST['role']));
    }
	if (empty($_POST['un'])) {
       $errors[] = 'You forgot to enter username.';
    } else {
       $un = mysqli_real_escape_string($db, trim($_POST['un']));
    }
	
   if (empty($_POST['pw'])) {
      $errors[] = 'You forgot to enter password.';
    } else {
     $pw = mysqli_real_escape_string($db, trim($_POST['pw']));
     }
	 
	if (empty($_POST['email'])) {
       $errors[] = 'You forgot to enter email.';
    } else {
       $email = mysqli_real_escape_string($db, trim($_POST['email']));
    }
	
	if (empty($errors)) { 
$q = "UPDATE  signup SET emp_id='".$ids."',Firstname='".$Fname."',Lastname='".$Lname."', Role='".$role."',Username='".$un."',Password='".$pw."',email='".$email."' WHERE emp_id='".$id."' LIMIT 1";
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
$q3 = "SELECT emp_id,Firstname,Lastname,Role,Username,Password,email FROM  signup WHERE emp_id='".$id."'";
$result2 = $db->query($q3);
if ($db->affected_rows==1) {
$row = $result2->fetch_assoc();
echo '<table align="center"><form action="editaccount.php" method="post">
<tr><td><label class="label" for="id">Emp_id:</label></td><td><input id="id" type="text" name="id"  maxlength="30"value="' . $row['emp_id'] . '"></td></tr>
<tr><td><label class="label" for="fn">Firstname:</label></td><td><input id="fn" type="text" name="fn" maxlength="30"value="' . $row['Firstname'] . '"></td></tr>

<tr><td><label class="label" for="ln">Lastname:</label></td><td><input id="ln" type="text" name="ln"  maxlength="30"value="' . $row['Lastname'] . '"></td></tr>

<tr><td><label class="label" for="role">Role:</label></td>><td><select name="role"  maxlength="30" onBlur="statusselect()">
                          <option> ' . $row['Role'] . '</option>
                          <option>Administrator</option>
                          <option>Employee</option>
                          <option>Personnel</option>
                        
                          
        </select></td></tr>
<tr><td><label class="label" for="un">Username:</label></td><td><input id="un" type="text" name="un"  maxlength="30"value="' . $row['Username'] . '"></td></tr>
<tr><td><label class="label" for="pw">Password:</label></td><td><input type="password" name="pw" size="30" maxlength="80" value="' . $row['Password'] . '"></td></tr>
<tr><td><label class="label" for="email">Email :</label></td><td><input type="text" name="email" size="30" maxlength="80" value="' . $row['email'] . '"></td></tr>
<tr><td><input id="submit" type="submit" name="submit" value="Update"></td><td><input type="hidden" name="emp_id" value="' . $id . '" /> </td>
</form>';
 echo'</form>
        <form action="updatepass.php" method="post" >

        <td><input type="submit" name="submit" value="Back" /></td></tr>
         </form> </table>';

} else { // The record could not be validated
echo '';
}
$result2->free();
$db->close();
?>
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

