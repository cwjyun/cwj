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
    <?= Html::cssFile('@path_root/favicon.ico') ?>
    <!-- CSS Implementing Plugins -->
    <?= Html::cssFile('@path_root/plugins/font-awesome/css/font-awesome.css') ?>
    <!-- CSS Theme -->
    <?= Html::cssFile('@path_root/css/themes/default.css', ['id' => 'style_color']) ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>


<!--=== Content Part ===-->
<div class="body">
<!--    --><?//= app\common\widgets\welcome::widget() ?>

    <div class="container">
        <div class="row-fluid margin-bottom-10">
            <div class="reg-page"/>
            <h3>注册新帐户</h3>
            <div class="controls">
                <label>用户名</label>
                <input type="text" name="username" class="span12"/>
                <label>邮箱<span class="color-red">*</span></label>
                <input type="text" name="email" class="span12"/>
            </div>
            <div class="controls">
                <div class="span6">
                    <label>密码<span class="color-red">*</span></label>
                    <input type="text" name="password" class="span12"/>
                </div>
                <div class="span6">
                    <label>确认密码<span class="color-red">*</span></label>
                    <input type="text" name="password1" class="span12"/>
                </div>
            </div>
            <div class="controls form-inline">
                <label class="checkbox"><input type="checkbox"/>&nbsp; 阅读 <a href="">条款</a></label>
                <button class="btn-u pull-right check_reg" type="submit">注册</button>
            </div>
            <hr/>
            <p>已经签署了吗?<a href="page_login.html" class="color-green">单击</a>“登录”以登录您的帐户。</p>
        </div>
    </div><!--/row-fluid-->
</div><!--/container-->
</div><!--/body-->
<!--=== End Content Part ===-->



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
    $(".check_reg").click(function () {
        var user_name = $("input[name='username']").val();
        var pass_word = $("input[name='password']").val();
        var pass_word1 = $("input[name='password1']").val();
        var email = $("input[name='email']").val();
        if (pass_word1 != pass_word) {
            alert("两次密码不相等");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?=Yii::$app->urlManager->createUrl(['ajax/ajax/reg'])?>",
            dataType: "json",//数据类型可以为 text xml json  script  jsonp
            data: {
                username: user_name,
                password: pass_word,
                email: email,
            },
            success: function (data) {
                if (data.code) {
                    alert(data.data.message);
                } else {
                    alert(data.data.message);
                    return false;
                }
            }
        });


    })
</script>
<?= Html::jsFile('@path_root/js/respond.js') ?>
</body>
</html> 