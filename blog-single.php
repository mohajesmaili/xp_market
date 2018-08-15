
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>XP Market - مقاله</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">

    <!--  Google Fonts  -->
    <link href='http://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,700,400italic,700italic&amp;subset=latin,latin-ext,greek' rel='stylesheet' type='text/css'>

    <!-- Twitter Bootstrap -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/responsive.css" rel="stylesheet">
    <!-- Slider Revolution -->
    <link rel="stylesheet" href="js/rs-plugin/css/settings.css" type="text/css"/>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css" type="text/css"/>
    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="js/prettyphoto/css/prettyPhoto.css" type="text/css"/>
    <!-- main styles -->

    <link href="stylesheets/main.css" rel="stylesheet">



    <!-- Modernizr -->
    <script src="js/modernizr.custom.56918.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch/144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch/114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch/72.png">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch/57.png">
    <link rel="shortcut icon" href="images/apple-touch/57.png">
  </head>


  <body class="">

    <div class="master-wrapper">

   <?php

   require("inc/header.php");

   ?>

    <div class="container">
        <div class="push-up top-equal blocks-spacer">
            <div class="row">

                <!--  ==========  -->
                <!--  = Main Title =  -->
                <!--  ==========  -->

                <div class="span12">
                    <div class="title-area">
                        <h1 class="inline"><span class="light">بلاگ</span> وبمارکت</h1>
                        <h2 class="inline tagline">- جایی که آدمهای باهوش، حرفهای احمقانه میزنند!</h2>
                    </div>
                </div>

                <!--  ==========  -->
                <!--  = Main content =  -->
                <!--  ==========  -->
                <section class="span8 single single-post">

                    <!--  ==========  -->
                    <!--  = Post =  -->
                    <!--  ==========  -->
                    <?php
                    require("inc/connect.php");
                    $id=$_GET["newsid"];
                    $news="SELECT * FROM `news` WHERE id='$id'";
                    $result=mysqli_query($sql,$news);
                    if(mysqli_num_rows($result)) {
                        $row = mysqli_fetch_assoc($result);

                        $idc=$row["id"];
                        $counter="SELECT count(id) as counter from `comment_news` where news_id='$idc'";
                        $re=mysqli_query($sql,$counter);
                        $r=mysqli_fetch_assoc($re);
                        echo '<article class="post format-video">
                        <div class="post-inner">
                            <div class="post-title">
                            	<h2>' . $row["subject"] . '</h2>
                            	<div class="metadata">
                            	    ' . $row["date"] . ' /
                            	    <a href="#">'.$r["counter"].' نظر </a> /
                            	    Posted in: <a title="View all posts in aciform" href="#">Webmarket</a>
                            	</div>
                            </div>

                            <p>
                               ' . $row["content"] . '
                            </p>

                        </div>
                    </article>';
                    }
                    ?>
                    <hr />

                    <!--  ==========  -->
                    <!--  = Comments =  -->
                    <!--  ==========  -->

                    <section id="comments" class="comments-container">
                        <?php
                        $counter="SELECT count(id) as counter from comment_news where news_id='$id'";
                        $res=mysqli_query($sql,$counter);
                        $row=mysqli_fetch_assoc($res);
                        echo '<h3 class="push-down-25"><span class="light">'.$row["counter"].'</span> نظر</h3>';
                        ?>
                        <!--  ==========  -->
                        <!--  = Single Comment =  -->
                        <!--  ==========  -->
                        <?php
                        $sel_comment=("SELECT * FROM `user`,`comment_news` where user.id=comment_news.user_id and comment_news.news_id='$id' ORDER BY comment_news.id DESC ");
                        $result3=mysqli_query($sql,$sel_comment);

                        if(mysqli_num_rows($result3) >0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                echo '<div class="single-comment clearfix">
                                    <div class="avatar-container">
                                        <img src="images/dummy/avatars/avatar-1.jpg" alt="avatar" class="avatar" width="184" height="184" />
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-inner">
                                            <cite class="author-name">
                                                <span class="light">'.$row3["username"].'</span>
                                            </cite>
                                            <div class="metadata">
                                                '.$row3["date"].' در '.$row3["time"].'   /  <a href="#">پاسخ</a>
                                            </div>
                                            <div class="comment-text">
                                            <p>'.$row3["comment"].'</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>';
                            }
                        }
                        ?>

                        <hr />

                        <h3 class="push-down-25"><span class="light">نظر</span> بدهید</h3>
                        <?php
                        if($_SESSION["user"]==true) {
                            echo '<form id="commentform" method="POST" action="inc/send_commentn.php?userid='.$_SESSION["user_id"].'&newsid='.$id.'" class="form form-inline form-comments">
                                    <p class="push-down-20">
                                        <textarea class="input-block-level" tabindex="4" rows="7" cols="70" id="comment" name="comment" placeholder="نظرتان را در اینجا بنویسید ..." required></textarea>
                                    </p>
                                    <p>
                                      <label class="col-sm-2 col-sm-2 control-label">کد امنیتی:</label><br/>';

                                          $sa_captchaDIR="admin/assets/sc/sa-captcha";
                                          require("admin/assets/sc/sa-captcha/captcha.php");

                                       echo'<br/>
                                            <input id="captcha" name="captcha" style="margin-top:10px;width:169px" class="form-control round-form" type="text" placeholder="کد امنیتی"">
                                     </p>
                                    <p>
                                        <button class="btn btn-primary bold" type="submit" tabindex="5" id="submit" name="submit">ارسال نظر</button>
                                    </p>
                                </form>';
                        }else{
                            echo' <button class="btn btn-primary bold" tabindex="5">ابتدا باید ثبت نام کنید یا وارد شوید</button>';
                        }
                        ?>
                    </section>

                </section> <!-- /main content -->

                <!--  ==========  -->
                <!--  = Sidebar =  -->
                <!--  ==========  -->
                <aside class="span4 right-sidebar">

                    <!--  ==========  -->
                    <!--  = Search Widget =  -->
                    <!--  ==========  -->
                    <div class="sidebar-item widget_search">
                        <!-- <div class="underlined">
                            <h3><span class="light">Search</span></h3>
                        </div> -->

                        <form class="form" action="blog-search.php" id="searchform" method="get" role="search">
                            <input type="text" id="appendedInputButton" class="input-block-level" name="search" placeholder="جستجو در نوشته ها ...">
                            <button type="submit">
                                <i class="icon-search"></i>
                            </button>
                        </form>
                    </div>


                    <!--  ==========  -->
                    <!--  = Archive =  -->
                    <!--  ==========  -->
                    <div class="sidebar-item widget_archive">
                        <div class="underlined">
                            <h3><span class="light">آرشیو</span>نوشته های بلاگ</h3>
                        </div>

                        <ul>
                            <li><a title="February 2013" href="http://localhost/themeforest/wp-theme/2013/02/">بهمن 92</a>&nbsp;(2)</li>
                            <li><a title="September 2008" href="http://localhost/themeforest/wp-theme/2008/09/">مهر 92</a>&nbsp;(3)</li>
                            <li><a title="June 2008" href="http://localhost/themeforest/wp-theme/2008/06/">مرداد 92</a>&nbsp;(10)</li>
                            <li><a title="May 2008" href="http://localhost/themeforest/wp-theme/2008/05/">تیر 92</a>&nbsp;(5)</li>
                            <li><a title="April 2008" href="http://localhost/themeforest/wp-theme/2008/04/">اردیهبشت 91</a>&nbsp;(1)</li>
                            <li><a title="March 2008" href="http://localhost/themeforest/wp-theme/2008/03/">فروردین 91</a>&nbsp;(3)</li>
                        </ul>
                    </div>

                </aside> <!-- /sidebar -->

            </div>
        </div>
    </div> <!-- /container -->


    <?php
    require("inc/footer.php");
    ?>

    <!--  ==========  -->
    <!--  = Modal Windows =  -->
    <!--  ==========  -->

    </div> <!-- end of master-wrapper -->



    <!--  ==========  -->
    <!--  = JavaScript =  -->
    <!--  ==========  -->

    <!--  = FB =  -->

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write('<script src="js/jquery.min.js"><\/script>');
    }
    </script>

    <!--  = _ =  -->
    <script src="js/underscore/underscore-min.js" type="text/javascript"></script>

    <!--  = Bootstrap =  -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <!--  = Slider Revolution =  -->
    <script src="js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

    <!--  = CarouFredSel =  -->
    <script src="js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>

    <!--  = jQuery UI =  -->
    <script src="js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.10.3/touch-fix.min.js" type="text/javascript"></script>

    <!--  = Isotope =  -->
    <script src="js/isotope/jquery.isotope.min.js" type="text/javascript"></script>

    <!--  = Tour =  -->
    <script src="js/bootstrap-tour/build/js/bootstrap-tour.min.js" type="text/javascript"></script>

    <!--  = PrettyPhoto =  -->
    <script src="js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <!--  = Custom JS =  -->
    <script src="js/custom.js" type="text/javascript"></script>

  </body>
</html>
