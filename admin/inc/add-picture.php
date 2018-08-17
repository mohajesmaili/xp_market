<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    $hiddenid=$_POST['inputhidden'];
    $hiddenid=htmlentities($hiddenid,ENT_QUOTES);
    echo $hiddenid;
    session_start();
    if($_POST['captcha'] == $_SESSION['sacaptchaCode']){

        require("connect.php");

        $query=mysqli_query($sql,"SELECT `id` FROM `product`");
        $row=mysqli_fetch_array($query);
        $id=$row['id'];
        $ferror=$_FILES['picture-1']['error'];
        if(!$ferror)
        {
            $fname=$_FILES['picture-1']['name'];
            $ftype=$_FILES['picture-1']['type'];
            $fsize=$_FILES['picture-1']['size'];
            $ftemp=$_FILES['picture-1']['tmp_name'];
            if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" ){
                move_uploaded_file($ftemp,"../../images/more_p/$hiddenid-(2).png");
            }elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
                echo "<script>alert('فایل مشکل دارد');
			          document.location.href='../add-picture.php?productid=".$hiddenid."';
			          </script>";
            }
        }

        $ferror=$_FILES['picture-2']['error'];
        if(!$ferror)
        {
            $fname=$_FILES['picture-2']['name'];
            $ftype=$_FILES['picture-2']['type'];
            $fsize=$_FILES['picture-2']['size'];
            $ftemp=$_FILES['picture-2']['tmp_name'];
            if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" ){
                move_uploaded_file($ftemp,"../../images/more_p/$hiddenid-(3).png");
            }elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
                echo "<script>alert('فایل مشکل دارد');
			          document.location.href='../add-picture.php?productid=".$hiddenid."';
			          </script>";
            }
        }

        $ferror=$_FILES['picture-3']['error'];
        if(!$ferror)
        {
            $fname=$_FILES['picture-3']['name'];
            $ftype=$_FILES['picture-3']['type'];
            $fsize=$_FILES['picture-3']['size'];
            $ftemp=$_FILES['picture-3']['tmp_name'];
            if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" ){
                move_uploaded_file($ftemp,"../../images/more_p/$hiddenid-(4).png");
            }elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
                echo "<script>alert('فایل مشکل دارد');
			          document.location.href='../add-picture.php?productid=".$hiddenid."';
			          </script>";
            }
        }

        $ferror=$_FILES['picture-4']['error'];
        if(!$ferror)
        {
            $fname=$_FILES['picture-4']['name'];
            $ftype=$_FILES['picture-4']['type'];
            $fsize=$_FILES['picture-4']['size'];
            $ftemp=$_FILES['picture-4']['tmp_name'];
            if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" ){
                move_uploaded_file($ftemp,"../../images/more_p/$hiddenid-(5).png");
            }elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
                echo "<script>alert('فایل مشکل دارد');
			          document.location.href='../add-picture.php?productid=".$hiddenid."';
			          </script>";
            }
        }

        $ferror=$_FILES['picture-5']['error'];
        if(!$ferror)
        {
            $fname=$_FILES['picture-5']['name'];
            $ftype=$_FILES['picture-5']['type'];
            $fsize=$_FILES['picture-5']['size'];
            $ftemp=$_FILES['picture-5']['tmp_name'];
            if($ftype == "image/jpg" || $ftype == "image/jpeg" || $ftype == "image/png" ){
                move_uploaded_file($ftemp,"../../images/more_p/$hiddenid-(6).png");
                echo "<script>alert('با موفقیت آپلود شد');
			          document.location.href='../show-product.php?pageid=1';
			          </script>";
            }elseif ($ftype != "image/jpg" || $ftype != "image/jpeg" || $ftype != "image/png"){
                echo "<script>alert('فایل مشکل دارد');
			          document.location.href='../add-picture.php?productid=".$hiddenid."';
			          </script>";
            }
        }
    }else{
        echo '
		<script>
			    alert("کد اشتباه است")
		        document.location.href="../add-picture.php?productid='.$hiddenid.'";
		</script>';
    }
}
