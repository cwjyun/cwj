<?php
use yii\helpers\Html;

?>
    <title><?= $this->context->basics['title']; ?></title>
    
</head>

<body>
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