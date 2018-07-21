<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Webmarket HTML Template - Search Results</title>
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
                                echo '<article class="post format-standard">
                        <div class="post-inner">
                            <div class="post-title">
                            	<h2><a href="blog-single.php?newsid=' . $row["id"] . '"><span class="light">' . $row["subject"] . '</span></a></h2>
                            	<div class="metadata">
                            	    16 فروردین 1392 /
                            	    <a href="http://localhost/themeforest/wp-theme/2008/09/layout-test/#comments">بدون نظر</a> /
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
                    <!--  = Flickr Widget =  -->
                    <!--  ==========  -->
                    <div class="sidebar-item widget_flickr">
                        <div class="underlined">
                            <h3><span class="light">ابزارک</span> فلیکر</h3>
                        </div>
                        
                        <div class="flickr-badge clearfix">
                            <!-- Start of Flickr Badge -->
                            <div id="flickr_badge_uber_wrapper">
                                <div id="flickr_badge_wrapper">
                                    <script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&display=random&size=s&layout=x&source=all_tag&tag=surf&user=29003388%40N04"></script>
                                </div>
                            </div>
                            <!-- End of Flickr Badge -->
                        </div>
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
                    
                    
                    <!--  ==========  -->
                    <!--  = Twitter Widget =  -->
                    <!--  ==========  -->
                    <div class="sidebar-item widget_twitter">
                        <div class="underlined">
                            <h3><span class="light">فید</span> توییتر</h3>
                        </div>
                        
                        <a class="twitter-timeline"  href="https://twitter.com/primozدیوید"  data-widget-id="361435057526800385">Tweets by @primozدیوید</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                    </div>
                    
                    
                </aside> <!-- /sidebar --> 
                
            </div>
        </div>
    </div> <!-- /container -->
    
     
    
     
    <!--  ==========  -->
    <!--  = Footer =  -->
    <!--  ==========  -->
    <footer>
        
        <!--  ==========  -->
        <!--  = Upper footer =  -->
        <!--  ==========  -->
        <div class="foot-light">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <h2 class="pacifico">Webmarket &nbsp; <img src="images/webmarket.png" alt="Webmarket Cart" class="align-baseline" /></h2>
                        <p>این یک نوشته آزمایشی است. شما میتوانید این قسمت را با نوشته های دلخواه خود که مناسب این ناحیه باشند پر نمایید. ما این بخش را با نوشته هایی بی معنی پر کرده ایم.</p>
                    </div>
                    <div class="span4">
                        <div class="main-titles lined">
                            <h3 class="title">فیسبوک</h3>
                        </div>
                        <div class="bordered">
                            <div class="fill-iframe">
                                <div class="fb-like-box" data-href="https://www.facebook.com/ProteusNet" data-width="292" data-height="200" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">عضویت</span> در خبرنامه</h3>
                        </div>
                        <p>این بخشی از یک نوشتار آزمایشی صرفا برای پر کردن این ناحیه است.</p>
                        <!-- Begin MailChimp Signup Form -->
                        <div id="mc_embed_signup">
                        <form action="http://proteusthemes.us4.list-manage1.com/subscribe/post?u=ea0786485977f5ec8c9283d5c&amp;id=5dad3f35e9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form form-inline" target="_blank" novalidate>
                            <div class="mc-field-group">
                                <input type="email" value="" placeholder="آدرس ایمیلتان را وارد کنید" name="EMAIL" class="required email" id="mce-EMAIL">
                                <input type="submit" value="ارسال" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                            
                        </form>
                        </div>
                        <!--End mc_embed_signup-->
                    </div>
                </div>
            </div>
        </div> <!-- /upper footer -->
        
        <!--  ==========  -->
        <!--  = Middle footer =  -->
        <!--  ==========  -->
        <div class="foot-dark">
            <div class="container">
                <div class="row">
                    
                    <!--  ==========  -->
                    <!--  = Menu 1 =  -->
                    <!--  ==========  -->
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">ناوبری</span> اصلی</h3>
                        </div>
                        <ul class="nav bold">
                            <li><a href="#">خانه</a></li>
                            <li><a href="#">صفحات</a></li>
                            <li><a href="#">درباره ما</a></li>
                            <li><a href="#">کد های میانبر</a></li>
                            <li><a href="#">گالری</a></li>
                            <li><a href="#">تماس با ما</a></li>
                        </ul>
                    </div>
                    
                    <!--  ==========  -->
                    <!--  = Menu 2 =  -->
                    <!--  ==========  -->
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">دومین</span> ناوبری</h3>
                        </div>
                        <ul class="nav">
                            <li><a href="#">پیوند نوشتار آزمایشی</a></li>
                            <li><a href="#">نوشتار آزمایشی دیگر</a></li>
                            <li><a href="#">برند ها</a></li>
                            <li><a href="#">مشاهده آخرین توییت ها</a></li>
                            <li><a href="#">نوشتار آزمایشی دیگر</a></li>
                        </ul>
                    </div>
                    
                    <!--  ==========  -->
                    <!--  = Menu 3 =  -->
                    <!--  ==========  -->
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">سومین</span> ناوبری</h3>
                        </div>
                        <ul class="nav">
                            <li><a href="#">پیوند نوشتار آزمایشی</a></li>
                            <li><a href="#">نوشتار آزمایشی دیگر</a></li>
                            <li><a href="#">برند ها</a></li>
                            <li><a href="#">مشاهده آخرین توییت ها</a></li>
                            <li><a href="#">نوشتار آزمایشی دیگر</a></li>
                        </ul>
                    </div>
                    
                    <!--  ==========  -->
                    <!--  = Menu 4 =  -->
                    <!--  ==========  -->
                    <div class="span3">
                        <div class="main-titles lined">
                            <h3 class="title"><span class="light">چهارمین</span> ناوبری</h3>
                        </div>
                        <ul class="nav">
                            <li><a href="#">پیوند نوشتار آزمایشی</a></li>
                            <li><a href="#">نوشتار آزمایشی دیگر</a></li>
                            <li><a href="#">برند ها</a></li>
                            <li><a href="#">مشاهده آخرین توییت ها</a></li>
                            <li><a href="#">نوشتار آزمایشی دیگر</a></li>
                        </ul>
                    </div>
                </div>
            </div>
			
			<div class="cpContainter">
			<div class="mcopyright">
			  <div class="inside">فارسی سازی و ویرایش توسط <a href="http://mrcode.ir" target="_blank" title="مِستِر کُد">MrCode.ir</a></div>
			</div>
			</div>
			
        </div> <!-- /middle footer -->
        
        <!--  ==========  -->
        <!--  = Bottom Footer =  -->
        <!--  ==========  -->
        <div class="foot-last">
            <a href="#" id="toTheTop">
                <span class="icon-chevron-up"></span>
            </a>
            <div class="container">
                <div class="row">
                    <div class="span6">
                        &copy; Copyright 2013. Images of products by <a target="_blank" href="http://www.horsefeathers.eu/">horsefeathers</a>.
                    </div>
                    <div class="span6">
                        <div class="pull-right">قالب HTML وبمارکت توسط<a href="http://www.proteusthemes.com">ProteusThemes</a></div>
                    </div>
                </div>
            </div>
        </div> <!-- /bottom footer -->
    </footer> <!-- /footer -->
    
    
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

    
    