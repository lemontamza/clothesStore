<?php
session_start();
include 'include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$c=null;
$p=null;
$c=$_GET['c']; /*producttypeID*/
$p=$_GET['p']; /*product ID*/
$sessionid = session_id();
$date = date('d-m-Y');
/* Select Detail tbproduct*/
$sqlp="SELECT * FROM tbproduct WHERE p_ID = '".$p."'";
$Queryp=mysql_query($sqlp) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$sqlp."]");	//ติดต่อฐานข้อมูลมาแสดง
$objp = mysql_fetch_array($Queryp);
/* Check Cart Anti Order */

$sqlch="SELECT * FROM tbcart WHERE m_ID = '".$sessionid."' AND p_ID = '".$p."' AND c_Date = '".$date."' ";
$Querych=mysql_query($sqlch) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$sqlp."]");	//ติดต่อฐานข้อมูลมาแสดง
$objch = mysql_fetch_array($Querych);
if (!$objch) {
  if (isset($c,$p)) {
    $sqlinsertcart="INSERT INTO tbcart (m_ID,p_ID,p_Qty,p_Price,pt_ID,c_Date,p_Description)
    VALUES('".$sessionid."','".$p."','1','".$objp['price']."','".$c."','".$date."','".$objp['description']."')"; //เพิ่มข้อมูลใน table
    $result=mysql_query($sqlinsertcart,$link) or die("ไม่สามารถติตด่อฐานข้อมูลได้");
  }
}
else {
  echo "<center>สินค้าชิ้นนี้ได้อยู่ในตะกร้าแล้ว...</center>";
  header('Refresh: 2; URL=index.php');
}

$sqlcart="SELECT * FROM tbcart WHERE m_ID = '".$sessionid."'";
$Querycart=mysql_query($sqlcart) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$sqlp."]");	//ติดต่อฐานข้อมูลมาแสดง

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To clothesStore</title>
</head>

<body>
<div align="center">
<table width="1345">
  <tr>
    <td height="105"><img src="images/bar2.jpg" width="1345" height="220" /></td>
  </tr>
</table>
<table border="1" width="1345">
  <tr>
    <?php if ($_SESSION['Status'] == "User") { ?>
      <td width="300">Member
        <p>User :: <?php echo $_SESSION['MemberUser']?></p>
        <p>ชื่อ :: <?php echo $_SESSION['MemberName']?></p>
        <a href="logout.php">ออกจากระบบ</a>
        <p><?php echo session_id();?></p>
      </td>
    <?php }else{ ?>
  <td width="300">Login
    <form method="post" action="userlogin.php">
      <input type="text" name="username" placeholder="Username" />
      <input type="password" name="password" placeholder="Password">
      <input type="submit" value="Sign-in" />
    </form>
  </td>
  <?php } ?>
    <td rowspan="2">
        <table border="1" align="center">
          <thead>
            <th>รายการที่</th>
            <th width="250px">รายการ</th>
            <th>จำนวน</th>
            <th width="100px">ราคา</th>
          </thead>
          <?php
          $n = 0;
          $sum = 0;
          while($objcartlist = mysql_fetch_array($Querycart)){
          $n++;
          $sum = $objcartlist['p_Qty'] * $objcartlist['p_Price'];
          $allsum = $allsum + $sum;
          ?>
            <tr>
              <td><?php echo $n;?></td>
              <td><?php echo $objcartlist['p_Description']?></td>
              <td><?php echo $objcartlist['p_Qty']?></td>
              <td><?php echo $sum?></td>
            </tr>
          <?php } ?>
          <tr>
            <td colspan="3">รวมเป็นเงิน</td>
            <td ><?php echo $allsum?></td>
          </tr>
        </table>
        <div align="center">
<a href="index.php">ย้อนกลับ</a>&nbsp;<a href="checkout.php">ต่อไป</a>
        </div>

    </td>
  </tr>
  <tr>
    <td width="300">
    </td>
  </tr>
</table>
</div>
</body>
</html>
