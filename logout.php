<?php
session_start();
unset($_SESSION["MemberName"]);
unset($_SESSION["MemberUser"]);
unset($_SESSION["Status"]);
header("location:index.php");
?>
