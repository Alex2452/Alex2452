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
<title>Message</title>
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


 function checkFirstName(form)
{
  var eobj=document.getElementById('firstnameerror');
  var sfirstname = form.un.value;
  var oRE = /^[a-zA-Z]+$/;
  var error=false;
  eobj.innerHTML='';
  if (sfirstname == '') {
  error='You didnot enter a message!';
   document.form.un.focus();
  }
 
  if (error)
{
   document.form.un.focus();
   eobj.innerHTML=error;
   return false;
  }
  return true;
 }
function validate() 
 {
 var form = document.forms['form'];
 var ary=[checkFirstName];
 var rtn=true;
 var z0=0;
 for (var z0=0;z0<ary.length;z0++)
{
  if (!ary[z0](form))
  {
    rtn=false;
  }
 }
 return rtn;
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
<center>
	 <center>         <?php
 if(isset($_POST['submit']))
 {
$Comment=$_POST['un'];
 $sql="INSERT INTO message(Message) VALUES ('".$Comment."')";
if (!mysql_query($sql,$conn))
  {
    die('Error:'.mysql_error());
    echo' <meta content="10;adminmessage.php" http-equiv="refresh" />';		 
    }
  else
  {
echo'<p class="success" style="color:#390" align="center" > Sent</p>';                                
		   echo' <meta content="10;adminmessage.php" http-equiv="refresh" />';	
}

}
	   
mysql_close($conn)
?> </center>
  <table cellpadding="5" cellspacing="10" align="center" >
<form action="adminmessage.php" method="post" name="form" onSubmit="return validate()"target=_self>
<tr>
<td>Message:</td>
<td> 
<textarea name="un" rows="5" cols="30" id="comment" placeholder="Message"/></textarea><span id="firstnameerror" class="error" ></span></td></tr>
</table>
<center><input name="submit"  type="submit" value="send" /></center>

</form>

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
</center>
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

