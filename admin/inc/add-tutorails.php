<?php
if(isset($_POST['submit'])){
	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){

				$title=$_POST['title'];
				$admin=$_POST["admin"];
				$date=$_POST["date"];
				$content=$_POST['content'];	
				require('../connect.php');

				$title = htmlentities($title,ENT_QUOTES);       				
				$admin = htmlentities($admin,ENT_QUOTES);       				
				$date = htmlentities($date,ENT_QUOTES);         
				$result=mysqli_query($sql,"INSERT INTO `tutorails`(`id`, `title`, `content`, `admin`, `date`) VALUES (NULL,'$title','$content','$admin','$date')");
				$query=mysqli_query($sql,"select max(`id`) as id from `tutorails`");
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
				move_uploaded_file($ftemp,"../../assets/img/tutorails_image/$maxid.jpg");
				}elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
				echo "<script>alert('فایل مشکل دارد');
				document.location.href='../show-tutorails.php';
				</script>";
				}
				}

				if($result){
				echo "<script>alert('دوره جدید اضافه شد');
				document.location.href='../show-tutorails.php';
				</script>";

				}else{	
				echo "<script>alert('دوره جدید اضافه نشد');
				document.location.href='../add-tutorails.php';
				</script>";
				}
    }else{			
	    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../add-tutorails.php";
		</script>';
	}			
}
?>
