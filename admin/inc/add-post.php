<?php
if(isset($_POST['submit'])){

	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){

			$title=$_POST['title'];	
			$date=$_POST['date'];
			$admin=$_POST['admins'];		
			$category=$_POST['category'];	
			$first_content=$_POST['first_content'];	
			$content=$_POST['content'];	
			require('../connect.php');

			$title = htmlentities($title,ENT_QUOTES);              
			$date = htmlentities($date,ENT_QUOTES);
			$category = htmlentities($category,ENT_QUOTES);
			$admin = htmlentities($admin,ENT_QUOTES);
			$first_content=htmlentities($first_content,ENT_QUOTES);
			$result=mysqli_query($sql,"INSERT INTO `blog_post`(`id`, `title`,`first_content`, `content`, `date`,`admin`, `category`) VALUES (NULL,'$title','$first_content','$content','$date','$admin','$category')");
			$query=mysqli_query($sql,"select max(`id`) as id from `blog_post`");
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
			move_uploaded_file($ftemp,"../../assets/img/blog_images/$maxid.jpg");
			}elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
			echo "<script>alert('فایل مشکل دارد');
			document.location.href='../show-post.php?pageid=1';
			</script>";
			}
			}

			if($result){
			echo "<script>alert('پست شما اضافه شد');
			document.location.href='../show-post.php?pageid=1';
			</script>";

			}else{	
			echo "<script>alert('پست شما اضافه نشد');
			document.location.href='../show-post.php?pageid=1';
			</script>";
			}	
	}else{			
		    echo '
			<script>
				    alert("کد اشتباه است")
			        document.location.href="../add-post.php";
			</script>';
		}
}
?>
