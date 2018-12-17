<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
<script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
<script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="x-body">
    <form class="layui-form">
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>导航名字
            </label>
            <div class="layui-input-inline">
                <input type="text" id="menu_name" name="menu_name" required="" lay-verify="required"
                       autocomplete="off" value="<?= $data['menu_name'] ?>" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为网站唯一的菜单名字
            </div>
        </div>
        <div class="layui-form-item">
            <label for="menu_url" class="layui-form-label">
                <span class="x-red">*</span>导航地址
            </label>
            <div class="layui-input-inline">
                <input type="text" value="<?= $data['menu_url'] ?>" id="menu_url" name="menu_url" required=""
                       lay-verify="username" autocomplete="on" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您网站的链接地址
            </div>
        </div>
        <div class="layui-form-item">
            <label for="L_email" class="layui-form-label">
                <span class="x-red">*</span>排序
            </label>
            <div class="layui-input-inline">
                <input type="text" value="<?= $data['sort'] ?>" id="sort" name="sort" required="" lay-verify=""
                       autocomplete="on" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">                                                     
                <span class="x-red">*</span>
            </div>
        </div>
        <input type="hidden" value="<?= $data['pid']?$data['pid']:0 ?>" id="" name="pid" required="" lay-verify=""
               autocomplete="on" class="layui-input">
        <input type="hidden" value="<?= $data['id']?$data['id']:0 ?>" id="id" name="id" required="" lay-verify=""
               autocomplete="on" class="layui-input">
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label">
            </label>
            <button class="layui-btn" lay-filter="edit" lay-submit="">
                <?= Yii::$app->request->get('action','add')=='add'?'添加':'修改';?>
            </button>
        </div>
    </form>
</div>
<script>
    layui.use(['form', 'layer'], function () {
        $ = layui.jquery;
        var form = layui.form
            , layer = layui.layer;

        //自定义验证规则
        form.verify({});

        //监听提交
        form.on('submit(edit)', function (data) {
            console.log(data.field);
            var action = '<?= Yii::$app->request->get('action','add')?>';
            var url = '';
            if (action == 'add') {
                var url = '<?= Yii::$app->urlManager->createUrl(['admin/addcate'])?>';
            } else {
                var url = '<?= Yii::$app->urlManager->createUrl(['admin/updatecate'])?>';
            }
            //发异步，把数据提交给php
            $.post(url, data.field, function (str) {
                layer.open({
                    type: 1,
                    title: str.code == 1 ? '成功' : '错误',
                    content: str.data.message, //注意，如果str是object，那么需要字符拼接。
                    time: 2000,
                });
            }, 'JSON');
            return false;
//            layer.alert("保存成功", {icon: 6}, function () {
//                // 获得frame索引
//                var index = parent.layer.getFrameIndex(window.name);
//                //关闭当前frame
//                parent.layer.close(index);
//            });
//            return false;
        });


    });
</script>


</body>

</html>