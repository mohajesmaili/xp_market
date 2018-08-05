<?php 

require('connect.php');

$a=$_SESSION["div-right"];

$result=mysqli_query($sql,"SELECT * FROM `admin` WHERE id='$a'");

$row=mysqli_fetch_array($result);
echo'
<p class="centered">
<a href="show-user.php"><img src="assets/img/admin/'.$row["id"].'.jpg" class="img-circle" width="60">
</a>
</p>
<h5 class="centered">'.$row["name"].'</h5>
';
?>