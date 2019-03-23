<?php
unset($_COOKIE["user_id"]);
setcookie("user_id","", time() - 3600,'/');
unset($_COOKIE["redirect"]);
setcookie("redirect","", time() - 3600,'/');
header("Location: ./index1.php");
?>