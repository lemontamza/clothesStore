<?php
$c = null;
$c = $_GET['c'];
$p = null;
$p = $_GET['p'];
if (isset($c,$p)) {
  echo "hello";
}
else {
  echo "empty";
}
?>
