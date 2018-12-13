<?php
use yii\helpers\Html;

?>
<head>
    <title><?= $this->context->basics['title']; ?></title>

    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <!-- CSS Global Compulsory-->
    <?= Html::cssFile('@path_root/plugins/bootstrap/css/bootstrap.min.css') ?>
    <?= Html::cssFile('@path_root/css/style.css') ?>
    <?= Html::cssFile('@path_root/css/headers/header1.css') ?>
    <?= Html::cssFile('@path_root/plugins/bootstrap/css/bootstrap-responsive.min.css') ?>
    <?= Html::cssFile('@path_root/css/style_responsive.css') ?>
    <link rel="shortcut icon" href="favicon.ico"/>
    <!-- CSS Implementing Plugins -->
    <?= Html::cssFile('@path_root/plugins/font-awesome/css/font-awesome.css') ?>
    <!-- CSS Theme -->
    <?= Html::cssFile('@path_root/css/themes/default.css', ['id' => 'style_color']) ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
<?= app\common\widgets\welcome::widget() ?>
<!--=== Content Part ===-->
<div class="container">
    <div class="row-fluid">
        <div class="log-page">
            <h3>请登入你的帐户</h3>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input class="input-xlarge" name="username" type="text" placeholder="用户名"/>
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span>
                <input class="input-xlarge" name="password" type="text" placeholder="用户密码"/>
            </div>
            <div class="controls form-inline">
                <label class="checkbox"><input type="checkbox"/>记住我</label>
                <button class="btn-u pull-right check_login" type="submit">登录</button>
            </div>
            <hr/>
            <h4>忘记密码点我 ?</h4>
            <p>不用担心, <a class="color-green" href="#">点击</a>重新设置你的密码。</p>
        </div>
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
                <p class="margin-bottom-25">Unify is an incredibly beautiful responsive Bootstrap Template for corporate
                    and creative professionals.</p>

                <!-- Monthly Newsletter -->
                <div class="headline"><h3>Monthly Newsletter</h3></div>
                <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
                <form class="form-inline"/>
                <div class="input-append">
                    <input type="text" placeholder="Email Address" class="input-medium"/>
                    <button class="btn-u">Subscribe</button>
                </div>
                </form>
            </div><!--/span4-->

            <div class="span4">
                <div class="posts">
                    <div class="headline"><h3>Recent Blog Entries</h3></div>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/6.jpg') ?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap
                                    Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/10.jpg') ?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap
                                    Template</a></p>
                        </dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt><a href="#"><?= Html::img('@path_root/img/sliders/elastislide/11.jpg') ?></a></dt>
                        <dd>
                            <p><a href="#">Anim moon officia Unify is an incredibly beautiful responsive Bootstrap
                                    Template</a></p>
                        </dd>
                    </dl>
                </div>
            </div><!--/span4-->

            <div class="span4">
                <!-- Monthly Newsletter -->
                <div class="headline"><h3>Contact Us</h3></div>
                <address>
                    25, Lorem Lis Street, Orange <br/>
                    California, US <br/>
                    Phone: 800 123 3456 <br/>
                    Fax: 800 123 3456 <br/>
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
<?= Html::jsFile('@path_root/js/jquery-1.8.2.min.js') ?>
<?= Html::jsFile('@path_root/js/modernizr.custom.js') ?>
<?= Html::jsFile('@path_root/plugins/bootstrap/js/bootstrap.min.js') ?>
<!-- JS Implementing Plugins -->
<?= Html::jsFile('@path_root/plugins/back-to-top.js') ?>
<!-- JS Page Level -->
<?= Html::jsFile('@path_root/js/app.js') ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.init();
    });
    $(".check_login").click(function () {
        var user_name = $("input[name='username']").val();
        var pass_word = $("input[name='password']").val();
        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl(['ajax/ajax/login'])?>",
            dataType: "json",//数据类型可以为 text xml json  script  jsonp
            data: {
                username: user_name,
                password: pass_word
            },
            success: function (data) {
                if (data.code) {
                    setCookie('cwj_session_id', data.data.data);
                    alert('登录成功');
                } else {

                }
            }
        });


    })

    function setCookie(name, value) {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
    }

</script>

<?= Html::jsFile('@path_root/js/respond.js') ?>

<div style="display:none">
    <script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script>
</div>
</body>
</html> 