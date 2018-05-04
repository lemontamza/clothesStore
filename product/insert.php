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
<table width="950" height="223">
  <tr>
    <td><form name="form1" method="post" action="product.php" enctype="multipart/form-data">
        รหัสสินค้า <input type="number" name="txtp_ID" id="txtp_ID" /><br><br>
        รหัสประเภทสินค้า <input type="number" name="txtpt_ID" id="txtpt_ID" /><br><br>
        ราคา <input type="number" name="txtprice" id="txtprice" /><br><br>
        ลักษณะ <input type="text" name="txtdescription" id="txtdescription" /><br><br>
        หมายเหตุ <input type="text" name="txtnote" id="txtnote" /><br><br>

        <br>
        <br>
        <input type="submit" name="add" id="add" value="เพิ่ม">

    </form>
   </td>
  </tr>
</table>
</body>
</html>
