<?php
if(isset($_POST['submit'])){	
	session_start();
	if($_POST['captcha'] == $_SESSION['sacaptchaCode']){
		$name=$_POST['name'];	
		require('connect.php');

		$name = htmlentities($name,ENT_QUOTES);              

		$result=mysqli_query($sql,"INSERT INTO `categoryb` VALUES (NULL,'$name')");

        $query=mysqli_query($sql,"select max(`id`) as id from `categoryb`");
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
                move_uploaded_file($ftemp,"../../images/brand/$maxid.png");
            }elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
                echo "<script>alert('فایل مشکل دارد');
				document.location.href='../show-categoryb.php';
				</script>";
            }
        }


		if($result){
		echo "<script>alert('برند جدید اضافه شد');
		document.location.href='../show-categoryb.php';
		</script>";

			}else{	
		echo "<script>alert('برند جدید اضافه نشد');
		document.location.href='../add-categoryb.php';
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
