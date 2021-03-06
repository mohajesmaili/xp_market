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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>XP_Market | نمایش نظرات</title>

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
                          <i class="fa fa-shopping-cart"></i>
                          <span>کالا</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-product.php?pageid=1">نمایش کالا</a></li>
                          <li><a  href="add-product.php">اضافه کردن کالا</a></li>
                          <li><a  href="show-sproduct.php?pageid=1">نمایش کالا فروخته شده</a></li>
                          <li><a  href="show-comment-product.php?pageid=1">مشاهده نظرات</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-list-alt"></i>
                          <span>دسته بندی کالا</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-categoryp.php">مشاهده دسته ها</a></li>
                          <li><a  href="add-categoryp.php">اضافه کردن دسته</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th-list"></i>
                          <span>دسته بندی برند</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-categoryb.php?pageid=1">مشاهده برند</a></li>
                          <li><a  href="add-categoryb.php">اضافه کردن برند</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="active" href="javascript:;" >
                          <i class="fa fa-pencil"></i>
                          <span>اخبار</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="show-news.php?pageid=1">مشاهده اخبار</a></li>
                          <li><a  href="add-news.php">اضافه کردن خبر</a></li>
                          <li class="active"><a  href="show-comment-news.php?pageid=1">مشاهده نظرات</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="li_user"></i>
                          <span>کاربران</span>
                      </a>
                      <ul class="sub">
                          <li ><a  href="show-users.php?pageid=1">نمایش کاربران</a></li>
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

                  <div class="col-md-12" style="margin-top: 20px;">
                      <div class="content-panel">
                          <h4></i>نظرات کاربران</h4><hr><table class="table table-striped table-advance table-hover">
                              <thead>

                              <tr>
                                  <th>ایمیل</th>
                                  <th class="hidden-phone">خبر</th>
                                  <th>تاریخ</th>
                                  <th>تنظیمات</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                                require('inc/connect.php');
                                $page=$_GET["pageid"];
                                $per_page = 10;
                                $start = ($page-1)*$per_page;
                                $show_pages=("SELECT * FROM `comment_news`");
                                $resu=mysqli_query($sql,$show_pages);
                                $coun = mysqli_num_rows($resu);

                                $comment_news=("SELECT news.subject as 'news_name',user.email as 'user_name',comment_news.* FROM `comment_news`,`news`,`user` WHERE comment_news.news_id=news.id and comment_news.user_id=user.id ORDER BY comment_news.id DESC LIMIT $start,$per_page");
                                $result=mysqli_query($sql,$comment_news);

                                if(mysqli_num_rows($result) > 0){
                                for($i=1;$row=mysqli_fetch_assoc($result);$i++){
                                echo'<form method="post" action="inc/dl-comment_news.php" id="frm"   onSubmit="return dl()">
                                      <tr>
                                      <td>'.$row["user_name"].'</td>
                                      <td>'.$row["news_name"].'</td>
                                      <td>'.$row["date"].'</td>
                                      <td>
                                      <input type="hidden" name="inputhidden" value="'.$row["id"].'">
                                      <input type="hidden" name="page_id_hidden" value="'.$page.'">
                                      <button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>';
                                      if($row["vaziat"]==0){
                                      echo'
                                      <a href="inc/confirm_n.php?id='.$row["id"].'&vaziat='.$row["vaziat"].'&page_id_hidden='.$page.'" style="margin-right:0" class="btn btn-danger btn-xs" name="change" ><i class="fa fa-lock" ></i></a>';
                                    }else if($row["vaziat"]==1){
                                        echo'
                                        <a href="inc/confirm_n.php?id='.$row["id"].'&vaziat='.$row["vaziat"].'&page_id_hidden='.$page.'" style="margin-right:0" class="btn btn-success btn-xs" name="change" ><i class="fa fa-unlock" ></i></a>';
                                      }
                                    echo'</td>
                                    </tr>
                                    </form>';
                                  }
                                }
                              ?>
                              </tbody>
                          </table>
                          <div style="align-items: center;direction: ltr;text-align: center;" class="general-pagination group">
                            <?php
                            $allpages = ceil($coun / $per_page);
                            for($i = 1 ; $i <= $allpages ; $i++){
                            echo '<a style="margin-right:2px;" href="show-comment-news.php?pageid='.$i.'"><span class="badge bg-warning">'.$i.'</span></a>';
                             }
                            ?>
                          </div>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->

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
