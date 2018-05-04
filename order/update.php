<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
</head>

<body>
<p>
  <?php
$txto_ID=$_POST['txto_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtm_ID=$_POST['txtm_ID'];
$txtp_ID=$_POST['txtp_ID'];
$txtprice=$_POST['txtprice'];
$date=$_POST['date'];

include '../include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="UPDATE tborder SET m_ID='$txtm_ID', p_ID='$txtp_ID', price='$txtprice', date='$date' WHERE o_ID='$txto_ID' ";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
?>
แก้ไขข้อมูล <? echo $txto_ID?> เสร็จแล้ว
</p>
<p>&nbsp;</p>
<p><a href="order.php">กลับสู่หน้าหลัก</a></p>
</body>
</html>
