<?php
session_start();
include '../include/config.inc.php';
if($_SESSION['UserID'] == "")
	{
		header("location:../admin/index.php");
	}
?>
<html>
<head>
<meta charset="utf-8">
<title>clothesStore</title>
</head>

<body>
<?php

$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล

$txtp_ID=$_POST['txtp_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtpt_ID=$_POST['txtpt_ID'];


if(isset($_POST['add']))
{
	$sql_query="INSERT INTO tbproducttype (p_ID,pt_ID) VALUES('$txtp_ID','$txtpt_ID')"; //เพิ่มข้อมูลใน table
	$result=mysql_query($sql_query,$link) or die("ไม่สามารถติตด่อฐานข้อมูลได้");

//$strSQL="SELECT * FROM tbproducttype";
//$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
}

$strSQL="SELECT * FROM tbproducttype";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
?>
<div align="center">
<table width="1345" height="225" border="0">
  <tbody>
    <tr>
      <td><img src="image/Untitled-3.jpg" width="1345" height="220" /></td>
    </tr>
    </tbody>
</table>
<table width="950" border="1">
  <tbody>
    <tr>
      <th width="187" height="25" bgcolor="#00FF00" scope="col"><a href="clothesStore.php">ข้อมูลประเภทสินค้า</a><a href="clothesStore.php"></a></th>
      <th width="186" bgcolor="#00FF00" scope="col"><a href="../product/product.php">ข้อมูลสินค้า</a></th>
      <th width="233" bgcolor="#00FF00" scope="col"><a href="../order/order.php">ข้อมูลการซื้อ - ขาย</a></th>
      <th width="164" bgcolor="#00FF00" scope="col"><a href="../member/member.php">ข้อมูลสมาชิก</a></th>
      <th width="146" bgcolor="#00FF00" scope="col"><a href="../admin/admin.php">ข้อมูลผู้ดูแล</a></th>
			<th width="146" bgcolor="#00FF00" scope="col"><a href="../admin/logout.php">ออกจากระบบ</a></th>
      </tr>
  </tbody>
</table>

<table width="700" border="1">

  <tbody>
    <tr>
      <th width="170" height="28" scope="col">รหัสสินค้า&nbsp;</th>
      <th width="170" align="center" scope="col">รหัสประเภทสินค้า&nbsp;</th>
			<th width="170" align="center" scope="col">ชื่อประเภทสินค้า&nbsp;</th>
      <td width="96" align="center">&nbsp;</td>
      <td width="94" align="center">&nbsp;</td>
      <?php
	while($objResult = mysql_fetch_array($objQuery))
	{
    ?>
    <tr align="center">
      <th scope="col"><? echo $objResult["p_ID"] ?>&nbsp;</th>
      <td><? echo $objResult["pt_ID"]?>&nbsp;</td>
			<td><? echo $objResult["pt_Name"]?>&nbsp;</td>
      <td><a href="edit.php?p_ID=<?php echo $objResult['p_ID']?>">แก้ไข</a></td>
      <td> <a href="deleteUpd.php?p_ID=<?php echo $objResult['p_ID']?>" onClick="return confirm('คุณต้องการลบข้อมูลจริงหรือไม่')">ลบ </a></td>

      </tr>
    <?php
	}
    ?>


</table>
<table width="950" border="0">
  <tbody>
    <tr>
      <td><a href="insert.php">เพิ่มข้อมูล</a></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</div>
</body>
</html>
