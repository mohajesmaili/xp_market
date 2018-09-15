
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>XP Market- تماس با ما</title>
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


  <body class="boxed pattern-10">

    <div class="master-wrapper">

     <?php

    require("inc/header.php");

     ?>


    <div class="container">
        <div class="push-up top-equal blocks-spacer-last">
            <div class="row">

                <!--  ==========  -->
                <!--  = Main Title =  -->
                <!--  ==========  -->

                <div class="span12">
                    <div class="underlined push-down-20">
                        <h3 class="inline" style="margin-right:3px;">با ما ارتباط برقرار کنید.</h3>
                    </div>
                </div>

                <!--  ==========  -->
                <!--  = Main content =  -->
                <!--  ==========  -->
                <section class="span8 single single-page">


                    <!--  ==========  -->
                    <!--  = Contact Form =  -->
                    <!--  ==========  -->
                    <section class="contact-form-container">

                        <h3 class="push-down-25"><span class="light">ارسال</span> پیام</h3>

                        <form id="commentform" method="post"  action="inc/contact.php" class="form form-inline form-contact">
                            <p class="push-down-20">
                                <input type="text" aria-required="true" tabindex="1" size="30" value="" id="author" placeholder="نام و نام خانوادگی" name="name" required>
                            </p>
                            <p class="push-down-20">

                                <input type="email" aria-required="true" tabindex="2" size="30" value="" id="email" placeholder="ایمیل" name="email" required>
                            </p>

                            <p class="push-down-20">
                                <textarea class="input-block-level" tabindex="4" rows="7" cols="70" id="comment" name="comment" placeholder="پیامتان را در اینجا بنویسید ..." required></textarea>
                            </p>
                            <p>
                                <button class="btn btn-primary bold" type="submit" tabindex="5" id="submit" name="submit">ارسال پیام</button>
                            </p>
                        </form>
                    </section>

                    <hr />

                </section> <!-- /main content -->

                <!--  ==========  -->
                <!--  = Sidebar =  -->
                <!--  ==========  -->
                <aside class="span4">

                    <!--  ==========  -->
                    <!--  = Opening Times Widget =  -->
                    <!--  ==========  -->
                    <div class="sidebar-item opening-time" id="opening_time-4">
                        <div class="underlined">
                            <h3><span class="light">ساعات</span> کاری</h3>
                        </div>
                        <div class="time-table">
                            <dl class="week-day">
                                <dt>
                                    شنبه
                                </dt>
                                <dd>
                                    8:00 - 16:00
                                </dd>
                            </dl>
                            <dl class="week-day light-bg">
                                <dt>
                                    یکشنبه
                                </dt>
                                <dd>
                                    8:00 - 16:00
                                </dd>
                            </dl>
                            <dl class="week-day">
                                <dt>
                                    دوشنبه
                                </dt>
                                <dd>
                                    8:00 - 16:00
                                </dd>
                            </dl>
                            <dl class="week-day light-bg today">
                                <dt>
                                    سه شنبه
                                </dt>
                                <dd>
                                    10:00 - 15:00
                                </dd>
                            </dl>
                            <dl class="week-day">
                                <dt>
                                    چهارشنبه
                                </dt>
                                <dd>
                                    8:00 - 16:00
                                </dd>
                            </dl>
                            <dl class="week-day light-bg">
                                <dt>
                                    پنج شنبه
                                </dt>
                                <dd>
                                    8:00 - 16:00
                                </dd>
                            </dl>
                            <dl class="week-day closed">
                                <dt>
                                    جمعه
                                </dt>
                                <dd>
                                    تعطیل
                                </dd>
                            </dl>
                        </div>
                    </div>


                </aside> <!-- /sidebar -->

            </div>
        </div>
    </div> <!-- /container -->
    <?php
    require ("inc/footer.php");
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
