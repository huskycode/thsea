<?php
/* @var $this Controller */
$navItems = array(
    array('label' => 'Home', 'url' => array('/site/index')),
    array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
    array('label' => 'Leave a Feedback', 'url' => 'https://docs.google.com/forms/d/1glvVFQV0vVMCKB5UflOkmx_NFaUbCC5WANtqPXHtsLM/viewform', 'linkOptions' => array('target' => '_blank'))
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
        <meta name="keywords" content="Software Engineering, Agile, Video Tutorial, Project Management">
        <meta name="description" content="Thailand Software Engineering Academy">
        <!-- SOCIAL META START -->
        <?php if (isset($this->metaSocialName)) { ?>
            <meta property="og:site_name" content="SEAcademy.in.th" />
            <meta itemprop="name" content="<?php echo $this->metaSocialName ?>">
            <meta itemprop="description" content="<?php echo $this->metaSocialDetail; ?>">
            <meta property="og:image" content="<?php echo $this->metaSocialImage; ?>" />
            <meta property="og:title" content="<?php echo $this->metaSocialName ?>" />
            <meta property="og:description" content="<?php echo $this->metaSocialDetail; ?>" />
            <meta property="og:type" content="article" />
            <meta property="og:url" content="<?php echo $this->currentUrl; ?>"/>
        <?php } ?>
        <!-- SOCIAL META END -->
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/skeleton.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sass.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
        <style type="text/css">
            .video-panel{
                background-color: #ebebeb; 
                height: 40px; 
                line-height: 30px; 
                vertical-align: middle;
                padding-top: 10px;
                padding-left: 5px;
                padding-right: 10px;
                width:100%;
            }
            .clear{
                clear: both;
            }
        </style>
    </head>
    <body>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <!--script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js" async></script-->
        <!-- Primary Page Layout -->
        <!-- START MENU WRAPPER -->
        <div id="menu-wrapper">
            <div class="container">
                <div class="four columns">
                    <div id="logo">
                        <a href="/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Thailand Software Engineering Academy" ></a>
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
                    </div>
                </div><!-- .twelve columns -->
            </div><!-- .container -->
        </div><!-- #slider-wraper -->
        <!-- end #menu  -->	
        <div style="float:right; padding-right: 10px">
            <?php if (!Yii::app()->user->isGuest) { ?>
                <a href="<?php echo Yii::app()->createUrl("site/logout"); ?>">Logout (<?php echo Yii::app()->user->name; ?>)</a>
            <?php } ?>
        </div>
        <!-- END MENU WRAPPER -->
        <?php echo $content; ?>
        <!-- -============== END CONTENT WRAPPER =================- -->
        <!-- START FOOTER -->
        <div id="footer">
            <div class="btop-1px"></div>
            <div class="container">
                <div class="four columns copyright">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-footer.png" alt="" />
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

            <!-- JS -->


            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.mobile.customized.min.js" async></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/textext.min.js" type="text/javascript" charset="utf-8" async></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/json2.js" type="text/javascript" charset="utf-8" async></script>

            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.easing.1.3.js" async></script>	
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/superfish.js" async></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcarousel.min.js" async></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/mediaelement-and-player.min.js" async></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/scrolltopcontrol.js" async></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox-min.js" async></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.isotope.min.js" async></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js" async></script>
            <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/application.js" async></script>	
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

                ga('create', 'UA-43492371-1', 'seacademy.in.th');
                ga('send', 'pageview');

            </script>
            <!-- End Document
            ================================================== -->
    </body>
</html>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css" />
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
<!--link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" /-->
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />