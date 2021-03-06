<?php
use yii\helpers\Html;
?>

<!DOCTYPE html>
<!--[if IE 7]> <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>111</title>

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


    <?= Html::cssFile('assets/css/themes/headers/default.css')?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<!--=== Style Switcher ===-->
<i class="style-switcher-btn icon-cogs"></i>
<div class="style-switcher">
    <div class="theme-close"><i class="icon-remove"></i></div>
    <div class="theme-heading">Theme Colors</div>
    <ul class="unstyled">
        <li class="theme-default theme-active" data-style="default" data-header="light"></li>
        <li class="theme-blue" data-style="blue" data-header="light"></li>
        <li class="theme-orange" data-style="orange" data-header="light"></li>
        <li class="theme-red" data-style="red" data-header="light"></li>
        <li class="theme-light" data-style="light" data-header="light"></li>
    </ul>
</div><!--/style-switcher-->
<!--=== End Style Switcher ===-->




<!--=== Breadcrumbs ===-->
<div class="breadcrumbs margin-bottom-40">
    <div class="container">
        <h1 class="color-green pull-left">Page Not Founded</h1>
        <ul class="pull-right breadcrumb">
            <li><a href="index.html">Home</a> <span class="divider">/</span></li>
            <li><a href="">Pages</a> <span class="divider">/</span></li>
            <li class="active">404</li>
        </ul>
    </div><!--/container-->
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->

<!--=== Content Part ===-->
<div class="container">
    <div class="row-fluid page-404">
        <p><i>404</i> <span>The Page cannot be found</span></p>
    </div><!--/row-fluid-->
</div><!--/container-->
<!--=== End Content Part ===-->




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
                        <dt><a href="#"><img src="assets/img/sliders/elastislide/6.jpg" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="assets/img/sliders/elastislide/10.jpg" alt="" /></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><img src="assets/img/sliders/elastislide/11.jpg" alt="" /></a></dt>
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

<?= Html::jsFile('@path_root/js/jquery-1.8.2.min.js') ?>
<?= Html::jsFile('@path_root/js/modernizr.custom.js') ?>
<?= Html::jsFile('@path_root/plugins/bootstrap/js/bootstrap.min.js') ?>
<!-- JS Implementing Plugins -->
<?= Html::jsFile('@path_root/plugins/back-to-top.js') ?>
<!-- JS Page Level -->
<?= Html::jsFile('@path_root/js/app.js') ?>

<?= Html::jsFile('assets/js/respond.js') ?>

</body>
</html>
<?= Html::jsFile('@path_root/js/video/index.bundle.js') ?>


