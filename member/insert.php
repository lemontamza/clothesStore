<?php
session_start();
include '../include/config.inc.php';
if($_SESSION['UserID'] == "")
	{
		header("location:../admin/index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>insert</title>
</head>

<body>
<table width="950" height="414">
  <tr>
    <td><form name="form1" method="post" action="member.php" enctype="multipart/form-data">
      รหัสสมาชิก <input type="number" name="txtm_ID" id="txtm_ID" /><br><br>
      ชื่อ - สกุล <input type="text" name="txtm_Name" id="txtm_Name" /><br><br>
      ที่อยู่ <input type="text" name="txtm_Address" id="txtm_Address" /><br><br>
	  เพศ <input type="text" name="txtm_Sex" id="txtm_Sex" /><br><br>
      เบอร์โทร <input type="text" name="txtm_Call" id="txtm_Call" /><br><br>
      ชื่อล็อคอิน <input type="text" name="txtm_User" id="txtm_User" /><br><br>
      รหัสล็อคอิน <input type="text" name="txtm_Pass" id="txtm_Pass" /><br><br>

        <br>
        <br>
        <input type="submit" name="add" id="add" value="เพิ่ม">

    </form></td>
  </tr>
</table>
</body>
</html>
