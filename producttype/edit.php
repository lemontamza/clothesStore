<?php
session_start();
include '../include/config.inc.php';
if($_SESSION['UserID'] == "")
	{
		header("location:../admin/index.php");
	}
?>
<html>
<?php
$p_ID=$_GET['p_ID'];
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="SELECT * FROM tbproducttype WHERE p_ID='$p_ID'";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
$objResult = mysql_fetch_array($objQuery)
?>
<head>
<meta charset="utf-8">
<title>edit</title>
</head>

<body>
 <form method="post" action="update.php" >
<p>รหัสสินค้า
  <input type="p_ID" readonly name="txtp_ID" id="txtp_ID" value="<? echo $objResult['p_ID']?>">
  <br>
  <br>
  รหัสประเภทสินค้า
 <input type="pt_ID" name="txtpt_ID" id="txtpt_ID" value="<? echo $objResult['pt_ID']?>">
  <br>
  <br>
	ชื่ชื่อประเภทสินค้า
 <input type="pt_ID" name="txtpt_Name" id="txtpt_Name" value="<? echo $objResult['pt_Name']?>">
  <br>
  <br>
  <input type="submit" name="edit" id="edit" value="แก้ไข">

</p>
<p><a href="clothesStore.php">กลับ</a></p>
</body>
</html>
