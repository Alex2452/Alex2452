<?php
include(connection.php);
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>login form</title>
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


 function checkFirstName(form)
{
  var eobj=document.getElementById('firstnameerror');
  var sfirstname = form.un.value;
  var oRE = /^[a-zA-Z]+$/;
  var error=false;
  eobj.innerHTML='';
  if (sfirstname == '') {
  error='You didnot enter a username.!';
   document.form.un.focus();
  }
 else if(!sfirstname.match(oRE))
 {
	error='The username contains illegal characters.!';
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
 




 
 function checkpassword(form)
{
  var eobj=document.getElementById('passworderror');
  var semail = form.pw.value;
  var oRE = /([\w\-]+\@[\w\-]+\.[\w\-]+$)/;
  var error=false;
  eobj.innerHTML='';
  if (semail == '') {
   error='please enter a password.';
   form.pw.focus();
  }
  

  if (error)
{
   form.pw.focus();
   eobj.innerHTML=error;
   return false;
  }
  return true;
 }


function validate() 
 {
 var form = document.forms['form'];
 var ary=[checkFirstName,checkpassword];
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
<div id="outer">
<div id="one"> 
<div id="holder">
  <div id="station">
  <div id="logo_text"> <img src="../Image/tedy.imag.jpg"" alt="tree tops" width="902" height="132" /> </div>
  </div>
   
  <div id="topss" >
 <nav id="ddmenu">
    
    <ul>
        <li class="no-sub">
           <a class="top-heading" a href="Home.php">Home</a>
			          
            
        </li>
        <li class="no-sub">
		<a class="top-heading" a href="ContactUs.php">Contact us</a>
		</li>
        
        <li class="no-sub">
            <a class="top-heading" a href="AboutUs.php">About Us</a>
			
           
        </li>
        <li class="no-sub">
            <a class="top-heading" a href="Vacancy.php">Vacancy  Announce</a>
        </li>
		
		<li class="no-sub">
            <a class="top-heading" a href="logini.php">Login</a>
        </li>
        
    </ul>
</nav>

</div>

	<br><br>
<div id="slides">

<div id="content">
<div id="login">
   <?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db("hrm",$conn);
if (isset($_POST['Login'])){ 
	    $username=$_POST['un'];
	    $password=$_POST['pw'];
	    $sql ="SELECT * FROM signup WHERE Username='$username' AND Password='$password'";
	    $result = mysqli_query($sql); 
		$rowCheck = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if($row['Role']=='Administrator'){ 
		$_SESSION['emp_id']=$row['emp_id'];
         echo "<script>window.location='admihome.php';</script>";
		}	
		 
			else if($row['Role']=='Personnel'){	
		$_SESSION['emp_id']=$row['emp_id'];
		 echo "<script>window.location='perhome.php';</script>";
			} 
			
			
			else if($row['Role']=='Employee'){
		$_SESSION['emp_id']=$row['emp_id'];
		echo "<script>window.location='emphome.php';</script>";
		}
		
		else {
		
		echo'<br>';
       echo' <p class="wrong" style="color:red;" >Check Your username or/and Password!</p>';                                
		   echo' <meta content="10;logini.php" http-equiv="refresh" />';	
		}
		}
    mysqli_close($conn);
?>
                   <form  action="logini.php" method="post" name="form" onSubmit="return validate()"target=_self >
                        <p align="center"><img src="../Image/222.jpg" width="201" height="63"/></p> 
                       
                        <label><p align="center">Username:&nbsp;&nbsp;</label>  <input type="text" name="un" size="15" placeholder="Name"/><span id="firstnameerror" class="error" ></span> <br />
                        <label><p align="center">Password :&nbsp;&nbsp;</label><input type="password" name="pw"  size="15" placeholder="**********" /><span id="passworderror" class="error" ></span></span><br />
                        <div align="center">
                        <p><input type="submit" value="Login" name="Login" Onclick="return check(this.form);"/>
                        <input name="reset" type="reset" value="Cancel" /></p>
                        <p><a href="forgate.php">Forget Password?</a></p>
                        </div>
                  </form>   
                  </div>    
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
<!--?php
echo"<h3>";

if ((date('g',time()) >=5) AND (date('g', time()) <= 11 ) AND (date('a',time())=="am")) 
echo'Good Morning!';
if (((date('g', time()) >=12) OR (date('g', time()) <=5)) AND (date('a',time())=="pm")) 
echo'Good Afternoon!';
if ((((date('g', time()) >= 6) AND (date('g', time()) <= 11)) AND (date('a',time())=="pm")) 
OR((date('g', time()) <= 5) AND (date('a',time())=="am" )))
echo 'Good Evening!';
echo "</h3>";
?-->
                </div>
      </div>
           
    </div>
        <!-- row end -->
  </div>
    
    
      <div id="footer" >
  <p class="footer-text">Copyright &copy; 2023 All Rights Reserved</p>

</div></div></div>
</body>
</html>

