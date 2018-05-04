<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>insert</title>
</head>

<body>
<table width="950">
  <tr>
    <td><form name="form1" method="post" action="order.php" enctype="multipart/form-data">
      รหัสการสั่งซื้อ <input type="number" name="txto_ID" id="txto_ID" /><br><br>
      รหัสสมาชิก <input type="number" name="txtm_ID" id="txtm_ID" /><br><br>
      รหัสสินค้า <input type="number" name="txtp_ID" id="txtp_ID" /><br><br>
	  ราคา <input type="number" name="txtprice" id="txtprice" /><br><br>
      วันเดือนปีที่สั่งซื้อ <input type="date" name="date" id="date" /><br><br>
      
        <br>
        <br>
        <input type="submit" name="add" id="add" value="เพิ่ม">
     
    </form>
    </td>
  </tr>
</table>
<p><a href="order.php">กลับ</a></p>
</body>
</html>