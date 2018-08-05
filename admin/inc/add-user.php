<?php
if(isset($_POST['submit'])){
	session_start();
	if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$name=$_POST['name'];
			$semat=$_POST['semat'];		
			$permission=$_POST['permission'];	
			$us=$_POST['us'];	
			$pw=$_POST['pw'];       
			$pw2=sha1($pw);	
			require('../connect.php');

			$name = htmlentities($name,ENT_QUOTES);                            
			$semat = htmlentities($semat,ENT_QUOTES);              
			$permission = htmlentities($permission,ENT_QUOTES);              
			$us = htmlentities($us,ENT_QUOTES); 
			$pw = htmlentities($pw,ENT_QUOTES); 

			$result=mysqli_query($sql,"INSERT INTO `admin`(`id`, `name`, `semat`, `permission`, `us`, `pw`)  VALUES (NULL,'$name','$semat','$permission','$us','$pw2')");
			$query=mysqli_query($sql,"select max(`id`) as id from `admin`");
			$row=mysqli_fetch_array($query);
			$maxid=$row['id'];
			$ferror=$_FILES['picture']['error'];
			if(!$ferror)
			{
			$fname=$_FILES['picture']['name'];
			$ftype=$_FILES['picture']['type'];	
			$fsize=$_FILES['picture']['size'];	
			$ftemp=$_FILES['picture']['tmp_name'];	
			if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png"){
			move_uploaded_file($ftemp,"../../assets/img/admin/$maxid.jpg");
			    }elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
			    echo "<script>alert('فایل مشکل دارد');
				document.location.href='../show-user.php';
				</script>";
			    }
			}

			if($result){
				echo "<script>alert('ادمین جدید اضافه شد');
				document.location.href='../show-user.php';
				</script>";

					}else{	
				echo "<script>alert('ادمین جدید اضافه نشد');
				document.location.href='../add-user.php';
				</script>";
			}
	}else{			
	    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../add-user.php";
		</script>';
	}
}
?>
