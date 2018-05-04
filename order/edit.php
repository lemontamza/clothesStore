<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit</title>
</head>
<?php
$o_ID=$_GET['o_ID'];
$host="localhost";
$username="root";
$password="12345678";
$dbname="db_Store";
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="SELECT * FROM tborder WHERE o_ID='$o_ID'";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
$objResult = mysql_fetch_array($objQuery)
?>

<body>
<form method="post" action="update.php" >
<table width="950" height="311">
  <tr>
  
    <td height="305">
   
 	  <p>รหัสการสั่งซื้อ <input type="number" name="txto_ID" id="txto_ID" value="<? echo $objResult['o_ID']?>"/><br><br>
 	    รหัสสมาชิก <input type="number" name="txtm_ID" id="txtm_ID" value="<? echo $objResult['m_ID']?>" /><br><br>
 	    รหัสสินค้า <input type="number" name="txtp_ID" id="txtp_ID" value="<? echo $objResult['p_ID']?>" /><br><br>
 	    ราคา <input type="number" name="txtprice" id="txtprice" value="<? echo $objResult['price']?>" /><br><br>
 	    วันเดือนปีที่สั่งซื้อ <input type="date" name="date" name="date" value="<? echo $objResult['date']?>" />
 	  </p>
 	  <p> 	    <br />
 	    <br />
 	    <input type="submit" name="edit" id="edit" value="แก้ไข" />
    </p></td>
  </tr>
</table>
<p><a href="order.php">กลับสู่หน้าหลัก</a></p>
</body>
</html>