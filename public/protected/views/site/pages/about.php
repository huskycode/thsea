<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name . ' - About';
$this->breadcrumbs = array(
    'About',
);
?>
<?php if ($this->beginCache('com.seacademy.about', array('duration' => 30))) { ?>
    <div id="separator"></div>

    <!-- START PAGE WRAPPER -->
    <div class="container main-wrapper">
        <div id="main-content" >
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/about/delivery_software.jpg" alt="" class="border alignright" title="Align Right" width="200" />
            <p>Software Engineering หรือ วิศวกรรมซอฟต์แวร์ คือการศึกษาที่เกี่ยวกับปัญหาและแนวทางการแก้ไขปัญหาต่างๆ ที่เกิดขึ้นกับการพัฒนาระบบเทคโนโลยีสารสนเทศ โดยเฉพาะซอฟต์แวร์ในองค์กร ที่ผ่านมารายงานด้านปัญหาต่างๆที่เกิดขึ้นโดยการศึกษาในต่างประเทศพบว่าโอกาสที่โครงการพัฒนาซอฟต์แวร์จะประสบความสำเร็จนั้นมีเพียงประมาณ 20-30% เท่านั้น ซึ่งอัตราส่วนความสำเร็จดังกล่าวแทบจะไม่ได้รับการแก้ไขได้เลยในระยะเวลา 4-5 ปีที่ผ่านมาของการทำวิจัย ไม่ว่าเราจะมีความก้าวหน้าด้านเทคโนโลยีไปมากแค่ไหนก็ตาม</p>
            <p>จากปัญหาดังกล่าวได้มีกลุ่มผู้ประกอบการ กลุ่มผู้เชี่ยวชาญที่อยู่ในทั้งบริษัทเอกชน และในมหาวิทยาลัยหลายๆแห่งทั่วโลก ได้พยายามแก้ไขปัญหา โดยการเสนอแนวทางและเครื่องมือต่างๆ สิ่งที่น่าสนใจคือไม่ว่าจะมีผลงานวิจัยถูกเสนอมากแค่ไหน ก็ไม่สามารถที่จะแก้ไขปัญหาให้ลดลงอย่างที่เราเห็นในสถิติที่ผ่านมา</p>
            <div class="divider-page-small-1px"></div>	

            <!-- QUOTE -->
            <div class="row">
                <div class="four columns alpha">
                    <blockquote>การศึกษาในต่างประเทศพบว่าโอกาสที่โครงการพัฒนาซอฟต์แวร์จะประสบความสำเร็จนั้น มีเพียงประมาณ 20-30% เท่านั้น</blockquote>
                </div>
                <div class="eight columns omega">
                    <p>Thailand Software Engineering Group เป็นการรวมตัวกันของบริษัทและบุคคลที่ทำงานจริงในการพัฒนาระบบต่างๆของประเทศไทย เพื่อที่จะเป็นแหล่งรวบรวมบุคลากรที่ทำงานทางการพัฒนาซอฟต์แวร์ และวิจัยด้านนี้ของประเทศ การรวมตัวนี้ก็เพื่อการแลกเปลี่ยนข้อมูลประสบการณ์ ความรู้และผลงานวิจัยต่างๆ ที่ถูกคิดค้นขึ้นมาเพื่อประโยชน์ต่อการพัฒนาระบบสารสนเทศภายในประเทศ โดยเฉพาะอย่างยิ่งเพื่อเป็นแหล่งฝึกอบรมด้านต่างๆ โดยคณาจารย์ที่เกิดจากการรวมตัวกันของผู้ที่ทำงานอยู่จริงจากองค์กรต่างๆ ทั้งในและนอกประเทศ อาทิเช่น Software Park บริษัท Microsoft บริษัท IBM บริษัท Agoda บริษัท Nokia ประเทศไทย บริษัท Thomson Reuters บริษัท TRUE บริษัท AIIT และบริษัท PKT รวมไปถึงกลุ่มผู้สนใจจาก community ต่างๆ เช่น Agile66 และ WeLoveBug เป็นต้น</p>
                </div>
            </div>
            <!-- QUOTE -->
            <div class="divider-page-small-1px"></div>			

        </div><!-- main-content -->

        <div id="main-content">
            <h4>Contributor</h4>
            <p>ทีมงานผู้จัดทำเว็บไซต์ Thailand Software Engineering Academy เป็นกลุ่มคนที่สนใจจะสร้างเว็บไซต์นี้ขึ้นมาด้วยการนำ Scrum มาใช้ในการทำงานร่วมกันและสามารถส่งมอบงานได้อย่างต่อเนื่อง ผ่านเครื่องมือออนไลน์อย่างเช่น <a href="http://www.google.com/+/learnmore/hangouts/">Google Hangout</a>, <a href="https://github.com/huskycode/thsea">Github</a>, <a href="http://theeidos.com/project/THSEA/home">Eidos</a> และ <a href="http://mural.ly">Mural.ly</a> โดยกำหนดช่วงเวลาของ Sprint เป็น 1-2 สัปดาห์ตามขนาดของงาน ซึ่งทุกคนในทีมจะมีส่วนร่วมกันในช่วยกันประเมินขนาดงานแบบ Planning poker ในกิจกรรม Sprint planning ตอนช่วงเริ่มต้น Sprint หลังจากกำหนดขอบเขตของ Sprint ได้ แต่ละคนในทีมจะเลือกงานจาก Backlog ไปทำด้วยตนเอง และสื่อสารกันระหว่าง Sprint ผ่านกิจกรรมที่ทีมเรียกกันว่า Weekly meeting และ Team sync-up เพื่อช่วยกันแก้ปัญหาและประสานงานกันในทีมได้อย่างต่อเนื่อง ซึ่งจะทำให้การส่งมอบเว็บไซด์ในช่วง Sprint review ตรงตามวัตถุประสงค์ของ Sprint นั้น ก่อนที่จะจบ Sprint ด้วยการทำ Sprint retrospective เพื่อมองย้อนกลับไปดูการดำเนินงานที่ผ่านมาใน Sprint และนำไปปรับปรุงรูปแบบการทำงานทั้งของทีมและแต่ละคน</p>
            <p>สำหรับผู้ที่สนใจเข้าร่วมทีม สามารถเข้าร่วมกลุ่ม <a href="https://www.facebook.com/groups/thseacademy/">Facebook</a> เพื่อติดตามความเคลื่อนไหว และเข้าร่วมกิจกรรมได้ตามนัดหมายที่ประกาศ ซึ่งจะมีทุกวันพุธและเสาร์ ในเวลา 10.00 - 11.00 pm</p>
            <p>ปล. ทีมต้องการสมาชิกในด้าน UX Designer เพื่อช่วยปรับปรุงให้เว็ปไซด์น่าใช้ขึ้น</p>

            <!-- IMAGES -->
            <div id="container-portfolio" class="portfolio-4">
                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a>วโรกาส ภาณุสุวรรณ (นนท์)</a>
                            <a>Varokas Panusuwan</a>
                            <a>Product Owner</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/non.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/non.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>
                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a>อดิสรณ์ โชคอำนวย (อาร์ม)</a>
                            <a>Adisorn Chockaumnuai (Arm)</a>
                            <a>Scrum Master</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/arm.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/arm.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>
                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a>กรัณย์ ศิวารัตน์ (บอมบ์)</a>
                            <a>Karan Sivarat (Bomb)</a>
                            <a>Scrum Master</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/bomb.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/bomb.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>

                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">นิติศักดิ์  มูลตรีศรี (มุ้ย)</a>
                            <a class="description">Nitisak Mooltreesri (Mui)</a>
                            <a class="description">Scrum Master</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/mui.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/mui.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>

                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">ธนวัฒน์ ทัศนา (แอมป์)</a>
                            <a class="description">Tanawat Tassana (Amp)</a>
                            <a class="description">Scrum Master</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/amp.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/amp.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>

                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">สินาภรณ์ สืบวิสัย (แป๋ม)</a>
                            <a class="description">Sinaporn Suebvisai (Pam)</a>
                            <a class="description">Scrum Master</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/pam.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/pam.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>

                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">นพกฤษฏิ์ ธนสินรุจิพงษ์ (ตุลย์)</a>
                            <a class="description" style="nowrap">Noppakrit Thanasinrujiphong (Tul)</a>
                            <a class="description">Scrum Master</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/tul.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/tul.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>



                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">พิษณุ สว่างแผ้ว(รุ่ง)</a>
                            <a class="description">Pitsanu Swangpheaw (Roong)</a>
                            <a class="description">Technical Consultant</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/roong.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/roong.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>



                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">นราธิป หริจิระติวงศ์(ก้อง)</a>
                            <a class="description">Narathip Harijiratiwong (Kong)</a>
                            <a class="description">Developer</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/kong.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/kong.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>
                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">วรัญช์ เจริญสุข (ออฟ)</a>
                            <a class="description">Warun Chareonsuk (Off)</a>
                            <a class="description">Developer</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/off.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/off.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>
                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">เจนจิรา วงศ์บุญสิน (ปลา)</a>
                            <a class="description">Jenjira Wongboonsin (Pla)</a>
                            <a class="description">Developer</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/pla.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/pla.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>
                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">สุนัย สุขเอนก (นุก)</a>
                            <a class="description">Sunai Sukanake (Nook)</a>
                            <a class="description">Developer</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/nook.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/nook.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>

                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">ธีระพล ม่วงยัง (รักษ์)</a>
                            <a class="description">Teerapon Muangyoung (Rux)</a>
                            <a class="description">Developer</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/rux.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/rux.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>

                <div class="item-block four columns photography">
                    <div class="stack">
                        <div class="title">
                            <a class="description">อิทธิพล ตีระพฤติกุลชัย (เบย์)</a>
                            <a class="description">Ittipon Teerapruettikulchai (Bay)</a>
                            <a class="description">Developer</a>
                        </div>
                    </div><!-- stack -->
                    <div class="block">
                        <div class="mask-img"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/bay.jpg" alt="" class="border " /></div>
                        <div class="mask"><a href="<?php echo Yii::app()->request->baseUrl; ?>/images/contributor/bay.jpg" data-rel="zoom-img" class="zoom-icon"></a></div>
                    </div><!-- block -->
                </div>

            </div>
            <!-- IMAGES -->
        </div><!-- main-content -->
    </div><!-- .container -->

    <!-- END BLOG WRAPPER -->

    <script>
        /***************************************************
         ISOTOP - PORTFOLIO
         ***************************************************/
        jQuery.noConflict()(function($) {
            // cache container
            var $container = $('#container-portfolio');
            // initialize isotope
            $container.isotope({
                itemSelector: '.item-block',
                layoutMode: 'fitRows'
            });
        });
    </script>
    <?php
    $this->endCache();
}