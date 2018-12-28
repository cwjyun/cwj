<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<style>
    .layui-form-label {
        width: 100px;
    }
    .help-block{
        color:red;
    }
</style>
<div class="x-body">
    <?php $form = ActiveForm::begin([
        'action' => Yii::$app->urlManager->createAbsoluteUrl(['article/save']), //提交地址(*可省略*)
        'method' => 'post',   //提交方法(*可省略默认POST*)
        'id' => 'form-save', //设置ID属性
        'options' => [
            'class' => 'form-horizontal', //设置class属性
        ],
        'enableAjaxValidation' => true,
        'validationUrl' => Yii::$app->urlManager->createAbsoluteUrl(['article/validate']),
    ]); ?>
    <form class="layui-form">
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>所属分类:
            </label>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red"><?= $data['menu_name'] ?></span>
            </div>

            <?= $form->field($model, 'id')->textInput([
                'value' => 'aritcle',
                'id' => true,
                'name'=>'id',
                'type' => 'hidden',
            ])->label(false); ?>

            <?= $form->field($model, 'm_id')->textInput([
                'value' => $data['pid'],
                'pid' => true,
                'type' => 'hidden',
            ])->label(false); ?>
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>文章名字:
            </label>
            <div class="layui-input-inline">
                <?= $form->field($model, 'aritcle_name')->textInput([
                    'id' => true,
                    'type' => "text",
                    'class' => 'layui-input',
                    'title' => '',
                    'lay-verify' => 'required',
                    'autocomplete' => 'off'
                ])->label(false); ?>
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
                    'model' => $model,
                    'attribute' => 'aritcle_con',
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
                    <?= $form->field($model, 'type')->dropDownList([1 => '类型1', 2 => '类型2', 3 => '类型3'])->label(false) ?>
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>显示隐藏</label>
                <div class="layui-input-block">
                    <div class="layui-input-inline">
                        <?= $form->field($model, 'is_hidden')->dropDownList([0 => '隐藏', 1 => '显示'])->label(false) ?>
                    </div>
                </div>
            </div>


            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>是否允许品论
                </label>
                <div class="layui-input-block">
                    <div class="layui-input-inline">
                        <?= $form->field($model, 'is_discuss')->dropDownList(['1' => '是', '0' => '否'])->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <?= Html::submitButton('增加', ['id' => 'form-save', 'class' => 'layui-btn', 'lay-filter' => 'lay-add', 'name' => 'login-button']) ?>
            </div>
    </form>
    <?php ActiveForm::end(); ?>
</div>
</body>


<script>
    $(function () {
        $(document).on('beforeSubmit', '#form-save', function () {
            var form = $(this);
            //返回错误的表单信息
            if (form.find('.has-error').length) {
                return false;
            }
            //表单提交
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                success: function (response) {
                    if (response.success) {
                        alert('保存成功');
                        window.location.reload();
                    }
                },
                error: function () {
                    alert('系统错误');
                    return false;
                }
            });
            return false;
        });
    });
</script>
</html>