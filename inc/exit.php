<?php
error_reporting(0);

session_start();

unset($_SESSION["user"]);
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);
unset($_SESSION['sacaptchaCode']);

header("location:../index.php");
