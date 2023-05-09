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
<title>New Employee register form</title>
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
 #content{
			 margin-left:200px; 
			 border:1px solid #996633; 
			 border-radius:50px;
			 margin-top:15px;
			 box-shadow:10px 20px 10px #996633; 
			 width:500px;
			  height:730px;
			  }		  

</style>
<script type="text/javascript">
function validateid(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter employee Id.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The employee id only nuber.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
function validateFirstname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter First Name.\n";
		} else if ((fld.value.length < 4) || (fld.value.length > 15)) {
			
			error = " -The First Name Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The First Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

function validateMiddlename(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Middle Name.\n";
		} else if ((fld.value.length < 4) || (fld.value.length > 15)) {
			
			error = " -The Middle Name Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Middle Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}


	function validateLastname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Last Name.\n";
		} else if ((fld.value.length < 4) || (fld.value.length > 15)) {
			
			error = " -The Last Name Must Be More Than 4 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Last Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
 
 function validateDepname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Department Name.\n";
		} else if ((fld.value.length < 2) || (fld.value.length > 15)) {
			
			error = " -The Department Name Must Be More Than 2 Characters.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Department Name Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

 
 function validateagename(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Age.\n";
		} else if ((fld.value)>50) {
			
			error = " -The Age Contains above 50 so no register.\n";
		}else if ((fld.value.length < 1) || (fld.value.length > 2)) {
			
			error = " -Age Must Be More Than or equal to 1 digit.\n";
		} else if (!illegalChars.test(fld.value)) {
			
			error = " -The Age Contains Illegal Characters.\n";
		} 
		else {
			fld.style.background = 'White';
		}
		return error;
	}
	
	function validateYearname(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Select your birth years.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
	
    function validatestatusname(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Select your education status.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}
  
  function validatedatename(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Select your date of employement.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}	
	
	 function validatemonthname(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Select your month of employement.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}	
	
		 function validateyear1name(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Select your year of employement.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}	
	
			 function validatemarriagename(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Select your marriage status.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}	
	
			 function validatetypename(fld) {
		var error = "";
		var illegalChars = /^[a-zA-Z]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -Select your type of employee.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}	
	
	
	
	
	
	
	
	
	
  function validatesalary(fld) {
		var error = "";
		var illegalChars = /^[0-9]+$/; // allow letters, numbers, and underscores
	 
		if (fld.value == "") {
			
			error = " -You Didn't Enter Salary.\n";
		}else if (!illegalChars.test(fld.value)) {
			
			error = " -The Salary Contains Illegal Characters.\n";
		} else {
			fld.style.background = 'White';
		}
		return error;
	}

	
	function validateFormOnSubmit(theForm) {
		var reason = "";
		  reason+=validateid(theForm.userid);
		  reason+=validateFirstname(theForm.fname);
		  reason+=validateMiddlename(theForm.mname);
		  reason+=validateLastname(theForm.lname);
		  reason+=validateDepname(theForm.dep);
		  reason+=validateagename(theForm.age);
		  reason+=validateYearname(theForm.year);
		  reason+=validatestatusname(theForm.status);
		  reason+=validatedatename(theForm.date);
		  reason+=validatemonthname(theForm.month);
		  reason+=validateyear1name(theForm.year1);
		 reason+=validatemarriagename(theForm.marriage);
		 reason+=validatetypename(theForm.typeofemp);
		  reason += validatesalary(theForm.salary);
		  
		      
		  if (reason != "") {
		    alert("Some Fields Need Correction:\n" + reason);
		    return false;
		  }
		
		  return true;
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
 <center><img src="../Image/reg2.PNG" width="654" height="61" ></center>
<div id="content"><center>
                     <?php
 if(isset($_POST['Submit']))
 {
 $id=$_POST['userid'];
$Fname=$_POST['fname']; 
$Mname=$_POST['mname'];
$Lname=$_POST['lname'];
$Department=$_POST['dep'];
$Age=$_POST['age'];
$Birthyear=$_POST['year'];
$Educationstatus=$_POST['status'];
$Dayofemployement=$_POST['date'];
$Monthofemployement=$_POST['month'];
$Yearofemployement=$_POST['year1'];
$marriage=$_POST['marriage'];
$Typeofemployee=$_POST['typeofemp'];
$sex=$_POST['sex'];
$salary=$_POST['salary'];
 
{
$sql="INSERT INTO emp_register (emp_Id,Fname,Mname,Lname,Department,Age,Birthyear,Educationstatus,Dayofemployement,Monthofemployement,Yearofemployement,Marriagestatus,Typeofemployee,Sex,salary)VALUES
('$id','$Fname','$Mname','$Lname','$Department','$Age','$Birthyear','$Educationstatus','$Dayofemployement','$Monthofemployement','$Yearofemployement','$marriage','$Typeofemployee','$sex','$salary')";

if (!mysql_query($sql,$conn))
  {
         
		 echo'<P style="color:red" > Error Already Registered with this employee ID</p>'.$id;
		 echo' <meta content="10;perRegi.php" http-equiv="refresh" />';
		 
    }
  else
  {
echo'<p class="success" style="color:#390"> Successfully register!</p>';                                
		   echo' <meta content="6;perRegi.php" http-equiv="refresh" />';	
}}}

mysql_close($conn)
?>   </center>
  <form  action="perRegi.php" method="post" name="demo" onSubmit="return validateFormOnSubmit(this)">
<ul>
  <p>
    <label for="userid">Emp ID:</label>
      <input type="text" name="userid" size="12" onBlur="userid_validation(5,12)"/>
  </br>
  </p>
  <p>
    <label for="fname">First Name:</label>
    <input type="text" name="fname" size="30" onBlur="allLetter()"/></br>
    </p>
  <p>
    <label for="sname">Middle Name:</label>
    <input type="text" name="mname" size="30" onBlur="allLetter1()"/>
    </br>
  </p>
  <p>
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" size="30" onBlur="allLetter2()"/>
    </br>
   </p>
   <p>
    <label for="dep">
      Departement:</label>
    <input type="text" name="dep" size="30" onBlur="allLetter3()"/>
    </br>
  </p>
  <p>
    <label for="age">Age:</label>
    <input type="text" name="age" size="10" onBlur="allLetter4()"/>
    </br>
  </p>
  <p>    
    <label> Birth Year: </label>
	   <select name="year" onBlur="statusselect()">
                          <option></option>
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
    </br>
    </p>
  <p> 
     <label> Education Status:</label>
	      <select name="status" onBlur="statusselect()">
                          <option></option>
                          <option>Degree</option>
                          <option>Masters</option>
                          <option>Docter</option>
                          <option>Nurse</option>
                          <option>PHD</option>
                          <option>Diploma</option>
                        
                          
           </select>
    </br>
  </p>
  <p>
    <label> Date of employement:</label>
	      <select name="date" onBlur="statusselect()">
                          <option></option>
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
                        
         </select>
    </br>
    
    <label><br>
      Month of employement:</label>
    <select name="month" onBlur="statusselect()">
                          <option></option>
                          <option value="1">Jan</option>
                          <option value="2">Feb</option>
                          <option value="3">Mar</option>
                          <option value="4">Apr</option>
                          <option value="5">May</option>
                          <option value="6">Jun</option>
                          <option value="7">Jul</option>
                          <option value="8">Aug</option>
                          <option value="9">Sep</option>
                          <option value="10">Oct</option>
                          <option value="11">Nov</option>
          <option value="12">Dec</option>
      </select>
    </br>
    </p>
  <p>
    <label>Year of Employement:</label>
    <select name="year1" onBlur="statusselect()">
                          <option></option>
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
    </br>
    </p>
    
      <p>
    <label>Marriage status:</label>
    <select name="marriage" onBlur="statusselect()">
                          <option></option>
                          <option>married</option>
                          <option>single</option>
      </select>
    </br>
     </p>
  
    
     <p>
    <label >Type of employee:</label>  
    <select name="typeofemp" onBlur="statusselect()">
                          <option></option>
                          <option>Regular</option>
                          <option>overtime</option>
      </select>
    </br>
    </p>
  <p>
    <label id="gender">Sex </label>
    <input type="radio" name="sex" value="Male" checked />
    <span>Male</span>
    <input type="radio" name="sex" value="Female" />
    <span>Female</span><br>
   
     <p>
    <label for="salary">Salary:</label>
    <input type="text" name="salary" size="50" onBlur="allLetter()"/></br>
    </p></br>
    <center><input type="Submit" name="Submit" value="Submit"  />
    <input type="reset" name="Reset" value="Reset" /></center>
  </p>
</ul>
</form>   
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

