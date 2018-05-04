<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update</title>
</head>

<body>
 <p>
  <?php
$txtm_ID=$_POST['txtm_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtm_Name=$_POST['txtm_Name']; 
$txtm_Address=$_POST['txtm_Address']; 
$txtm_Sex=$_POST['txtm_Sex']; 
$txtm_Call=$_POST['txtm_Call']; 
$txtm_User=$_POST['txtm_User']; 
$txtm_Pass=$_POST['txtm_Pass']; 

$host="localhost";
$username="root";
$password="12345678";
$dbname="db_Store";
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$strSQL="UPDATE tbmember SET m_Name='$txtm_Name', m_Address='$txtm_Address', m_Sex='$txtm_Sex', m_Call='$txtm_Call', m_User='$txtm_User', m_Pass='$txtm_Pass' WHERE m_ID='$txtm_ID' ";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
?>
แก้ไขข้อมูล <? echo $txtm_ID?> เสร็จแล้ว
 </p>
 <p>&nbsp;</p>
 <p><a href="member.php">กลับสู่หน้าหลัก</a></p>
</body>
</html>