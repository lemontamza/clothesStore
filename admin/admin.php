<?php
session_start();
include '../include/config.inc.php';
if($_SESSION['UserID'] == "")
	{
		header("location:index.php");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin</title>
</head>

<body>
<?php
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล

$txta_ID=$_POST['txta_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txta_Name=$_POST['txta_Name'];
$txta_Call=$_POST['txta_Call'];
$txta_User=$_POST['txta_User'];
$txta_Pass=$_POST['txta_Pass'];

if(isset($_POST['add']))
{
	$sql_query="INSERT INTO tbadmin (a_ID,a_Name,a_Call,a_User,a_Pass) VALUES('$txta_ID','$txta_Name','$txta_Call','$txta_User','$txta_Pass')"; //เพิ่มข้อมูลใน table
	$result=mysql_query($sql_query,$link) or die("ไม่สามารถติตด่อฐานข้อมูลได้");

//$strSQL="SELECT * FROM tbproducttype";
//$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
}

$strSQL="SELECT * FROM tbadmin";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง

?>

<div align="center">
<table width="1345">
  <tr>
    <td height="105"><img src="image/Untitled-3.jpg" width="1345" height="220" /></td>
  </tr>
</table>
<table width="950" border="1">
  <tr>
   <th width="186" height="25" bgcolor="#00FF00" scope="col"><a href="../producttype/clothesStore.php">ข้อมูลประเภทสินค้า</a></th>
      <th width="187" bgcolor="#00FF00" scope="col"><a href="../product/product.php">ข้อมูลสินค้า</a></th>
      <th width="233" bgcolor="#00FF00" scope="col"><a href="../order/order.php">ข้อมูลการซื้อ - ขาย</a></th>
      <th width="164" bgcolor="#00FF00" scope="col"><a href="../member/member.php">ข้อมูลสมาชิก</a></th>
      <th width="146" bgcolor="#00FF00" scope="col"><a href="admin.php">ข้อมูลผู้ดูแล</a></th>
			<th width="146" bgcolor="#00FF00" scope="col"><a href="logout.php">ออกจากระบบ</a></th>
  </tr>
</table>
<table width="988" border="1">
  <tr>
    <td width="150" align="center"><strong>รหัสผู้ดูแลระบบ</strong></td>
    <td width="196" align="center"><strong>ชื่อ - สกุล</strong></td>
    <td width="218" align="center"><strong>เบอร์โทร</strong></td>
    <td width="115" align="center"><strong>Username</strong></td>
    <td width="116" align="center"><strong>Password</strong></td>
    <td width="75" align="center">&nbsp;</td>
    <td width="72" align="center">&nbsp;</td>
    <?php
	while($objResult = mysql_fetch_array($objQuery))
	{
    ?>
    <tr align="center">
      <td><? echo $objResult["a_ID"]?>&nbsp;</td>
      <td><? echo $objResult["a_Name"]?>&nbsp;</td>
      <td><? echo $objResult["a_Call"]?>&nbsp;</td>
      <td><? echo $objResult["a_User"]?>&nbsp;</td>
      <td><? echo $objResult["a_Pass"]?>&nbsp;</td>

      <td><a href="edit.php?a_ID=<?php echo $objResult['a_ID']?>">แก้ไข</a></td>
      <td><a href="deleteUpd.php?a_ID=<?php echo $objResult['a_ID']?>" onClick="return confirm('คุณต้องการลบข้อมูลจริงหรือไม่')">ลบ </a></td>



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
