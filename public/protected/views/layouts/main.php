<?php
/* @var $this Controller */
$navItems = array(
    array('label' => 'Home', 'url' => array('/site/index')),
    array('label' => 'Video', 'url' => array('/site/page', 'view' => 'video')),
    array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
    array('label' => 'Contributor', 'url' => array('/site/page', 'view' => 'contributor'))
);
?>
﻿<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="author" content="Agile66">
        <meta name="keywords" content="Software Enginereer, Agile, Video Tutorial, Project Management">
        <meta name="description" content="Thailand Software Engineering Academy">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS -->
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/skeleton.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/camera.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/mediaelementplayer.min.css" />
        <link href='http://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet' type='text/css'>	

        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo Yii::app()->request->baseUrl; ?>/images/apple-touch-icon-114x114.png">

        <!-- JS -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js"></script>	
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/superfish.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/camera.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mobile.customized.min.js"></script>	
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcarousel.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mediaelement-and-player.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/scrolltopcontrol.js"></script>
    </head>
    <body>
        <!-- Primary Page Layout -->
        <!-- START MENU WRAPPER -->
        <div id="menu-wrapper">
            <div class="container">
                <div class="four columns">
                    <div id="logo">
                        <a href="index.php"><img src="images/logo.png" alt="Thailand Software Engineering Academy" ></a>
                    </div><!-- .logo -->
                </div><!-- four columns -->
                <div class="twelve columns navigation">
                    <div id="menu" class="fix-fish-menu">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'id' => 'nav',
                            'htmlOptions' => array('class' => 'sf-menu'),
                            'items' => $navItems,
                        ));
                        ?>
                    </div>	<!-- end #menu  -->	
                </div><!-- .twelve columns -->
            </div><!-- .container -->
        </div><!-- #slider-wraper -->
        <!-- END MENU WRAPPER -->
<?php echo $content; ?>
        <!-- -============== END CONTENT WRAPPER =================- -->
        <!-- START FOOTER -->
        <div id="footer">
            <div class="btop-1px"></div>
            <div class="container">
                <div class="four columns copyright">
                    <img src="images/logo-footer.png" alt="" />
                    <p class="last">@2013 All Rights Reserved.</p>
                </div><!-- .copyright -->
                <div class="twelve columns">
                    <div id="secondary-nav" class="clearfix">
                        <?php
                        $this->widget('zii.widgets.CMenu', array(
                            'htmlOptions' => array('class' => 'clearfix'),
                            'items' => $navItems,
                        ));
                        ?>
                        <div class="gray-dash-3px"></div>
                    </div><!-- #secondary-nav -->
                </div><!-- container -->
            </div><!-- #footer -->
            <!-- END FOOTER -->
            <script type="text/javascript" src="js/contact.js"></script>

            <script type="text/javascript" src="js/custom.js"></script>	

            <script type="text/javascript">
                /***************************************************
                 Camera Slider
                 ***************************************************/
                jQuery.noConflict()(function($) {
                    $('#camera_wrap_1').camera({
                        thumbnails: false,
                        pagination: false,
                        loader: 'bar',
                        loaderPadding: 0,
                        loaderStroke: 3,
                        pagination: true,
                                loaderColor: '#7d7d7d'
                    });
                });
            </script>

            <script>
                jQuery.noConflict()(function($) {
                    // create player
                    $('#player2').mediaelementplayer({
                        // add desired features in order
                        // I've put the loop function second,
                        features: ['playpause', 'loop', 'current', 'progress', 'duration']
                    });
                });
            </script>
            <script>
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-42629467-1', 'nfshost.com');
                ga('send', 'pageview');

            </script>
            <!-- End Document
            ================================================== -->
    </body>
</html>