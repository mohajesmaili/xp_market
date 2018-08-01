<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>XP Market - جستجو مقاله</title>
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
     
    <!--  ==========  -->
    <!--  = Header =  -->
    <!--  ==========  -->
        <?php
        require ("inc/header.php");
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
                <section class="span8 blog">
                    
                     
                    <!--  ==========  -->
                    <!--  = Single Result =  -->
                    <!--  ==========  -->
                    <?php
                    require ("inc/connect.php");
                    $search=$_GET["search"];
                    if(empty($search)){
                        echo"<script>
                             alert('لطفا فیلد سرچ را پر کنید');
                             window.location.href='blog.php';
                             </script>";

                    }else {
                        $result_search = "SELECT * FROM `news` where subject like '%$search%' ORDER BY id DESC ";
                        $result = mysqli_query($sql, $result_search);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $idc=$row["id"];
                                $counter="SELECT count(id) as counter from `comment_news` where news_id='$idc'";
                                $re=mysqli_query($sql,$counter);
                                $r=mysqli_fetch_assoc($re);
                                echo '<article class="post format-standard">
                        <div class="post-inner">
                            <div class="post-title">
                            	<h2><a href="blog-single.php?newsid=' . $row["id"] . '"><span class="light">' . $row["subject"] . '</span></a></h2>
                            	<div class="metadata">
                            	    16 فروردین 1392 /
                            	    <a href="#">'.$r["counter"].' نظر </a> /
                            	    ارسال شده در : <a rel="category tag" title="View all posts in aciform" href="#">Webmarket</a>
                            	</div>
                            </div>
                            
                            <p class="push-down-0">
                            ' . substr($row["content"], 0, 500) . '
                            </p>
                        </div>
                    </article>';
                            }
                        }else{
                            echo"<script>
                             alert('مورد یافت نشد');
                             window.location.href='blog.php';
                             </script>";
                        }
                    }
                    ?>

                    <hr />
                    
                    <!--  ==========  -->
                    <!--  = Pagination =  -->
                    <!--  ==========  -->
                    <div class="pagination">
                        <ul>
                            <li><a href="#" class="btn btn-primary"><span class="icon-chevron-left"></span></a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
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
                    
                    <!--  ==========  -->
                    <!--  = Archive =  -->
                    <!--  ==========  -->
                    <div class="sidebar-item widget_archive">
                        <div class="underlined">
                            <h3><span class="light">آرشیو</span>نوشته های بلاگ</h3>
                        </div>
                        
                        <ul>
                            <li><a title="بهمن 92" href="http://localhost/themeforest/wp-theme/2013/02/">بهمن 92</a>&nbsp;(2)</li>
                            <li><a title="شهریور 92" href="http://localhost/themeforest/wp-theme/2008/09/">شهریور 92</a>&nbsp;(3)</li>
                            <li><a title="مرداد 92" href="http://localhost/themeforest/wp-theme/2008/06/">مرداد 92</a>&nbsp;(10)</li>
                            <li><a title="تیر 92" href="http://localhost/themeforest/wp-theme/2008/05/">تیر 92</a>&nbsp;(5)</li>
                            <li><a title="اردیبهشت 91" href="http://localhost/themeforest/wp-theme/2008/04/">اردیبهشت 91</a>&nbsp;(1)</li>
                            <li><a title="فروردین 91" href="http://localhost/themeforest/wp-theme/2008/03/">فروردین 91</a>&nbsp;(3)</li>
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
    <!--  = JavaScript =  -->
    <!--  ==========  -->
    
    <!--  = FB =  -->
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=126780447403102";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    
    <!--  = jQuery - CDN with local fallback =  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
    
    <!--  = Google Maps API =  -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/goMap/js/jquery.gomap-1.3.2.min.js"></script>
    
    <!--  = Custom JS =  -->
    <script src="js/custom.js" type="text/javascript"></script>

  </body>
</html>

    
    