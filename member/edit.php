<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>edit</title>
</head>

<body>
<?php
$m_ID=$_GET['m_ID'];
$host="localhost";
$username="root";
$password="12345678";
$dbname="db_Store";
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="SELECT * FROM tbmember WHERE m_ID='$m_ID'";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
$objResult = mysql_fetch_array($objQuery)
?>

<table width="950">
  <tr>
    <td> <form method="post" action="update.php" >
    	รหัสสมาชิก <input type="number" name="txtm_ID" id="txtm_ID" value="<? echo $objResult['m_ID']?>" /><br><br>
      ชื่อ - สกุล <input type="text" name="txtm_Name" id="txtm_Name" value="<? echo $objResult['m_Name']?>"/><br><br>
      ที่อยู่ <input type="text" name="txtm_Address" id="txtm_Address" value="<? echo $objResult['m_Address']?>"/><br><br>
	  เพศ <input type="text" name="txtm_Sex" id="txtm_Sex" value="<? echo $objResult['m_Sex']?>"/><br><br>
      เบอร์โทร <input type="text" name="txtm_Call" id="txtm_Call" value="<? echo $objResult['m_Call']?>"/><br><br>
      ชื่อล็อคอิน <input type="text" name="txtm_User" id="txtm_User" value="<? echo $objResult['m_User']?>"/><br><br>
      รหัสล็อคอิน <input type="text" name="txtm_Pass" id="txtm_Pass" value="<? echo $objResult['m_Pass']?>"/><br><br>
      
        <br>
        <br>
        <input type="submit" name="edit" id="edit" value="แก้ไข"></td>
        </form>
  </tr>
</table>
</body>
</html>