<?php
session_start();
include 'include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$sessionid = session_id();
$date = date('d-m-Y');

$sqlcart="SELECT * FROM tbcart WHERE m_ID = '".$sessionid."' AND c_Date = '".$date."'";
$Querycart=mysql_query($sqlcart) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$sqlp."]");

if($_SESSION['Status'] == "User"){
$sqlm="SELECT * FROM tbmember WHERE m_User = '".$_SESSION['MemberUser']."'";
$Querym=mysql_query($sqlm) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$sqlp."]");	//ติดต่อฐานข้อมูลมาแสดง
$objm = mysql_fetch_array($Querym);
}
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
        <a href="cart.php">ตะกร้าสินค้า</a>
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
<a href="cart.php">ย้อนกลับ</a>&nbsp;<a href="checkout.php">ต่อไป</a>
        </div>

        <?php if ($_SESSION['Status'] == "User") { ?>
          <div align="center">
            <table border="0" align="center">
              <tbody>
                <form method="post" action="finish.php">
                <tr>
                  <td width="150">ชื่อ - นามสกุล</td>
                  <td width="300"><input type="text" name="fullname" value="<?php echo $objm['m_Name']?>" /></td>
                </tr>
                <tr>
                  <td width="150">ที่อยู่</td>
                  <td width="300"><textarea name="address"><?php echo $objm['m_Address']?></textarea></td>
                </tr>
                <tr>
                  <td width="150">เบอร์โทร</td>
                  <td width="300"><input type="text" name="tel" value="<?php echo $objm['m_Call']?>" /></td>
                </tr>
                <tr>
                  <td width="150"></td>
                  <td width="300"><input type="submit" value="ตกลง" /></td>
                </tr>
              </tbody>
            </table>
          </div>

        <?php }else{ ?>
          <div align="center">
            <table border="0" align="center">
              <tbody>
                <form method="post" action="finish.php">
                <tr>
                  <td width="150">ชื่อ - นามสกุล</td>
                  <td width="300"><input type="text" name="fullname" placeholder="กรุณากรอกชื่อ" /></td>
                </tr>
                <tr>
                  <td width="150">ที่อยู่</td>
                  <td width="300"><textarea name="address"></textarea></td>
                </tr>
                <tr>
                  <td width="150">เบอร์โทร</td>
                  <td width="300"><input type="text" name="tel" placeholder="กรุณากรอกเบอร์โทร" /></td>
                </tr>
                <tr>
                  <td width="150"></td>
                  <td width="300"><input type="submit" value="ตกลง" /></td>
                </tr>
              </tbody>
            </table>
          </div>
      <?php } ?>
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
