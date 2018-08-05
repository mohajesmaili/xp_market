<?php
error_reporting(0);
session_start();
$_SESSION['login'];
if(!$_SESSION['login']){
  echo "<script>document.location.href='login.php'</script>";
  }
$_SESSION["permission"];
if($_SESSION["permission"]!=1){
  echo "<script>
        alert('شما اجازه ورود به این قسمت را ندارید');
        document.location.href='index.php';
        </script>";
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Mr.Developer | edit_admin</title>

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
    <script>
        function dl()
         {
            a=confirm('آیا برای حذف مطمئنید؟');
            if(a==false)
            return false
            else return true;
         }
function validateForm(){
var name = document.forms["form"]["name"].value;
var semat = document.forms["form"]["semat"].value;
var permission = document.forms["form"]["permission"].value;
var us = document.forms["form"]["us"].value;
var captcha = document.forms["form"]["captcha"].value;
if (name == null || name == ""){
    document.getElementById('name').style="border:1px solid #D40000";
  return false;
  }
  else if (semat == null || semat == ""){
    document.getElementById('semat').style="border:1px solid #D40000";
  return false;
  }
  else if (permission == null || permission == ""){
  document.getElementById('permission').style="border:1px solid #D40000";
  return false;
  }
  else if (us == null || us == ""){
  document.getElementById('us').style="border:1px solid #D40000";
  return false;
  }
  else if (captcha == null || captcha == ""){
  document.getElementById('captcha').style="border:1px solid #D40000";
  return false;
  }
  return true
}

function CheckEmpty(){
  name=document.getElementById('name').value;
  semat=document.getElementById('semat').value;
  permission=document.getElementById('permission').value;
  us=document.getElementById('us').value;
  captcha=document.getElementById('captcha').value; 
    if(name === ''){
        document.getElementById('name').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('name').style="";
    }    

    if(semat === ''){
        document.getElementById('semat').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('semat').style="";
    }
  if(permission === ''){
        document.getElementById('permission').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('permission').style="";
    }
    if(us === ''){
        document.getElementById('us').style="border:1px solid #D40000";
        return false;
        }
    else{
        document.getElementById('us').style="";
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
                  <?php require("inc/header.php") ?> 

      
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
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>آموزش ها</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-learns.php?pageid=1">نمایش آموزش دوره ها</a></li>
                          <li><a  href="add-learns.php">اضافه کردن آموزش جدید</a></li>
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
                      <a class="active" href="javascript:;" >
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
                      <h4 class="mb"><i class="fa fa-angle-left"></i>ویرایش ادمین</h4>
                      <form class="form-horizontal style-form" method="post" action="inc/edit-admin.php" name="form" onsubmit="return validateForm();" enctype="multipart/form-data">
                        <?php
                          $id=$_REQUEST['adminid'];
                          $id = htmlentities($id, ENT_QUOTES, "UTF-8");   
                          $id = str_replace("<", "&lt;", $id);
                          $id = str_replace(">", "&gt;", $id);
                          $id = str_replace("script", "", $id);                   
                          $id=filter_var($id, FILTER_SANITIZE_FULL_SPECIAL_CHARS);                          
                          require("connect.php");
                          $id=mysqli_escape_string($sql,$id);
                          $edit_admin=("SELECT * FROM `admin` where id='$id'");
                          $result=mysqli_query($sql,$edit_admin);
                          if(mysqli_num_rows($result) > 0){
                          $row=mysqli_fetch_array($result);
                          echo '<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">نام:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="name" name="name" class="form-control round-form" type="text" placeholder="نام و نام خانوادگی" onblur="CheckEmpty();" value="'.$row["name"].'">
                              </div>
                          </div>                            
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">سمت:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="semat" name="semat" class="form-control round-form" type="text" placeholder="درجه/سمت فرد" onblur="CheckEmpty();" value="'.$row["semat"].'">
                              </div>
                          </div>                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">سطح دسترسی:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                  <input id="permission" name="permission" class="form-control round-form" type="text" placeholder="سطح دسترسی" onblur="CheckEmpty();" value="'.$row["permission"].'">
                              </div>
                          </div> 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">نام کاربری:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                              <input id="us" name="us" class="form-control round-form" type="text" placeholder="نام کاربری" onblur="CheckEmpty();" value="'.$row["us"].'">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">عکس فعلی:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                <img src="../assets/img/admin/'.$row['id'].'.jpg" width=300px; height=300px style="border-radius:2px;" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ارسال عکس:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">
                                <input id="picture" name="picture" onblur="CheckEmpty();" class="round-form" type="file">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">کد امنیتی:</label>
                              <div class="col-sm-10" style="margin-right: -100px;">';
                                  
                                  $sa_captchaDIR="assets/sc/sa-captcha";  
                                  require("assets/sc/sa-captcha/captcha.php");  
                                                                
                            echo'<input id="captcha" name="captcha" style="margin-top:10px;width:169px" class="form-control round-form" type="text" placeholder="کد امنیتی" onblur="CheckEmpty();">
                              </div>
                          </div> 
                          <input type="hidden" value="'.filter_var($id, FILTER_SANITIZE_NUMBER_INT).'" name="hiddenid"/>
                          <button type="submit" name="submit" class="btn btn-success">ارسال</button>
                          <button type="button" type="reset" class="btn btn-danger">حذف</button>
                      </form>
                     </div> 
                  </div>';
                   }
                  ?>
       
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
