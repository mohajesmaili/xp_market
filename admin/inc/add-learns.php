<?php
if(isset($_POST['submit'])){
	session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
			$title=$_POST['title'];	
			$tutorailsid=$_POST['tutorails'];	
			$content=$_POST['content'];	
			require('../connect.php');

			$title = htmlentities($title,ENT_QUOTES);              
			$tutorailsid = htmlentities($tutorailsid,ENT_QUOTES);              

			$result=mysqli_query($sql,"INSERT INTO `tutorails_learn`(`id`, `title`, `content`, `tutorailsid`) VALUES (NULL,'$title','$content','$tutorailsid')");

			if($result){
			echo "<script>alert('آموزش جدید اضافه شد');
			document.location.href='../show-learns.php?pageid=1';
			</script>";

				}else{	
			echo "<script>alert('آموزش اضافه نشد');
			document.location.href='../add-learns-learns.php';
			</script>";
			}    
	}else{			
	    echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../add-learns.php";
		</script>';
	}
}
?>
