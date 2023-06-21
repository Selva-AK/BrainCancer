<?php
session_start();
unset($_SESSION);
unset($_SESSION["user_Name"]);
unset($_SESSION["email"]);
unset($_SESSION["role"]);

session_destroy();
session_write_close();
header("Location: index.html");
die;
exit;
?>