<?php
session_start();
include 'include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล

$txtm_ID=$_POST['txtm_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtm_Name=$_POST['txtm_Name'];
$txtm_Address=$_POST['txtm_Address'];
$txtm_Sex=$_POST['txtm_Sex'];
$txtm_Call=$_POST['txtm_Call'];
$txtm_User=$_POST['txtm_User'];
$txtm_Pass=$_POST['txtm_Pass'];

if(isset($_POST['add']))
{
	$sql_query="INSERT INTO tbmember (m_ID,m_Name,m_Address,m_Sex,m_Call,m_User,m_Pass) VALUES ('$txtm_ID','$txtm_Name','$txtm_Address','$txtm_Sex','$txtm_Call','$txtm_User','$txtm_Pass')"; //เพิ่มข้อมูลใน table
	$result=mysql_query($sql_query,$link);
header("location:index.php");

}

?>
