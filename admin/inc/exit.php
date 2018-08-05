<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION["div-right"]);
unset($_SESSION["permission"]);

header("location:../login.php");
?>