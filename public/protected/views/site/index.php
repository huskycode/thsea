<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Index';
$this->breadcrumbs = array(
    'Index',
);
?>
<!-- START SLIDER WRAPPER -->
<div id="slider-wrapper">
    <div class="btop-1px"></div>
    <div class="container">
        <div class="sixteen columns" id="cta-block">
            <h5>แหล่งรวบรวม Video ที่เกี่ยวข้องกับด้านการพัฒนาซอฟต์แวร์ในประเทศไทย</h5>
        </div><!-- #cta-block -->

        <!-- start slider -->
        <div class="sixteen columns camera_wrap camera_burgundy_skin clearfix" id="camera_wrap_1">
        <?php foreach ($list as $row): ?>
		
			<div data-src="<?php
                        $this->widget('application.components.YoutubeViewer', array(
                            'url' => $row->url,
                            'width' => 940,
                            'height' => 400,
                            'display' => 'source_image',
                            'alt' => $row->title
                        ));
                        ?>"></div>
        <?php endforeach; ?>						
		<!--
		<a href="./video" target="_blank"></a>
		
			<div data-src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliders/camera/slide03.jpg"></div>			
            <div data-src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliders/camera/slide00.jpg"></div>
            <div data-src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliders/camera/slide01.jpg">
                <div class="camera_caption fadeFromBottom">
                    Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
                </div>
            </div>
            <div data-src="<?php echo Yii::app()->request->baseUrl; ?>/images/sliders/camera/slide02.jpg">
                <div class="camera_caption fadeFromBottom">
                    It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
                </div>
            </div>
		-->
		</div><!-- #camera_wrap_1 -->
        <!-- end slider -->

    </div><!-- .container -->
    <div class="bbottom-1px"></div>
</div><!-- #slider-wraper -->
<!-- END SLIDER WRAPPER -->	


<!-- CLIENTS -->
<div class="container header-block">
    <!-- start header -->
    <div class="sixteen columns lp-header">
        <h6>Our Clients</h6>
        <div class="nav-projects">
        </div><!-- .nav-projects -->
    </div><!-- .sixteen  -->
    <!-- end header -->
</div><!-- .container -->

<div id="clients" class="container">
    <ul id="clients-carousel" class="jcarousel-skin-tango" >
        <!-- start carousel -->
        <li><div class="four columns">
                <div class="block">
                    <a href="http://www.agile66.com/" target="_blank" alt="Agile66"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/clients/Agile66.jpg" alt="" /></a>
                </div><!-- block -->  
            </div><!-- .four  --></li>
        <!--<li><div class="four columns">
                <div class="block">
                    <a href="http://www.welovebug.com/" target="_blank" alt="We love Bug"><img src="images/clients/WeLoveBug.PNG" alt="" /></a>
                </div>   
            </div></li>

        <li><div class="four columns">
                <div class="block">
                    <a href="http://www.swpark.or.th/" target="_blank" alt="Software Park Thailand"><img src="images/clients/SoftwarePark.jpg" alt="" /></a>
                </div>  
            </div></li>-->

    </ul><!-- #clients-carousel -->
</div><!-- .container -->
<!-- END CLIENTS -->
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