<?php
error_reporting(0);
session_start();
$_SESSION['login'];
if(!$_SESSION['login']){
  echo "<script>document.location.href='login.php'</script>";
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <p>hi all</p>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Mr.Developer | add_learns</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <script src="assets/js/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="assets/js/ckfinder/ckfinder.js" type="text/javascript"></script>
    <script>
        function dl()
         {
            a=confirm('آیا برای حذف مطمئنید؟');
            if(a==false)
            return false
            else return true;
         }
function validateForm(){
var title = document.forms["form"]["title"].value;
var tutorails = document.forms["form"]["tutorails"].value;
var content = document.forms["form"]["content"].value;
var captcha = document.forms["form"]["captcha"].value;
if (title == null || title == ""){
    document.getElementById('title').style="border:1px solid #D40000";
  return false;
  }
else if (tutorails == null || tutorails == ""){
    document.getElementById('tutorails').style="border:1px solid #D40000";
  return false;
  }
else if (content == null || content == ""){
  document.getElementById('content').style="border:1px solid #D40000";
  return false;
  }
else if (captcha == null || captcha == ""){
  document.getElementById('captcha').style="border:1px solid #D40000";
  return false;
  }
  return true
}

function CheckEmpty(){
  title=document.getElementById('title').value;
  tutorails=document.getElementById('tutorails').value;
  content=document.getElementById('content').value;
  captcha=document.getElementById('captcha').value;

    if(title === ''){
        document.getElementById('title').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('title').style="";
    }
    if(tutorails === ''){
        document.getElementById('tutorails').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('tutorails').style="";
    }  
    if(captcha === ''){
    document.getElementById('captcha').style="border:1px solid #D40000";
    return false;
    }
    else{
    document.getElementById('captcha').style="";
    }   

    return true;
}
</script>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
<?php require('inc/header.php') ?> 
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside style="float: right;margin-right: 210px;">
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <?php require("inc/admin-right.php") ?> 
                  <li class="mt">
                      <a  href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>داشبورد</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>دوره ها</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-tutorails.php">نمایش دوره ها</a></li>
                          <li><a  href="add-tutorails.php">شروع دوره جدید</a></li>
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a  class="active" href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>آموزش ها</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-learns.php?pageid=1">نمایش آموزش دوره ها</a></li>
                          <li class="active"><a  href="add-learns.php">اضافه کردن آموزش جدید</a></li>
                          <li><a  href="show-comment-learn.php?pageid=1">مشاهده نظرات</a></li>
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-pencil"></i>
                          <span>مقالات</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-post.php?pageid=1">مشاهده مقالات</a></li>
                          <li><a  href="add-post.php">اضافه کردن مقاله</a></li>
                          <li><a  href="show-comment-post.php?pageid=1">مشاهده نظرات</a></li>
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-list"></i>
                          <span>دسته بندی</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-category.php">مشاهده دسته ها</a></li>
                          <li><a  href="add-category.php">اضافه کردن دسته</a></li>
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="li_user"></i>
                          <span>کاربران</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-user.php">نمایش کاربران</a></li>
                          <li><a  href="add-user.php">اضافه کردن کاربر</a></li>
                      </ul>
                  </li>   

                  <li class="sub-menu">
                      <a href="contact.php?pageid=1" >
                          <i class="fa fa-comment"></i>
                          <span>پیام کاربران</span>
                      </a>
                  </li>

              </ul>

              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-left"></i> اضافه کردن آموزش جدید</h4>
                      <form class="form-horizontal style-form" method="post" action="inc/add-learns.php" name="form" onsubmit="return validateForm();">   
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">تیتر:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="title" name="title" class="form-control round-form" type="text" placeholder="تیتر" onblur="CheckEmpty();">
                              </div>
                          </div>                                                 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">دوره:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <select id="tutorails" name="tutorails" class="form-control round-form" onblur="CheckEmpty();">
                                    <?php 
                                    require('connect.php');
                                    $admin=("Select * from `tutorails`");
                                    $result=mysqli_query($sql,$admin);
                                    while($row=mysqli_fetch_assoc($result)){
                                      echo'<option>'.$row["id"].'</option>';
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>   
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">متن آموزش:</label>
                              <div class="col-sm-10" style="margin-right: -100px;width: 900px">
                                  <textarea  id="content" name="content">
                                  </textarea>
                                  <script>
                                     CKEDITOR.replace( 'content', {
                                     customConfig: 'custom/editor_full_config.js',});
                                     CKFinder.setupCKEditor(null, 'assets/js/ckfinder/');
                                  </script>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">کد امنیتی:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <?php
                                  $sa_captchaDIR='assets/sc/sa-captcha';  
                                  require('assets/sc/sa-captcha/captcha.php');  
                                  ?>                              
                                  <input id="captcha" name="captcha" style="margin-top:10px;width:169px" class="form-control round-form" type="text" placeholder="کد امنیتی" onblur="CheckEmpty();">
                              </div>
                          </div> 
                          <button type="submit" name="submit" class="btn btn-success">ارسال</button>
                          <button type="button" type="reset" class="btn btn-danger">حذف</button>
                      </form>
                     </div> 
                  </div>
                            
          </section>
      </section>

      <!--main content end-->

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
