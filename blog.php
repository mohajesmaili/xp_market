
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>XP Market - اخبار</title>
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
                        <h1 class="inline"><span class="light">وبلاگ</span> XP _ Market</h1>
                    </div>
                </div>

                <!--  ==========  -->
                <!--  = Main content =  -->
                <!--  ==========  -->
                <section class="span8 blog">

                    <!--  ==========  -->
                    <!--  = Sticky Post =  -->
                    <!--  ==========  -->
                    <?php
                    require("inc/connect.php");

                    $page=$_GET["pageid"];
                    $per_page = 5;
                    $start = ($page-1)*$per_page;
                    $show_pages=("SELECT * FROM `news`");
                    $resu=mysqli_query($sql,$show_pages);
                    $coun = mysqli_num_rows($resu);

                    $news="SELECT * FROM `news` ORDER BY id DESC limit $start,$per_page";
                    $result=mysqli_query($sql,$news);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            $idc=$row["id"];
                            $counter="SELECT count(id) as counter from `comment_news` where news_id='$idc' and comment_news.vaziat=1";
                            $re=mysqli_query($sql,$counter);
                            $r=mysqli_fetch_assoc($re);
                    echo'<article class="post format-standard sticky">
                        <div class="post-inner">
                            <div class="post-title">
                            	<h2><a href="blog-single.php?newsid='.$row["id"].'">'.$row["subject"].'</a></h2>
                            	<div class="metadata">
                            	    '.$row["date"].'/
                            	    <a href="#">'.$r["counter"].' نظر </a>
                            	</div>
                            </div>

                            <p class="push-down-25">'.substr($row["content"],0,299).' ......</p>

                            <a href="blog-single.php?newsid='.$row["id"].'" class="btn btn-primary bold higher">ادامه مطلب</a>
                        </div>
                    </article>';
                             }
                         }
                    ?>

                    <!--  ==========  -->
                    <!--  = Pagination =  -->
                    <!--  ==========  -->
                    <div class="pagination" style="text-align: center;">
                        <ul>
                            <li><a href="#" class="btn btn-primary"><span class="icon-chevron-left"></span></a></li>
                            <?php
                            $allpages = ceil($coun / $per_page);
                            for($i = 1 ; $i <= $allpages ; $i++) {
                                if($page==$i) {
                                    echo '<li class="active"><a href = "blog.php?pageid=' . $i . '" > ' . $i . '</a ></li>';
                                }else{
                                    echo '<li><a href = "blog.php?pageid=' . $i . '" > ' . $i . '</a ></li>';
                                }
                            }

                            ?>
                            <li><a href="#" class="btn btn-primary"><span class="icon-chevron-right"></span></a></li>
                        </ul>
                    </div> <!-- /pagination -->

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


    <!--  = jQuery - CDN with local fallback =  -->
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
