<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Vacancy announcement</title>
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

<div id="slides">

<div id="content">
                      <marquee scrollamount="9" scrolldelay="75"  width="840" height="65" direction="left" behavior="alternate" loop="100" onMouseOver="stop();" onMouseOut="start();" ><img src="../Image/vacancy.jpg" width="450" height="65"></marquee><br><br><br>
<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysqli_error());
}
mysqli_select_db("hrm", $con);
$result = mysqli_query("SELECT * FROM vacancy");
echo "<table border='1' cellpadding='6' >
<tr bgcolor='#993333'>
<th>Department</th>
<th>Academic Rank</th>
<th>Field of specialization Required</th>
<th>Number of staff Required</th>
<th>Gender</th>
<th>Registration start date</th>
<th>Registration end date</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Departement'] . "</td>";
echo "<td>" . $row['Academic_rank'] . "</td>";
echo "<td>" . $row['Fieldofspecialization'] . "</td>";
echo "<td >" . $row['Numberof_staff'] . "</td>";
echo "<td>" . $row['gender'] . "</td>";
echo "<td>" . $row['Registrationstartdate'] . "</td>";
echo "<td>" . $row['registrationenddate'] . "</td>";
echo "</tr>";
}
echo "<tr >";
	echo "<td colspan='7' align='center'> Below this their is no vacancy notice</td>";
	//echo"There is no vacancy notic";
	echo "</tr>";
echo "</table>";
mysqli_close($con);
?>

                </div> 
       
               
                <div id="content2">
                    <div class="cusCare" >
                      <p align="center"><a href="https://www.facebook.com">  <img src="../Image/icon_facebook.png" width="34" height="35"></a>
                                  <a href="https://www.youtube.com"><img src="../Image/icon_youtube.png" width="31" height="36"></a>
                                  <a href="https://www.twitter.com"><img src="../Image/icon_twitter.png" width="33" height="36"></a>
                    
                    </div></p>
                    <div class="greeting" >
                   
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
  <p class="footer-text">Copyright All Rights Reserved</p>

</div></div></div>
</body>
</html>

