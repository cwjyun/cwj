<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<style>
    .layui-form-label {
        width: 100px;
    }
</style>
<div class="x-body">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <form class="layui-form">
        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>所属分类:
            </label>
            <div class="layui-form-mid layui-word-aux">
                <span class="x-red"><?= $data['menu_name']?></span>
            </div>
            <?= $form->field($model, 'id')->textInput(['id' => true,'type'=>"hidden",'class'=>'','title'=>'','name'=>'id'])->label(false); ?>
            <?= $form->field($model, 'm_id')->textInput(['pid' => true,'type'=>"hidden",'name'=>'pid'])->label(false); ?>
        </div>

        <div class="layui-form-item">
            <label for="username" class="layui-form-label">
                <span class="x-red">*</span>文章名字:
            </label>
            <div class="layui-input-inline">
                <?= $form->field($model, 'aritcle_name')->textInput([
                    'id' => true,
                    'type'=>"text",
                    'class'=>'layui-input',
                    'title'=>'',
                    'name'=>'aritcle_name',
                    'lay-verify'=>'required',
                    'autocomplete'=>  'off'
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
                    'name' => 'aritcle_con',
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
                    <?= $form->field($model, 'type[]' )->dropDownList(['a' => '类型1', 'b' => '类型2', 'c' => '类型3'])->label(false) ?>
                </div>
                <div class="layui-form-mid layui-word-aux">
                    <span class="x-red">*</span>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label"><span class="x-red">*</span>显示隐藏</label>
                <div class="layui-input-block">
                    <div class="layui-input-inline">
                        <?= $form->field($model, 'is_hidden[]' )->dropDownList(['1' => '显示', '0' => '隐藏'])->label(false) ?>
                    </div>
                </div>
            </div>


            <div class="layui-form-item">
                <label for="L_pass" class="layui-form-label">
                    <span class="x-red">*</span>是否允许品论
                </label>
                <div class="layui-input-block">
                    <div class="layui-input-inline">
                        <?= $form->field($model, 'is_discuss[]' )->dropDownList(['1' => '是', '0' => '否'])->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <?= Html::submitButton('增加', ['class' => 'layui-btn','lay-filter'=>'lay-add','name' => 'login-button']) ?>
            </div>
    </form>
    <?php ActiveForm::end(); ?>
</div>
</body>

</html>