<?php 
error_reporting(0);

$server="localhost";

$user="root";

$password="";

$database="mr_developer";

$sql=mysqli_connect($server,$user,$password);

mysqli_query($sql,"SET CHARACTER SET 'utf8'");
mysqli_query($sql,"SET NAMES 'utf8'");
mysqli_query($sql,"SET CHARACTER SET 'utf8'");
mysqli_query($sql,"SET character_set_connection = 'utf8'");

if(!$sql){
die (".نمیتوان به سرور وصل شد"."<br>" .mysqli_connect_errno());
	
}

$mysqli_connect=mysqli_select_db($sql,$database);

if(!$mysqli_connect){
	echo ".دیتابیس انتخاب نشد"."<br>";
	}
?>