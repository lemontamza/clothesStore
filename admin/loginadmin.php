<?php
session_start();
include '../include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$username = $_POST['username'];
$password = $_POST['password'];
$strSQL="SELECT * FROM tbadmin WHERE a_User = '".$username."' AND a_Pass = '".$password."'";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["UserID"] = $objResult["a_User"];
			$_SESSION["Status"] = "@admin";
			session_write_close();
      header("location:admin.php");
	}
	mysql_close();
?>
