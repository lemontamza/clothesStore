<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$p_ID=$_GET['p_ID'];
$host="localhost";
$username="root";
$password="12345678";
$dbname="db_Store";
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="SELECT * FROM tbproduct WHERE p_ID='$p_ID'";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
$objResult = mysql_fetch_array($objQuery)
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit</title>
</head>


<body>

<form method="post" action="update.php" >
<table width="950" height="311">
  <tr>
  
    <td height="305">
   
    รหัสสินค้า <input type="number" name="txtp_ID" id="txtp_ID" value="<? echo $objResult['p_ID']?>"/>
      <br />
      <br />
	รหัสประเภทสินค้า <input type="number" name="txtpt_ID" id="txtpt_ID" value="<? echo $objResult['pt_ID']?>"/>
<br />
<br />
	ราคา <input type="number" name="txtprice" id="txtprice" value="<? echo $objResult['price']?>"/>
<br />
<br />
	ลักษณะ <input type="text" name="txtdescription" id="txtdescription" value="<? echo $objResult['description']?>"/>
<br />
<br />
	หมายเหตุ <input type="text" name="txtnote" id="txtnote" value="<? echo $objResult['note']?>"/>
<br />
<br />
<br />
<br />
<input type="submit" name="edit" id="edit" value="แก้ไข" /></td>
  </tr>
</table>
<p><a href="product.php">กลับ</a></p>
</body>
</html>