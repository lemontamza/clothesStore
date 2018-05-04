<?php
session_start();
include '../include/config.inc.php';
if($_SESSION['UserID'] == "")
	{
		header("location:../admin/index.php");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>product</title>
</head>

<body>
<?php
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล

$txtp_ID=$_POST['txtp_ID']; //สร้างตัวแปรรับค่าที่ส่งมา
$txtpt_ID=$_POST['txtpt_ID'];
$txtprice=$_POST['txtprice'];
$txtdescription=$_POST['txtdescription'];
$txtnote=$_POST['txtnote'];


if(isset($_POST['add']))
{
	$target_dir = SRV_ROOT."imagesproduct/";
if(move_uploaded_file($_FILES["pic"]["tmp_name"],$target_dir.$_FILES["pic"]["name"]))
{
	$picstatus = 'OK';
}
else {
	$picstatus = 'Failed';
}
	$sql_query="INSERT INTO tbproduct (p_ID,pt_ID,price,description,note,p_Pic) VALUES('$txtp_ID','$txtpt_ID','$txtprice','$txtdescription','$txtnote','".$_FILES["pic"]["name"]."')"; //เพิ่มข้อมูลใน table
	$result=mysql_query($sql_query,$link) or die("ไม่สามารถติตด่อฐานข้อมูลได้");

//$strSQL="SELECT * FROM tbproducttype";
//$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
}

$strSQL="SELECT * FROM tbproduct";
$objQuery=mysql_query($strSQL) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
?>
<div align="center">
<table width="1345" height="225" border="0">
  <tr>
    <td><img src="image/Untitled-1.jpg" width="1345" height="220" /></td>
  </tr>
</table>
<table width="950" border="1">
  <tr>
      <th width="191" height="25" bgcolor="#00FF00" scope="col"><a href="../producttype/clothesStore.php">ข้อมูลประเภทสินค้า</a></th>
      <th width="192" bgcolor="#00FF00" scope="col"><a href="product.php">ข้อมูลสินค้า</a></th>
      <th width="228" bgcolor="#00FF00" scope="col"><a href="../order/order.php">ข้อมูลการซื้อ - ขาย</a></th>
      <th width="161" bgcolor="#00FF00" scope="col"><a href="../member/member.php">ข้อมูลสมาชิก</a></th>
      <th width="144" bgcolor="#00FF00" scope="col"><a href="../admin/admin.php">ข้อมูลผู้ดูแล</a></th>
			<th width="146" bgcolor="#00FF00" scope="col"><a href="../admin/logout.php">ออกจากระบบ</a></th>
  </tr>
</table>
<table width="950" border="1" >
  <tr>
    <td width="167" align="center"><strong>รหัสสินค้า</strong></td>
    <td width="168" align="center"><strong>รหัสประเภทสินค้า</strong></td>
    <td width="97" align="center"><strong>ราคา</strong></td>
    <td width="200" align="center"><strong>ชื่อสินค้า</strong></td>
    <td width="149" align="center"><strong>หมายเหตุ</strong></td>
    <td width="61" align="center">&nbsp;</td>
    <td width="62" align="center">&nbsp;</td>
    <?php
	while($objResult = mysql_fetch_array($objQuery))
	{
    ?>
    <tr align="center">
      <td><? echo $objResult["p_ID"]?>&nbsp;</td>
      <td><? echo $objResult["pt_ID"]?>&nbsp;</td>
      <td><? echo $objResult["price"]?>&nbsp;</td>
      <td><? echo $objResult["description"]?>&nbsp;</td>
      <td><? echo $objResult["note"]?>&nbsp;</td>

      <td><a href="edit.php?p_ID=<?php echo $objResult['p_ID']?>">แก้ไข</a></td>
      <td><a href="deleteUpd.php?p_ID=<?php echo $objResult['p_ID']?>" onClick="return confirm('คุณต้องการลบข้อมูลจริงหรือไม่')">ลบ </a></td>



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
