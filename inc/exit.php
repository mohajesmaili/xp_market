<?php
error_reporting(0);

session_start();

unset($_SESSION["user"]);
unset($_SESSION["user_id"]);

header("location:../index.php");
