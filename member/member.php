<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>member</title>
</head>

<body>
<?php
$host="localhost";
$username="root";
$password="12345678";
$dbname="db_Store";
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล

$txtm_ID=$_POST['txtm_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtm_Name=$_POST['txtm_Name']; 
$txtm_Address=$_POST['txtm_Address']; 
$txtm_Sex=$_POST['txtm_Sex']; 
$txtm_Call=$_POST['txtm_Call']; 
$txtm_User=$_POST['txtm_User']; 
$txtm_Pass=$_POST['txtm_Pass']; 

if(isset($_POST['add']))
{
	$sql_query="INSERT INTO tbmember (m_ID,m_Name,m_Address,m_Sex,m_Call,m_User,m_Pass) VALUES('$txtm_ID','$txtm_Name','$txtm_Address','$txtm_Sex','$txtm_Call','$txtm_User','$txtm_Pass')"; //เพิ่มข้อมูลใน table
	$result=mysql_query($sql_query,$link) or die("ไม่สามารถติตด่อฐานข้อมูลได้");

//$strSQL="SELECT * FROM tbproducttype";
//$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
}

$strSQL="SELECT * FROM tbmember";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง

?>

<div align="center"> 
<table width="1345">
  <tr>
    <td><img src="image/Untitled-1.jpg" width="1345" height="220" /></td>
  </tr>
</table>
<table width="950" border="1">
  <tr>
    <th width="186" height="25" bgcolor="#00FF00" scope="col"><a href="../producttype/clothesStore.php">ข้อมูลประเภทสินค้า</a></th>
      <th width="187" bgcolor="#00FF00" scope="col"><a href="../product/product.php">ข้อมูลสินค้า</a></th>
      <th width="233" bgcolor="#00FF00" scope="col"><a href="../order/order.php">ข้อมูลการซื้อ - ขาย</a></th>
      <th width="164" bgcolor="#00FF00" scope="col"><a href="member.php">ข้อมูลสมาชิก</a></th>
      <th width="146" bgcolor="#00FF00" scope="col"><a href="../admin/admin.php">ข้อมูลผู้ดูแล</a></th>
  </tr>
</table>
<table width="1148" border="1">
  <tr>
    <td width="121" align="center"><strong>รหัสสมาชิก</strong></td>
    <td width="178" align="center"><strong>ชื่อ - สกุล</strong></td>
    <td width="194" align="center"><strong>ที่อยู่</strong></td>
    <td width="65" align="center"><strong>เพศ</strong></td>
    <td width="123" align="center"><strong>เบอร์โทร</strong></td>
    <td width="127" align="center"><strong>Username</strong></td>
    <td width="130" align="center"><strong>Password</strong></td>
    <td width="79" align="center">&nbsp;</td>
    <td width="73" align="center">&nbsp;</td>
    <?php
	while($objResult = mysql_fetch_array($objQuery))
	{
    ?>
    <tr align="center">
      <td><? echo $objResult["m_ID"]?>&nbsp;</td>
      <td><? echo $objResult["m_Name"]?>&nbsp;</td>
      <td><? echo $objResult["m_Address"]?>&nbsp;</td>
      <td><? echo $objResult["m_Sex"]?>&nbsp;</td>
      <td><? echo $objResult["m_Call"]?>&nbsp;</td>
      <td><? echo $objResult["m_User"]?>&nbsp;</td>
      <td><? echo $objResult["m_Pass"]?>&nbsp;</td>
      
      <td><a href="edit.php?m_ID=<?php echo $objResult['m_ID']?>">แก้ไข</a></td>
      <td><a href="deleteUpd.php?m_ID=<?php echo $objResult['m_ID']?>" onClick="return confirm('คุณต้องการลบข้อมูลจริงหรือไม่')">ลบ </a></td>            
  
    </tr>
    
    <?php
	}
    ?>
  </table>
<table width="950">
  <tr>
    <td><a href="insert.php">เพิ่มข้อมูล</a></td>
  </tr>
</table>
</div>
</body>
</html>