<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit</title>
</head>

<body>
<?php
$a_ID=$_GET['a_ID'];
$host="localhost";
$username="root";
$password="12345678";
$dbname="db_Store";
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="SELECT * FROM tbadmin WHERE a_ID='$a_ID'";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
$objResult = mysql_fetch_array($objQuery)
?>
<table width="950">
  <tr>
    <td><form method="post" action="update.php" >
      รหัสผู้ดูแลระบบ <input type="number" name="txta_ID" id="txta_ID" value="<? echo $objResult['a_ID']?>" /><br><br>
      ชื่อ - สกุล <input type="text" name="txta_Name" id="txta_Name" value="<? echo $objResult['a_Name']?>" /><br><br>
      เบอร์โทร <input type="text" name="txta_Call" id="txta_Call" value="<? echo $objResult['a_Call']?>" /><br><br>
      ชื่อล็อคอิน <input type="text" name="txta_User" id="txta_User" value="<? echo $objResult['a_User']?>" /><br><br>
      รหัสล็อคอิน <input type="text" name="txta_Pass" id="txta_Pass" value="<? echo $objResult['a_Pass']?>" /><br><br>
      
        <br>
        <br>
        <input type="submit" name="edit" id="edit" value="แก้ไข">
     
    </form></td>
  </tr>
</table>
<p><a href="admin.php">กลับ</a></p>
</body>
</html>