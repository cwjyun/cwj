<?php
use yii\helpers\Html;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-X-admin2.0</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <?= Html::cssFile('@path_root/favicon.ico', ['type' => 'image/x-icon']) ?>
    <?= Html::cssFile('@path_root/css/font.css') ?>
    <?= Html::cssFile('@path_root/css/xadmin.css') ?>
    <?= Html::cssFile('@path_root/css/xadmin.css') ?>
    <?= Html::jsFile('@path_root/js/jquery/jquery.min.js') ?>
    <?= Html::jsFile('@path_root/lib/layui/layui.js', ['charset' => 'utf-8']) ?>
    <?= Html::jsFile('@path_root/js/xadmin.js') ?>
</head>
<body class="login-bg">

<div class="login layui-anim layui-anim-up">
    <div class="message">x-admin2.0-管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form">
        <input name="username" placeholder="用户名" type="text" lay-verify="required" class="layui-input">
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码" type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20">
    </form>
</div>
<script>
    $(function () {
        layui.use('form', function () {
            var form = layui.form;

            form.on('submit(login)', function (data) {
                var username = data.field.username;
                var password = data.field.password;
                var url = "<?= Yii::$app->urlManager->createUrl(['base/login'])?>";
                $.ajax({
                    url: url,
                    data: {
                        username: username,
                        password: password,
                    },
                    type: "POST",
                    dataType: "json",
                    success: function (msg) {
                        if (!msg.code) {
                            layer.msg(JSON.stringify(msg.data.message), function () {
                                return false;
                            });
                        } else {
                            layer.msg(JSON.stringify(msg.data.message), function () {
                                setCookie('cwj_session_id', msg.data.data);
                                window.location.href="<?= Yii::$app->urlManager->createUrl(['admin/index'])?>";

                            });
                        }

                    },
                    error: function (error) {
                    }
                });
                return false;
            });

        });
    })
    function setCookie(name, value) {
        var Days = 30;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + "=" + escape(value) + ";expires=" + exp.toGMTString();
    }

</script>
<script>

</script>
</body>
</html>