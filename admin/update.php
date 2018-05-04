<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
</head>

<body>
<p>
  <?php
include '../include/config.inc.php';
$txta_ID=$_POST['txta_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txta_Name=$_POST['txta_Name'];
$txta_Call=$_POST['txta_Call'];
$txta_User=$_POST['txta_User'];
$txta_Pass=$_POST['txta_Pass'];

$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="UPDATE tbadmin SET a_Name='$txta_Name', a_Call='$txta_Call', a_User='$txta_User', a_Pass='$txta_Pass' WHERE a_ID='$txta_ID' ";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
?>
แก้ไขข้อมูล <? echo $txta_ID?> เสร็จแล้ว
</p>
<p>&nbsp;</p>
<p><a href="admin.php">กลับสู่หน้าหลัก</a></p>
</body>
</html>
