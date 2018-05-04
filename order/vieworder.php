<?php
session_start();
include '../include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$id = $_GET['o_ID'];
$sqllist="SELECT * FROM tborder WHERE o_ID = '".$id."'";
$Querylist=mysql_query($sqllist) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$sqlc."]");

$sqlm="SELECT * FROM tborder WHERE o_ID = '".$id."'";
$Querym=mysql_query($sqlm) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$sqlc."]");
$objm = mysql_fetch_array($Querym);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Order = </title>
  </head>
  <body>
<table align="center" border="1" width="1000px">
  <tr>
    <td colspan="4"><center>ใบสั่งซื้อเลขที่ <?php echo $id;?></center></td>
  </tr>
  <tr>
    <td colspan="4">
      <p>ชื่อ-นามสกุล&nbsp;:&nbsp;<?php echo $objm['m_Name']?></p>
      <p>ที่อยู่&nbsp;:&nbsp;<?php echo $objm['m_Address']?></p>
      <p>เบอร์โทร&nbsp;:&nbsp;<?php echo $objm['m_Tel']?></p>
    </td>
  </tr>
  <tr>
    <td>ลำดับที่</td>
    <td>รายการ</td>
    <td>จำนวน</td>
    <td>รวม</td>
  </tr>
  <?php
  $n = 0;
  $sum = 0;
  while($objcc = mysql_fetch_array($Querylist)){
$n++;
  $sum = $objcc['p_Qty'] * $objcc['price'];
  $allsum = $allsum + $sum;
  ?>
    <tr>
      <td><?php echo $n;?></td>
      <td><?php echo $objcc['p_Description']?></td>
      <td><?php echo $objcc['p_Qty']?></td>
      <td><?php echo $sum?></td>
    </tr>
  <?php  } ?>
  <tr>
    <td colspan="3">รวมเป็นเงิน</td>
    <td><?php echo $allsum?></td>
  </tr>
</table>
<div align="center">
<a href="order.php">กลับ</a>&nbsp;&nbsp;<input type="button" onclick="window.print()" value="พิมพ์" />
</div>
  </body>
</html>
