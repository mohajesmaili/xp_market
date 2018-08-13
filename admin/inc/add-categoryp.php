<?php
if(isset($_POST['submit'])){	
	session_start();
	if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
		$name=$_POST['name'];	
		require('connect.php');

		$name = htmlentities($name,ENT_QUOTES);              

		$result=mysqli_query($sql,"INSERT INTO `categoryp` VALUES (NULL,'$name')");

		if($result){
		echo "<script>alert('دسته جدید اضافه شد');
		document.location.href='../show-categoryp.php';
		</script>";

			}else{	
		echo "<script>alert('دسته جدید اضافه نشد');
		document.location.href='../add-categoryp.php';
		</script>";
		}
	}else{			
	    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../add-categoryp.php";
		</script>';
	}
}
?>
