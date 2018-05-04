<!doctype html>
<html>
<?php
$p_ID=$_POST['txtp_ID'];
$pt_ID=$_POST['txtpt_ID'];

$host="localhost";
$username="root";
$password="12345678";
$dbname="db_Store";
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="UPDATE tbproducttype SET pt_ID='$pt_ID' WHERE p_ID='$p_ID' ";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
?>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<p>แก้ไขข้อมูล <? echo $p_ID?> เสร็จแล้ว
</p>
<p>&nbsp;</p>
<p><a href="clothesStore.php">กลับสู่หน้าหลัก</a></p>
</body>
</html>