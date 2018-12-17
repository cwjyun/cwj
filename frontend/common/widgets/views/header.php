<?php
use yii\helpers\Html;

?>
<!DOCTYPE html>
<!--[if IE 7]>
<html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->
<!--=== Top ===-->
<div class="top">
    <div class="container">
        <ul class="loginbar pull-right">
            <li><i class="icon-globe"></i><a>语言 <i class="icon-sort-up"></i></a>
                <ul class="nav-list">
                    <li class="active"><a href="#">English</a> <i class="icon-ok"></i></li>
                    <li><a href="#">Spanish</a></li>
                    <li><a href="#">Russian</a></li>
                    <li><a href="#">German</a></li>
                </ul>
            </li>
            <li class="devider">&nbsp;</li>
            <li><a href="page_faq.html" class="login-btn">帮助</a></li>
            <li class="devider">&nbsp;</li>
            <li><a href="<?= Yii::$app->urlManager->createUrl(['public/login']) ?>" class="login-btn">登录</a></li>
        </ul>
    </div>
</div><!--/top-->
<!--=== End Top ===-->
<!--=== Header ===-->
<div class="header">
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <a href="index.html"><?= Html::img('@path_root/img/logo1-default.png', ['id' => 'logo-header']) ?></a>
        </div><!-- /logo -->

        <!-- Menu -->
        <div class="navbar">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a><!-- /nav-collapse -->
                <div class="nav-collapse collapse">
                    <ul class="nav top-2">
                        <?php foreach ($data as $k => $v): ?>
                            <li class="active">
                                <a href="<?= $v['menu_url'] ?>" class="dropdown-toggle"
                                   data-toggle="dropdown"><?= $v['menu_name'] ?>
                                    <?php if (isset($v['son'])): ?>
                                        <b class="caret"></b>
                                    <?php endif; ?>
                                </a>
                                <?php if (isset($v['son'])): ?>
                                    <ul class="dropdown-menu">
                                        <?php foreach ((array)$v['son'] as $key => $val): ?>
                                            <li class="active"><a href="<?= $val['menu_url'] ?>"><?= $val['menu_name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <b class="caret-out"></b>
                            </li>
                        <?php endforeach; ?>
                        <li><a class="search"><i class="icon-search search-btn"></i></a></li>
                    </ul>
                    <div class="search-open">
                        <div class="input-append">
                            <form/>
                            <input type="text" class="span3" placeholder="Search"/>
                            <button type="submit" class="btn-u">Go</button>
                            </form>
                        </div>
                    </div>
                </div><!-- /nav-collapse -->
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->
    </div><!-- /container -->
</div><!--/header -->
<!--=== End Header ===-->

<!--=== Slider ===-->