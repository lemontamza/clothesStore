<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>order</title>
</head>

<body>
<?php
include '../include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล

$txto_ID=$_POST['txto_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtm_ID=$_POST['txtm_ID'];
$txtp_ID=$_POST['txtp_ID'];
$txtprice=$_POST['txtprice'];
$date=$_POST['date'];

if(isset($_POST['add']))
{
	$sql_query="INSERT INTO tborder (o_ID,m_ID,p_ID,price,date) VALUES('$txto_ID','$txtm_ID','$txtp_ID','$txtprice','$date')"; //เพิ่มข้อมูลใน table
	$result=mysql_query($sql_query,$link) or die("ไม่สามารถติตด่อฐานข้อมูลได้");

//$strSQL="SELECT * FROM tbproducttype";
//$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
}

$strSQL="SELECT * FROM tborder";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง

?>
<div align="center">
<table width="1345">
  <tr>
    <td height="118"><img src="image/Untitled-1.jpg" width="1345" height="220" /></td>
  </tr>
</table>
<table width="950" border="1">
  <tr>
      <th width="186" height="25" bgcolor="#00FF00" scope="col"><a href="../producttype/clothesStore.php">ข้อมูลประเภทสินค้า</a></th>
      <th width="187" bgcolor="#00FF00" scope="col"><a href="../product/product.php">ข้อมูลสินค้า</a></th>
      <th width="233" bgcolor="#00FF00" scope="col"><a href="order.php">ข้อมูลการซื้อ - ขาย</a></th>
      <th width="164" bgcolor="#00FF00" scope="col"><a href="../member/member.php">ข้อมูลสมาชิก</a></th>
      <th width="146" bgcolor="#00FF00" scope="col"><a href="../admin/admin.php">ข้อมูลผู้ดูแล</a></th>
  </tr>
</table>
<table width="950" border="1">
  <tr>
    <td width="150" align="center"><strong>รหัสการสั่งซื้อ</strong></td>
    <td width="150" align="center"><strong>รหัสสมาชิก</strong></td>
    <td width="150" align="center"><strong>รหัสสินค้า</strong></td>
    <td width="150" align="center"><strong>ราคา</strong></td>
    <td width="149" align="center"><strong>วันเดือนปีที่สั่งซื้อ</strong></td>
    <td width="77" align="center">&nbsp;</td>
    <td width="78" align="center">&nbsp;</td>
     <?php
	while($objResult = mysql_fetch_array($objQuery))
	{
    ?>
      <tr align="center">
      <td><? echo $objResult["o_ID"]?>&nbsp;</td>
      <td><? echo $objResult["m_ID"]?>&nbsp;</td>
      <td><? echo $objResult["p_ID"]?>&nbsp;</td>
      <td><? echo $objResult["price"]?>&nbsp;</td>
      <td><? echo $objResult["date"]?>&nbsp;</td>

      <td><a href="edit.php?o_ID=<?php echo $objResult['o_ID']?>">แก้ไข</a></td>
      <td><a href="deleteUpd.php?o_ID=<?php echo $objResult['o_ID']?>" onClick="return confirm('คุณต้องการลบข้อมูลจริงหรือไม่')">ลบ </a></td>

      </tr>

    <?php
	}
    ?>
  </table>
<table width="950">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
</body>
</html>
