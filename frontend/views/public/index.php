<?php
    use yii\helpers\Html;
?>
<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title><?= $basics['title'];?></title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSS Global Compulsory-->
    <?= Html::cssFile('@path_root/plugins/bootstrap/css/bootstrap.min.css')?>
    <?= Html::cssFile('@path_root/css/style.css')?>
    <?= Html::cssFile('@path_root/css/headers/header1.css')?>
    <?= Html::cssFile('@path_root/plugins/bootstrap/css/bootstrap-responsive.min.css')?>
    <?= Html::cssFile('@path_root/css/style_responsive.css')?>
    <?= Html::cssFile('@path_root/favicon.ico',['rel'=>'shortcut icon'])?>
    <!-- CSS Implementing Plugins -->
    <?= Html::cssFile('@path_root/plugins/font-awesome/css/font-awesome.css')?>
    <?= Html::cssFile('@path_root/plugins/flexslider/flexslider.css')?>
   <?= Html::cssFile('@path_root/plugins/parallax-slider/css/parallax-slider.css')?>
    <!-- CSS Theme -->
    <?= Html::cssFile('@path_root/css/themes/default.css')?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!--=== Style Switcher ===-->
<!--<i class="style-switcher-btn icon-cogs"></i>-->
<!--<div class="style-switcher">-->
<!--    <div class="theme-close"><i class="icon-remove"></i></div>-->
<!--    <div class="theme-heading">Theme Colors</div>-->
<!--    <ul class="unstyled">-->
<!--        <li class="theme-default theme-active" data-style="default" data-header="light"></li>-->
<!--        <li class="theme-blue" data-style="blue" data-header="light"></li>-->
<!--        <li class="theme-orange" data-style="orange" data-header="light"></li>-->
<!--        <li class="theme-red" data-style="red" data-header="light"></li>-->
<!--        <li class="theme-light" data-style="light" data-header="light"></li>-->
<!--    </ul>-->
<!--</div><!--/style-switcher-->
<!--<!--=== End Style Switcher ===-->


<div class="slider-inner">
    <div id="da-slider" class="da-slider">
        <div class="da-slide">
            <h2><i>CLEAN &amp; FRESH</i> <br /> <i>FULLY RESPONSIVE</i> <br /> <i>DESIGN</i></h2>
            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i> <br /> <i>veniam omnis </i></p>
            <div class="da-img"><?= Html::img('@path_root/plugins/parallax-slider/img/1.png')?></div>
        </div>
        <div class="da-slide">
            <h2><i>RESPONSIVE VIDEO</i> <br /> <i>SUPPORT AND</i> <br /> <i>MANY MORE</i></h2>
            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i></p>
            <div class="da-img span6">
                <div class="span6">
                    <iframe src="http://player.vimeo.com/video/47911018" width="100%" height="320" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <div class="da-slide">
            <h2><i>USING BEST WEB</i> <br /> <i>SOLUTIONS WITH</i> <br /> <i>HTML5/CSS3</i></h2>
            <p><i>Lorem ipsum dolor amet</i> <br /> <i>tempor incididunt ut</i> <br /> <i>veniam omnis </i></p>
            <div class="da-img"><?= Html::img('@path_root/plugins/parallax-slider/img/html5andcss3.png')?></div>
        </div>
        <nav class="da-arrows">
            <span class="da-arrows-prev"></span>
            <span class="da-arrows-next"></span>
        </nav>
    </div><!--/da-slider-->
</div><!--/slider-->
<!--=== End Slider ===-->

<!--=== Purchase Block ===-->
<div class="row-fluid purchase margin-bottom-30">
    <div class="container">
        <div class="span9">
            <span>Unify is a clean and fully responsive incredible Template.</span>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi  vehicula sem ut volutpat. Ut non libero magna fusce condimentum eleifend enim a feugiat.</p>
        </div>
        <a href="http://sc.chinaz.com/moban/" class="btn-buy hover-effect">Purchase Now</a>
    </div>
</div><!--/row-fluid-->
<!-- End Purchase Block -->

<!--=== Content Part ===-->
<div class="container">
    <!-- Service Blocks -->
    <div class="row-fluid">
        <div class="span4">
            <div class="service clearfix">
                <i class="icon-resize-small"></i>
                <div class="desc">
                    <h4>Fully Responsive</h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="service clearfix">
                <i class="icon-cogs"></i>
                <div class="desc">
                    <h4>HTML5 + CSS3</h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="service clearfix">
                <i class="icon-plane"></i>
                <div class="desc">
                    <h4>Launch Ready</h4>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                </div>
            </div>
        </div>
    </div><!--/row-fluid-->
    <!-- //End Service Blokcs -->

    <!-- Recent Works -->
    <div class="headline"><h3>Recent Works</h3></div>
    <ul class="thumbnails">
        <li class="span3">
            <div class="thumbnail-style thumbnail-kenburn">
                <div class="thumbnail-img">
                    <div class="overflow-hidden"><?= Html::img('@path_root/img/carousel/2.jpg')?></div>
                    <a class="btn-more hover-effect" href="#">read more +</a>
                </div>
                <h3><a class="hover-effect" href="#">Our Work</a></h3>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail-style thumbnail-kenburn">
                <div class="thumbnail-img">
                    <div class="overflow-hidden"><?= Html::img('@path_root/img/carousel/3.jpg')?></div>
                    <a class="btn-more hover-effect" href="#">read more +</a>
                </div>
                <h3><a class="hover-effect" href="#">One More Work</a></h3>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail-style thumbnail-kenburn">
                <div class="thumbnail-img">
                    <div class="overflow-hidden"><?= Html::img('@path_root/img/carousel/9.jpg')?></div>
                    <a class="btn-more hover-effect" href="#">read more +</a>
                </div>
                <h3><a class="hover-effect" href="#">Another Work</a></h3>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
            </div>
        </li>
        <li class="span3">
            <div class="thumbnail-style thumbnail-kenburn">
                <div class="thumbnail-img">
                    <div class="overflow-hidden"><?= Html::img('@path_root/img/carousel/10.jpg')?></div>
                    <a class="btn-more hover-effect" href="#">read more +</a>
                </div>
                <h3><a class="hover-effect" href="#">Huge Work</a></h3>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
            </div>
        </li>
    </ul><!--/thumbnails-->
    <!-- //End Recent Works -->

    <!-- Information Blokcs -->
    <div class="row-fluid margin-bottom-20">
        <!-- Who We Are -->
        <div class="span8">
            <div class="headline"><h3>Welcome To UNIFY Template</h3></div>
            <p><?= Html::img('@path_root/img/carousel/6.jpg',['class'=>'pull-left lft-img-margin img-width-200'])?>Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals. It works on all major web browsers, tablets and phone.</p>
            <ul class="unstyled">
                <li><i class="icon-ok color-green"></i> Donec id elit non mi porta gravida</li>
                <li><i class="icon-ok color-green"></i> Corporate and Creative</li>
                <li><i class="icon-ok color-green"></i> Responsive Bootstrap Template</li>
                <li><i class="icon-ok color-green"></i> Corporate and Creative</li>
            </ul><br />

            <blockquote class="hero-unify">
                <p>Award winning digital agency. We bring a personal and effective approach to every project we work on, which is why. Unify is an incredibly beautiful responsive Bootstrap Template for corporate professionals.</p>
                <small>CEO, Jack Bour</small>
            </blockquote>
        </div><!--/span8-->

        <!-- Latest Shots -->
        <div class="span4">
            <div class="headline"><h3>Latest Shots</h3></div>
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="item active">
                        <?= Html::img('@path_root/img/carousel/5.jpg')?>
                        <div class="carousel-caption">
                            <p>Cras justo odio, dapibus ac facilisis in, egestas.</p>
                        </div>
                    </div>
                    <div class="item">
                        <?= Html::img('@path_root/img/carousel/4.jpg')?>
                        <div class="carousel-caption">
                            <p>Cras justo odio, dapibus ac facilisis in, egestas.</p>
                        </div>
                    </div>
                    <div class="item">
                        <?= Html::img('@path_root/img/carousel/3.jpg')?>
                        <div class="carousel-caption">
                            <p>Cras justo odio, dapibus ac facilisis in, egestas.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-arrow">
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="icon-angle-left"></i></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="icon-angle-right"></i></a>
                </div>
            </div>
        </div><!--/span4-->
    </div><!--/row-fluid-->
    <!-- //End Information Blokcs -->

    <!-- Our Clients -->
    <div id="clients-flexslider" class="flexslider home clients">
        <div class="headline"><h3>Our Clients</h3></div>
        <ul class="slides">
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/hp_grey.png')?>
                    <?= Html::img('@path_root/img/clients/hp.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/igneus_grey.png')?>
                    <?= Html::img('@path_root/img/clients/igneus.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/vadafone_grey.png')?>
                    <?= Html::img('@path_root/img/clients/vadafone.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/walmart_grey.png')?>
                    <?= Html::img('@path_root/img/clients/walmart.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/shell_grey.png')?>
                    <?= Html::img('@path_root/img/clients/shell.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/natural_grey.png')?>
                    <?= Html::img('@path_root/img/clients/natural.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/aztec_grey.png')?>
                    <?= Html::img('@path_root/img/clients/aztec.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/gamescast_grey.png')?>
                    <?= Html::img('@path_root/img/clients/gamescast.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    "<?= Html::img('@path_root/img/clients/cisco_grey.png')?>
                    <?= Html::img('@path_root/img/clients/cisco.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/everyday_grey.png')?>
                    <?= Html::img('@path_root/img/clients/everyday.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/cocacola_grey.png')?>
                    <?= Html::img('@path_root/img/clients/cocacola.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/spinworkx_grey.png')?>
                    <?= Html::img('@path_root/img/clients/spinworkx.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/shell_grey.png')?>
                    <?= Html::img('@path_root/img/clients/shell.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/natural_grey.png')?>
                    <?= Html::img('@path_root/img/clients/natural.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/gamescast_grey.png')?>
                    <?= Html::img('@path_root/img/clients/gamescast.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/everyday_grey.png')?>
                    <?= Html::img('@path_root/img/clients/everyday.png',['class'=>'color-img'])?>
                </a>
            </li>
            <li>
                <a href="#">
                    <?= Html::img('@path_root/img/clients/spinworkx_grey.png')?>
                    <?= Html::img('@path_root/img/clients/spinworkx.png',['class'=>'color-img'])?>
                </a>
            </li>
        </ul>
    </div><!--/flexslider-->
    <!-- //End Our Clients -->
</div><!--/container-->
<!-- End Content Part -->

<!--=== Footer ===-->
<div class="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="span4">
                <!-- About -->
                <div class="headline"><h3>About</h3></div>
                <p class="margin-bottom-25">Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals.</p>

                <!-- Monthly Newsletter -->
                <div class="headline"><h3>Monthly Newsletter</h3></div>
                <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
                <form class="form-inline" />
                <div class="input-append">
                    <input type="text" placeholder="Email Address" class="input-medium" />
                    <button class="btn-u">Subscribe</button>
                </div>
                </form>
            </div><!--/span4-->

            <div class="span4">
                <div class="posts">
                    <div class="headline"><h3>Recent Blog Entries</h3></div>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/6.jpg')?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/10.jpg')?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/11.jpg')?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                </div>
            </div><!--/span4-->

            <div class="span4">
                <!-- Monthly Newsletter -->
                <div class="headline"><h3>Contact Us</h3></div>
                <address>
                    25, Lorem Lis Street, Orange <br />
                    California, US <br />
                    Phone: 800 123 3456 <br />
                    Fax: 800 123 3456 <br />
                    Email: <a href="mailto:info@anybiz.com" class="">info@anybiz.com</a>
                </address>

                <!-- Stay Connected -->
                <div class="headline"><h3>Stay Connected</h3></div>
                <ul class="social-icons">
                    <li><a href="#" data-original-title="Feed" class="social_rss"></a></li>
                    <li><a href="#" data-original-title="Facebook" class="social_facebook"></a></li>
                    <li><a href="#" data-original-title="Twitter" class="social_twitter"></a></li>
                    <li><a href="#" data-original-title="Goole Plus" class="social_googleplus"></a></li>
                    <li><a href="#" data-original-title="Pinterest" class="social_pintrest"></a></li>
                    <li><a href="#" data-original-title="Linkedin" class="social_linkedin"></a></li>
                    <li><a href="#" data-original-title="Vimeo" class="social_vimeo"></a></li>
                </ul>
            </div><!--/span4-->
        </div><!--/row-fluid-->
    </div><!--/container-->
</div><!--/footer-->
<!--=== End Footer ===-->


<!-- JS Global Compulsory -->
<?= Html::jsFile('@path_root/js/jquery-1.8.2.min.js')?>
<?= Html::jsFile('@path_root/js/modernizr.custom.js')?>
<?= Html::jsFile('@path_root/plugins/bootstrap/js/bootstrap.min.js')?>
<!-- JS Implementing Plugins -->
<?= Html::jsFile('@path_root/plugins/flexslider/jquery.flexslider-min.js')?>
<?= Html::jsFile('@path_root/plugins/parallax-slider/js/modernizr.js')?>
<?= Html::jsFile('@path_root/plugins/parallax-slider/js/jquery.cslider.js')?>
<?= Html::jsFile('@path_root/plugins/back-to-top.js')?>
<!-- JS Page Level -->
<?= Html::jsFile('@path_root/js/app.js')?>
<?= Html::jsFile('@path_root/js/pages/index.js')?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initSliders();
        Index.initParallaxSlider();
    });
</script>
<?= Html::jsFile('@path_root/js/respond.js')?>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>	