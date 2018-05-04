<?php
session_start();
include '../include/config.inc.php';
if($_SESSION['UserID'] == "")
	{
		header("location:../admin/index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$txtp_ID=$_POST['txtp_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtpt_ID=$_POST['txtpt_ID'];
$txtprice=$_POST['txtprice'];
$txtdescription=$_POST['txtdescription'];
$txtnote=$_POST['txtnote'];

$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="UPDATE tbproduct SET pt_ID='$txtpt_ID', price='$txtprice', description='$txtdescription', note='$txtnote' WHERE p_ID='$txtp_ID' ";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
</head>

<body>
<p>แก้ไขข้อมูล <? echo $txtp_ID?> เสร็จแล้ว</p>
<p><a href="product.php">กลับสู่หน้าหลัก</a></p>
</body>
</html>
