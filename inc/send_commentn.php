<?php
if(isset($_POST['submit'])) {

    $news_id = $_GET['newsid'];

    session_start();

    if($_POST['captcha'] == $_SESSION['sacaptchaCode']) {
        require("connect.php");

        require("jalali-date.php");

        $userid = $_GET['userid'];

        $comment = $_POST['comment'];

        $date = jdate("Y-m-d", '', '', '', "en");

        $time = jdate("H:i:s", '', '', '', "en");


        $insert = "INSERT INTO `comment_news` VALUES (NULL,'$news_id','$userid','$comment','$date','$time',0,0)";

        $result = mysqli_query($sql, $insert);
        if (!$result) {
            echo "<script>alert('پیام ارسال نشد');
              document.location.href='../blog-single.php?newsid=" . $news_id . "';
              </script>";


        } else {
            echo "<script>
			        alert('پیام ارسال شد');
			        document.location.href='../blog-single.php?newsid=" . $news_id . "';
			</script>";
        }
    }else{
        echo "
		<script>
			    alert('کد اشتباه است');
		        document.location.href='../blog-single.php?newsid=" . $news_id . "';
		</script>";
    }
}
