<?php 
mysql_select_db('hrm',mysql_connect('localhost','root',''))or die(mysql_error());
 if(isset($_GET['del1'])){
	 $id=$_GET['del1'];
	 $sql="Delete from  vacancy where id=$id";
	 $res=mysql_query($sql) or die("Faild".mysql_error());
	 echo"<meta http-equiv='refresh' content='0;url=viewvacancy.php'>";
	 
	 }
?>