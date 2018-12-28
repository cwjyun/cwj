<style>
    .layui-form-label {
        width: 100px;
    }
</style>
<div class="x-body">
    <form class="layui-form">
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>所属分类:
            </label>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">PHP开发</span>
            </div>
            <input type="hidden" name="">
            <input type="hidden" name="">
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>文章名字:
            </label>
            <div class="layui-input-inline">
                <input type="text" id="username" name="username" required="" lay-verify="required"
                       autocomplete="off" value="我的文章名字" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red">*</span>将会成为您唯一的文章名字
            </div>
        </div>
        <div class="layui-form-item">
            <label for="phone" class="layui-form-label">
                <span class="x-red">*</span>文章内容:
            </label>
            <div class="layui-input-inline">
                <?php
                use \kucha\ueditor\UEditor;

                echo UEditor::widget([
                    'name' => 'cwj',
                    'model' => $model,
                    'attribute' => 'menu_url',
                    'clientOptions' => [
                        //编辑区域大小
                        'initialFrameHeight' => '100',
                        'initialFrameWidth' => '400',
                        //设置语言
                        'lang' => 'en', //中文为 zh-cn
                        //定制菜单
                        'toolbars' => [
                            [
                                'fullscreen', 'source', 'undo', 'redo', '|',
                                'fontsize',
                                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
                                'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
                                'forecolor', 'backcolor', '|',
                                'lineheight', '|',
                                'indent', '|'
                            ],
                        ]
                    ]]);

                ?>
            </div>
            <div class="layui-form-item">
            </div>

            <div class="layui-form-item">
                <label for="L_email" class="layui-form-label">
                    <span class="x-red">*</span>类型
                </label>
                <div class="layui-input-inline">
                    <select name="" id="">
                        <option value="">什么类型</option>
                    </select>
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>显示隐藏</label>
                <div class="layui-input-block">
                    <div class="layui-input-inline">
                        <select name="" id="">
                            <option value="">显示</option>
                            <option value="">隐藏</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>是否允许品论
                </label>
                <div class="layui-input-block">
                    <div class="layui-input-inline">
                        <select name="" id="">
                            <option value="">是</option>
                            <option value="">否</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="add" lay-submit="">
                    增加
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
        form.verify({
            nikename: function (value) {
                if (value.length < 5) {
                    return '昵称至少得5个字符啊';
                }
            }
            , pass: [/(.+){6,12}$/, '密码必须6到12位']
            , repass: function (value) {
                if ($('#L_pass').val() != $('#L_repass').val()) {
                    return '两次密码不一致';
                }
            }
        });

        //监听提交
        form.on('submit(add)', function (data) {
            console.log(data);
            //发异步，把数据提交给php
            layer.alert("增加成功", {icon: 6}, function () {
                // 获得frame索引
                var index = parent.layer.getFrameIndex(window.name);
                //关闭当前frame
                parent.layer.close(index);
            });
            return false;
        });


    });
</script>
</body>

</html>