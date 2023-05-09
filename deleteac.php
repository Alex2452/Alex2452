<?php
session_start();
$conn=mysql_connect("localhost","root","");
mysql_select_db("hrm",$conn);
if($log != "log"){
	header ("Location: deleteaccount.php");
}
$ctrl = $_REQUEST['emp_id'];
$SQL = "DELETE FROM signup WHERE emp_id = '$ctrl'";
mysql_query($SQL);
mysql_close($db_handle);

print "<script>location.href = 'deleteaccount.php'</script>";
?>