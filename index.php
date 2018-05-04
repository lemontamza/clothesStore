<?php
session_start();
include 'include/config.inc.php';
$link=mysql_connect($host,$username,$password)or die("ไม่สามรถกับฐานข้อมูลได้ในขณะนี้");
mysql_select_db($dbname,$link)or die("ไม่สามารถติดต่อฐานข้อมูลได้ในขณะนี้");	//ติดต่อฐานข้อมูล
$c = $_GET['c'];
/* Category MYSQL*/
$strSQLPT="SELECT * FROM tbproducttype ORDER BY pt_ID ASC ";
$objQueryPT=mysql_query($strSQLPT) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
/*--------------------------------*/
/* List Product Select Form pt_ID */
$strSQLP="SELECT * FROM tbproduct WHERE pt_ID = '".$c."' ";
$objQueryP=mysql_query($strSQLP) or die ("ไม่สามารถติตด่อฐานข้อมูลได้[".$strSQL."]");	//ติดต่อฐานข้อมูลมาแสดง
/*--------------------------------*/
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
      <?php while($objResultPT = mysql_fetch_array($objQueryPT)){ ?>
        <a href="index.php?c=<? echo $objResultPT["pt_ID"] ?>"><? echo $objResultPT["pt_Name"] ?></a></br>
      <?php } ?>
    </td>
  </tr>
  <tr>
    <td width="300">
      <h3>หมวดหมู่</h3>
        <?php while($objResultPT = mysql_fetch_array($objQueryPT)){ ?>
          <a href="index.php?c=<? echo $objResultPT["pt_ID"] ?>"><? echo $objResultPT["pt_Name"] ?></a></br>
        <?php } ?>
    </td>
  </tr>
</table>
</div>
</body>
</html>
